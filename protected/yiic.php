<?php

// change the following paths if necessary
$yiic=dirname(__FILE__).'/extensions/yiisoft/yii/framework/yiic.php';
$config=include  dirname(__FILE__).'/config/console.php';

if (file_exists(dirname(__FILE__) . '/config/console.local.php'))
{
	$config_local = include dirname(__FILE__) . '/config/console.local.php';
	$config = array_merge_recursive($config, $config_local);
}

require_once($yiic);
