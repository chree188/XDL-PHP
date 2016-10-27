<?php
/*
==========================================
* BorenPHP 4.0 - SMTP邮件发送类
==========================================
* Copyright (c) 2012 伯仁网络 All rights reserved.
* Author: YinHailin
* $Id: Smtp.class.php 1 2013-08-27 02:44:21Z luokun $
==========================================
*/
class Smtp {

	/* SMTP服务器名称 */
	private $smtpHost;

	/* SMTP服务端口
	+ 标准服务端口，默认为25
	*/
	private $smtpPort = 25;

	/* SMTP用户名 */
	private $smtpUser = '';

	/* SMTP用户密码 */
	private $smtpPassword = '';

	/* 超时时间
	 + 用于fsockopen()函数，超过该时间未连上则中断
	 */
	private $timeOut = 30;

	/* 用户身份
	 + 用于HELO指令
	 */
	private $hostName = 'localhost';

	/* 开启调试模式 */
	private $debug = false;

	/* 是否进行身份验证 */
	private $authentication = false;

	/* Private Variables */
	private $socket = false;

	/* 架构方法
	 * @param string $smtpHost 服务器名称
	 * @param string $smtpUser 用户名
	 * @param string $smtpPassword 用户密码
	 * @param string $authentication 是否开启身份验证，默认不开启
	 * @param string $smtpPort 服务器端口，默认25
	 */
	public function __construct($smtpHost = '', $smtpUser = '', $smtpPassword = '', $authentication = false, $smtpPort = 25) {
		$this->smtpHost = $smtpHost;
		$this->smtpPort = $smtpPort;
		$this->smtpUser = $smtpUser;
		$this->smtpPassword = $smtpPassword;
		$this->authentication = $authentication;
	}

	/* 发送邮件
	 * @param string $maiTo 服务器名称
	 * @param string $mailFrom 用户名
	 * @param string $subject 用户密码
	 * @param string $body 内容
	 * @param string $mailType 邮件类型
	 * @param string $cc 抄送邮件地址
	 * @param string $bcc 隐藏抄送邮件地址
	 * @param string $additionalHeaders 附加内容
	 * @return boolean
	 */
	public function sendMail($maiTo, $mailFrom, $subject = '', $body = '', $mailType = 'HTML', $cc = '', $bcc = '', $additionalHeaders = '') {
		$header .= "MIME-Version:1.0\r\n";
		if ($mailType=='HTML') {
			$header .= "Content-Type:text/html\r\n";
		}
		$header .= "charset='utf-8'\r\n";
		$header .= "To: ".$maiTo."\r\n";
		if ($cc != '') {
			$header .= "Cc: ".$cc."\r\n";
		}
		$header .= "From: $mailFrom<".$mailFrom.">\r\n";
		$header .= "Subject: ".$subject."\r\n";
		$header .= $additionalHeaders;
		$header .= "Date: ".date("r")."\r\n";
		$header .= "X-Mailer:By Redhat (PHP/".phpversion().")\r\n";
		list($msec, $sec) = explode(' ', microtime());
		$header .= "Message-ID: <".date("YmdHis", $sec).".".($msec*1000000).".".$mailFrom.">\r\n";

		//收件人地址解析
		$maiTo = explode(",", $maiTo);
		if ($cc != "") {
			$maiTo = array_merge($maiTo, explode(",", $cc));
		}
		if ($bcc != "") {
			$maiTo = array_merge($maiTo, explode(",", $bcc));
		}

		//邮件是否发送成功标志
		$mailSent = true;
		foreach ($maiTo as $value) {
			if (!$this->smtpSockopen($value)) {
				$this->smtpDebug("[错误]: 无法发送邮件至 \"".$value."\"\n");
				$mailSent = false;
				continue;
			}
			if ($this->smtpSend($this->hostName, $mailFrom, $value, $header, $body)) {
				$this->smtpDebug("[成功]: E-mail已经成功发送至 <".$value.">\n");
			} else {
				$this->smtpDebug("[失败]: E-mail无法发送至 <".$value.">\n");
				$mailSent = false;
			}
			fclose($this->socket);
			//$this->smtpDebug("[失败]:  连接服务器失败\n");
		}
		$this->smtpDebug($header);
		return $mailSent;
	}
	
	/* 发送邮件
	 * @param string $helo 服务器名称
	 */
	function smtpSend($helo, $maiFrom, $maiTo, $header, $body = "") {
		//发送连接命令
		if (!$this->smtpPutcmd("HELO", $helo)) {
			return $this->smtpError("发送 HELO 命令");
		}

		//身份验证
		if($this->authentication){
			if (!$this->smtpPutcmd("AUTH LOGIN", base64_encode($this->smtpUser))) {
				return $this->smtpError("发送 HELO 命令");
			}

			if (!$this->smtpPutcmd("", base64_encode($this->smtpPassword))) {
				return $this->smtpError("发送 HELO 命令");
			}
		}

		//发件人信息
		if (!$this->smtpPutcmd("MAIL", "FROM:<".$maiFrom.">")) {
			return $this->smtpError("发送 MAIL FROM 命令");
		}

		//收件人信息
		if (!$this->smtpPutcmd("RCPT", "TO:<".$maiTo.">")) {
			return $this->smtpError("发送 RCPT TO 命令");
		}

		//发送数据
		if (!$this->smtpPutcmd("DATA")) {
			return $this->smtpError("发送 DATA 命令");
		}

		//发送消息
		if (!$this->smtpMessage($header, $body)) {
			return $this->smtpError("发送 信息");
		}
		
		//发送EOM
		if (!$this->smtpEom()) {
			return $this->smtpError("发送 <CR><LF>.<CR><LF> [EOM]");
		}

		//发送退出命令
		if (!$this->smtpPutcmd("QUIT")) {
			return $this->smtpError("发送 QUIT 命令");
		}

		return true;
	}

