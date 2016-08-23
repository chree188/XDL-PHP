<?php

namespace HY;

class Logs{
	public function log($content){
		file_put_contents(TMP_PATH . 'log.txt',$content, FILE_APPEND);
	}
}