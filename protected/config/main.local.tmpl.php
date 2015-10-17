<?php
/**
 * copy to main.local.php and adjust values to your need
 */
return array(
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
	)
);
