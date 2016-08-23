<?php 
header("Content-Type: text/html; charset=UTF-8");
define('INDEX_PATH' , str_replace('\\', '/', dirname(__FILE__)).'/');
if(is_file(INDEX_PATH . '../Conf/config.php')){
	$data = include INDEX_PATH . '../Conf/config.php';
	if(isset($data['DOMAIN_NAME']))
	    die('你已经安装过,如果需要重装请将 /Conf/config.php删除');
}


function ok($content){
	echo '<span class="label label-success"><i class="fa fa-check" aria-hidden="true"></i> '.$content.'</span>';
}
function no($content){
	echo '<span class="label label-danger"><i class="fa fa-close" aria-hidden="true"></i> '.$content.'</span>';
}
function userOS(){  
     
    return PHP_OS;   
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>
		    HY PHP框架
		</title>
		<script type="text/javascript" src="../public/js/jquery1.11.3.min.js"></script>
		<script type="text/javascript" src="stickUp.min.js"></script>
		
		<link href="../public/admin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="../public/admin/css/docs.min.css" rel="stylesheet">
		<link href="../public/css/font-awesome.min.css" rel="stylesheet">

		<style>
		body{
			    background-color: #f1fcff;
		}
		.box {
		    padding: 10px;
		    background-color: #FFF;
		    border: 1px solid #E3E3E3;
		    box-shadow: 1px 2px 17px #D8D8D8;
		    margin-bottom: 50px;
		}
		.bs-docs-header, .bs-docs-masthead{
			    background-color: #186d6e;
		}
		.bs-docs-header p{
			color: #FFF
		}
		pre{
			    max-height: 604px;
			overflow: auto;
			    overflow-x: hidden;
    white-space: normal;
    
			    
		}
		pre *{
			    color: #407423;
			    font-weight: 600;
			    font-size: 16px;

		}
		.isStuck{
			margin-top:30px;
		}
		</style>
		<script type="text/javascript">
		jQuery(function($) {
            $(document).ready( function() {
              //enabling stickUp on the '.navbar-wrapper' class
              $('pre').stickUp({ marginTop: '30px'});
            });

            

          });

		</script>
	</head>
	<body>
		<div class="bs-docs-header" id="content" tabindex="-1">
	        <div class="container">
	            <h1>HY BBS 安装程序 v1.4.0.11</h1>
	            <p>
	                HYBBS 轻论坛程序安装页面.
	            </p>
	            
	        </div>
	    </div>
	    <div class="container">
			
			<table class="table table-bordered" style="background:#FFF">
			 <thead>

			 	<tr>
			 		<th>环境</th>
			 		<th>结果</th>
			 	</tr>
			 </thead>
			 <tbody>
			 <tr>
			 	<td>WEB服务器</td>
			 	<td><?php echo $_SERVER['SERVER_SOFTWARE'];?></td>
			 </tr>
			 <tr>
			 	<td>PHP版本</td>
			 	<td><?php echo PHP_VERSION;?></td>
			 </tr>
			 <tr>
			 	<td>系统类型</td>
				<td><?php echo userOS();?></td>
			 </tr>
			 </tbody>
			</table>
			<table class="table table-bordered" style="background:#FFF">
			 <thead>

			 	<tr>
			 		<th>检测</th>
			 		<th>要求</th>
			 		<th>结果</th>
			 		<th>解决方案</th>
			 	</tr>
			 </thead>
			 <tbody>
			 	<tr>
			 		<td>PHP环境</td>
			 		<td>PHP版本 5.3以上 (包括5.3)</td>
			 		<td><?php 
			 		 if(version_compare(PHP_VERSION,'5.3.0','<')){
			 		 	no('不支持 (PHP '.PHP_VERSION.')');
			 		 	echo '</td><td>提升PHP版本';
			 		 }
			 		 else
			 		 	ok('支持');
			 		?></td>
			 		
			 	</tr>
			 	<tr>
			 		<td>数据库环境</td>
			 		<td>PDO</td>
			 		<td><?php 
			 		 if(!class_exists('PDO')){
			 		 	no('不支持 PDO');
			 		 	echo '</td><td>php.ini 找到 php_pdo 模块去除注释.';
			 		 }
			 		 else
			 		 	ok('支持');
			 		?></td>
			 		
			 	</tr>
			 	
			 	<tr>
			 		<td>伪静态规则</td>
			 		<td>必须安装</td>
			 		<td>
			 			<span id="txt1">
			 				<span class="fa fa-bug"></span> 检测中
			 			</span>
			 			<script type="text/javascript">
			 			var href=window.location.href;
			 			if(href.substr(href.length-1,1) !='/')
			 				href+='/';
			 			href+='../Inst/install';
			 			
			 			$.ajax({
			 				url:href,
			 				dataType:'html',
			 				success:function(e){
			 					
			 					if(e=='install')
			 						$("#txt1").html('<?php ok('正常'); ?>')
			 					else
			 						$("#txt1").html('<?php no('不正常'); ?>')
			 				},error:function(){
			 					$("#txt1").html('<?php no('不正常'); ?>')
			 				}
			 			});

			 			</script>
			 		</td>
			 		<td id="txt2">
			 			<a href="http://bbs.hyphp.cn/t/489.html" target="_blank">查看解决方案</a>
			 		</td>
			 		
			 	</tr>
			 	<tr>
			 		<td>CURL模块</td>
			 		<td>建议开启</td>
			 		<td>
			 			<?php 
				 		 if(!function_exists('curl_init')){
				 		 	no('未开启');
				 		 	echo '</td><td>php.ini开启curl';
				 		 }
				 		 else
				 		 	ok('已开启');
				 		?>
			 			
			 		</td>
			 		
			 		
			 	</tr>
			 	<tr>
			 		<td>ZIP关键函数</td>
			 		<td>gzinflate函数 可能被空间禁用</td>
			 		<td>
			 			<?php 
				 		 if(!function_exists('gzinflate')){
				 		 	no('被禁用');
				 		 	echo '</td><td>php.ini开启curl';
				 		 }
				 		 else
				 		 	ok('已开启');
				 		?>
			 			
			 		</td>
			 		
			 		
			 	</tr>
			 	<tr>
			 		<td>PHP时区</td>
			 		<td>建议到php.ini 找到data.timezone 值改为 "Asia/Shanghai"</td>
			 		<td>
			 			<?php 
				 	
				 		 	ok(date_default_timezone_get());
				 		?>
			 			
			 		</td>
			 		<td>
			 		此项可忽略
			 		</td>
			 		
			 		
			 	</tr>
			 	

			 	<tr>
			 		<td>OPENSSL</td>
			 		<td>PHP访问HTTPS远程链接 (建议开启) (可忽略此项)</td>
			 		<td>
			 			<?php 
				 		 if(!extension_loaded('openssl')){
				 		 	no('被禁用 (可忽略)');
				 		 	echo '</td><td>php.ini 找到 php_openssl 去掉注释开启';
				 		 }
				 		 else
				 		 	ok('已开启');
				 		?>
			 			
			 		</td>
			 		
			 		
			 	</tr>

			 	<tr>
			 		<td>
			 			/Tmp 目录权限
			 		</td>
			 		<td>
			 			必须可读可写
			 		</td>
			 		<td>
			 			<?php 
			 				if(@file_put_contents('../Tmp/install', '1') === false){
			 					no('无写入权限');
			 					echo '</td><td>建议将/Tmp目录权限设为 777';
			 				}
			 				else{

			 					if(@file_get_contents('../Tmp/install') !== '1'){
			 						no('无读取权限');
			 						echo '</td><td>建议将/Tmp目录权限设为 777';
			 					}
			 					else{
			 						if(is_file('../Tmp/install'))
			 							unlink('../Tmp/install');
			 						ok('通过');
			 					}
			 				}
			 			?>
			 		</td>
			 		
			 	</tr>
			 	<tr>
			 		<td>
			 			/Conf 目录权限
			 		</td>
			 		<td>
			 			必须可读可写
			 		</td>
			 		<td>
			 			<?php 
			 				if(@file_put_contents('../Conf/install', '1') === false){
			 					no('无写入权限');
			 					echo '</td><td>建议将/Conf 目录权限设为 777';
			 				}
			 				else{

			 					if(@file_get_contents('../Conf/install') !== '1'){
			 						no('无读取权限');
			 						echo '</td><td>建议将/Conf 目录权限设为 777';
			 					}
			 					else{
			 						if(is_file('../Conf/install'))
			 							unlink('../Conf/install');
			 						ok('通过');
			 					}
			 				}
			 			?>
			 		</td>
			 		
			 	</tr>
			 	<tr>
			 		<td>
			 			/Plugin 目录权限
			 		</td>
			 		<td>
			 			必须可读可写
			 		</td>
			 		<td>
			 			<?php 
			 				if(@file_put_contents('../Plugin/install', '1') === false){
			 					no('无写入权限');
			 					echo '</td><td>建议将/Plugin 目录权限设为 777';
			 				}
			 				else{

			 					if(@file_get_contents('../Plugin/install') !== '1'){
			 						no('无读取权限');
			 						echo '</td><td>建议将/Plugin 目录权限设为 777';
			 					}
			 					else{
			 						if(is_file('../Plugin/install'))
			 							unlink('../Plugin/install');
			 						ok('通过');
			 					}
			 				}
			 			?>
			 		</td>
			 		
			 	</tr>
			 	<tr>
			 		<td>
			 			/View 目录权限
			 		</td>
			 		<td>
			 			必须可读可写
			 		</td>
			 		<td>
			 			<?php 

			 				if(@file_put_contents('../View/install.txt', '1') === false){
			 					no('无写入权限');
			 					echo '</td><td>建议将/View 目录权限设为 777';
			 				}
			 				else{

			 					if(@file_get_contents('../View/install.txt') !== '1'){
			 						no('无读取权限');
			 						echo '</td><td>建议将/View 目录权限设为 777';
			 					}
			 					else{
			 						if(is_file('../View/install.txt'))
			 							unlink('../View/install.txt');
			 						ok('通过');
			 					}
			 				}
			 			?>
			 		</td>
			 		
			 	</tr>
			 </tbody>
			</table>
			
			
			<p class="alert alert-warning">请确认以上项目全部通过 再通过下面表单进行安装</p>
			<div class="row" id="div1" style="">
				<div class="col-md-6">
				<h2>数据库配置</h2>
				<table class="table table-bordered" style="background:#FFF">
				 <thead>
				 <tr>
				 	<th>PDO (本地配置支持情况)</th>
				 	<th>可用状态 </th>
				 </tr>
				 </thead>
				 <tbody>
				 	<tr>
				 		<td>My SQL (3306)</td>
				 		<td><?php if(extension_loaded('pdo_mysql')) ok('支持'); else no('已禁用'); ?></td>
				 	</tr>
				 	<tr>
				 		<td>Ms SQL (1433)</td>
				 		<td><?php if(extension_loaded('pdo_mssql')) ok('支持'); else no('已禁用'); ?></td>
				 	</tr>
				 	<tr>
				 		<td>Oracle</td>
				 		<td><?php if(extension_loaded('pdo_oci')) ok('支持'); else no('已禁用'); ?></td>
				 	</tr>
				 	<tr>
				 		<td>PostgreSQL</td>
				 		<td><?php if(extension_loaded('pdo_pgsql') && extension_loaded('pgsql')) ok('支持'); else no('已禁用'); ?></td>
				 	</tr>
				 	<tr>
				 		<td>Sybase</td>
				 		<td><?php if(extension_loaded('pdo_dblib ')) ok('支持'); else no('已禁用'); ?></td>
				 	</tr>
				 	
				 </tbody>
				 </table>
			<form id="form">
               <div class="form-group">
                    <label for="exampleInputEmail1">数据库 类型</label>
                    <select name="sqltype" class="form-control">
                      <option value="mysql">MySQL</option>
                      <option value="mssql">MsSQL</option>
                      <option value="oracle">Oracle</option>
                      <!-- <option value="sqlite">SQLite</option> -->
                      <option value="PostgreSQL">PostgreSQL</option>
                      <option value="Sybase">Sybase</option>
                    </select>
                </div>
              <div class="form-group">
                <label for="exampleInputEmail1">数据库 IP</label>
                <input type="text" name="ip" class="form-control" value="localhost">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">数据库名</label>
                <input type="text" name="name" class="form-control" value="">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">数据库 账号</label>
                <input type="text" name="username" class="form-control" value="root">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">数据库 密码</label>
                <input type="password" name="password" class="form-control" >
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">数据库 端口</label>
                <input type="text" name="port" class="form-control" value="3306">
              </div>
             
              <h2>网站管理配置</h2>
              <div class="form-group">
                <label for="exampleInputPassword1">域名 &nbsp;&nbsp;&nbsp;&nbsp;(例: bbs.hyphp.cn) 请勿追加http:// 此类非域名的字符</label>
                <input type="text" name="www" id="www" class="form-control" value="">
              </div>
              <script>
              document.getElementById("www").value = window.location.host;
              </script>
              <div class="form-group">
                <label for="check">使用 https (ssl) &nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input id="check" type="checkbox" name="https" value="on"/>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">管理员邮箱 (请认真填写)</label>
                <input type="text" name="email" class="form-control" value="">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">管理员账号 </label>
                <input type="text" name="bbs_user" class="form-control" value="admin">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">管理员密码 (最少6位)</label>
                <input type="password" name="bbs_pass" class="form-control" value="">
              </div>
              </form>
              <button type="submit" class="btn btn-default btn-block" onclick="install();">安装</button>
			
			</div>
			<div class="col-md-6">
			<h2>安装过程记录</h2>
			<pre></pre>
			</div>
			</div>
	    </div>
		<div id="footer" style="text-align: center;margin: 90px 0 30px 0;">
			<span class="beian">HYBBS © 2016. All Rights Reserved.</span>
		</div>
		<script type="text/javascript">
			function install(){
				var href=window.location.href;
	 			if(href.substr(href.length-1,1) !='/')
	 				href+='/';
	 			href+='./mysql.php';
	 			

				$.ajax({
					url:href,
					type:'post',
					data:$("#form").serialize(),

					dataType:'html',

					success:function(e){
						$("pre").html('');
						if(e!='sql success'){
							app_text('<i class="fa fa-close" style="color:#e13e3e"></i> 数据库测试连接出错: '+e,'#e13e3e');
						}
						else{//测试连接成功
							href=window.location.href;
				 			if(href.substr(href.length-1,1) !='/')
				 				href+='/';
				 			href+='../Inst';
				 			app_text('<i class="fa fa-check"></i> 连接测试成功;')
				 			app_text('<i class="fa fa-check"></i> 正在安装,请勿离开...;')
							$.ajax({
								url:href,
								type:'post',
								data:$("#form").serialize(),
								dataType:'json',
								success:function(e){
									if(!e.error)
										app_text('<i class="fa fa-close" style="color:#e13e3e"></i> 数据库安装出错: '+e.info,'#e13e3e');
									else{
										app_text('<i class="fa fa-check"></i> '+e.info);
										app_text('<i class="fa fa-check"></i> 程序安装成功');
										app_text('<i class="fa fa-check"></i> 建议删除 /install 目录');
									}
									
									$('pre').scrollTop( $('pre')[0].scrollHeight );
								}

							})
						}
					}
				});
			}
			function app_text(str,color){
				$("pre").append('<p style="color:'+color+'">'+str+'</p>');
			}

			</script>

	</body>
</html>
