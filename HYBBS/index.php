<?php
/*


	
	ios Safari 工具栏


	open https


*/




if(version_compare(PHP_VERSION,'5.3.0','<'))die('You Need PHP Version > 5.3.0 !  You PHP Version = ' . PHP_VERSION);


define('HYBBS_V','1.4.0.12');
define('INDEX_PATH' , str_replace('\\', '/', dirname(__FILE__)).'/');

define('DEBUG'      ,(is_file(INDEX_PATH . 'DEBUG'))?false:true);
define('PLUGIN_ON'  ,true);
define('PLUGIN_ON_FILE',true);
require INDEX_PATH . 'HY/HY.php';