<?php

namespace HY;

class Logs{
	public function log($content){
		if(!is_file(TMP_PATH . 'log.php'))
			file_put_contents(TMP_PATH . 'log.php','<?php die(); ?>');
		file_put_contents(TMP_PATH . 'log.php',$content, FILE_APPEND);
	}
}