	/* 发送SMTP命令
	 * @param string $cmd SMTP命令
	 * @param string $cmd 参数
	 */
	function smtpPutcmd($cmd, $arg = "") {
		if ($arg != '') {
			if	($cmd=='') {
				$cmd = $arg;
			} else {
				$cmd = $cmd.' '.$arg;
			}
		}
		fputs($this->socket, $cmd."\r\n");
		$this->smtpDebug("> ".$cmd."\n");
		return $this->smtpOk();
	}

	/* SMTP错误信息
	 * @param string $string 错误信息
	 */
	function smtpError($string) {
		$this->smtpDebug("[错误]: 在 ".$string." 时发生了错误\n");
		return false;
	}

	/* SMTP信息
	 * @param string $header 头部消息
	 * @param string $body 内容
	 */
	function smtpMessage($header, $body) {
		fputs($this->socket, $header."\r\n".$body);
		$this->smtpDebug("> ".str_replace("\r\n", "\n"."> ", $header."\n> ".$body."\n> "));
		return true;
	}

	/* EOM */
	function smtpEom() {
		fputs($this->socket, "\r\n.\r\n");
		$this->smtpDebug(". [EOM]\n");
		return $this->smtpOk();
	}
	
	/* SMTP OK */
	function smtpOk() {
		$response = str_replace("\r\n", "", fgets($this->socket, 512));
		$this->smtpDebug($response."\n");

		if (preg_match("/^[23]/", $response) == 0) {
			fputs($this->socket, "QUIT\r\n");
			fgets($this->socket, 512);
			$this->smtpDebug("[错误]: 服务器返回 \"".$response."\"\n");
			return false;
		}
		return true;
	}

	/* debug
	 * @param string $message 错误消息
	 */
	private function smtpDebug($message) {
		if ($this->debug) {
			echo $message."<br />";
		}
	}

	/* 网络Socket链接准备
	 * @param string $address 邮件地址
	 * @return boolean
	 */
	private function smtpSockopen($address) {
		if ($this->smtpHost == '') {
			return $this->smtpSockopenMx($address);
		} else {
			return $this->smtpSockopenRelay($this->smtpHost);
		}
	}
	
	/* 获取MX记录
	 * @param string $address 邮件地址
	 * @return boolean
	 */
	private function smtpSockopenMx($address) {
		$domain = ereg_replace("^.+@([^@]+)$", "\\1", $address);
		if (!$this->myCheckdnsrr($domain, 'mx')) {
			$this->smtpDebug("[错误]: 无法找到 MX记录 \"".$domain."\"\n");
			return false;
		}
		$this->smtpSockopenRelay($domain);
		$this->smtpDebug('[错误]: 无法连接 MX主机 ('.$domain.")\n");
		return false;
	}
	
	/* 打开网络Socket链接
	 * @param string $smtpHost 服务器名称
	 * @return boolean
	 */
	private function smtpSockopenRelay($smtpHost) {
		$this->smtpDebug('[操作]: 尝试连接 "'.$smtpHost.':'.$this->smtpPort."\"\n");
		$this->socket = @stream_socket_client('tcp://'.$smtpHost.':'.$this->smtpPort, $errno, $errstr, $this->timeOut);
		if (!($this->socket && $this->smtpOk())) {
			$this->smtpDebug('[错误]: 无法连接服务器 "'.$smtpHost."\n");
			$this->smtpDebug('[错误]: '.$errstr." (".$errno.")\n");
			return false;
		}
		$this->smtpDebug('[成功]: 成功连接 '.$smtpHost.':'.$this->smtpPort."\"\n");
		return true;;
	}

	/* 自定义邮箱有效性验证
	 + 解决window下checkdnsrr函数无效情况
	 * @param string $hostName 主机名
	 * @param string $recType 类型（可以是MX、NS、SOA、PTR、CNAME 或 ANY）
	 * @return boolean
	 */
	function myCheckdnsrr($hostName, $recType = 'MX') {
		if ($hostName != '') {
			$recType = $recType == '' ? 'MX' : $recType;
			exec("nslookup -type=$recType $hostName", $result);
			foreach ($result as $line) {
				if (preg_match("/^$hostName/",$line) > 0) {
					return true;
				}
			}
			return false;
		}
	return false;
	} 
}