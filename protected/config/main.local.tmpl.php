<?php
/**
 * copy to main.local.php and adjust values to your need
 */
return array(
	'preload' => array(
		'debug',
		'xhprof'
	),
	'import' => [
		'ext.zhuravljov.yii2-debug.*',
		'ext.stevad.yii-xhprof.*'
	],
	'components'=>array(
		'db'=>array(
			'connectionString' => '{{DB_SYSTEM}}:host={{DB_HOST}};dbname={{DB_NAME}}',
			'username' => '{{DB_USER}}',
			'password' => '{{DB_PASS}}',
			'emulatePrepare' => true,
			'charset' => 'utf8',
			'class' => 'CDbConnection',
			'initSQLs' => array('SET NAMES utf8')
		),
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'caseSensitive'=>false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		'xhprof' => array(
			'class' => 'XHProfComponent', // if you install to protected/extensions
			'libPath' => '/www/protected/extensions/lox/xhprof/xhprof_lib',
			'htmlReportBaseUrl' => 'http://192.168.56.5/xhprof/xhprof_html',
		),
		'debug' => array(
			'class' => 'Yii2Debug', // composer installation
			'panels' => array(
				'xhprof' => array(
					'class' => 'XHProfPanel', // if you install to protected/extensions
				)
			)
		),
	)
);
