# How to setup the project

## Adjust composer

Open composer.json and adjust "vendor/name" that it fits your project. Add additional information or dependencies if needed.

## Install dependencies

First download all dependencies needed by this project. You can do this by executing the composer dependency manager for PHP

	php /path/to/composer.phar composer.json

Composer will automatically download everything that is needed to run the project. Composer is light weighted and does not
need to be installed. Simply download it from http://getcomposer.org/download/ and run it.

## Setup runtime paths

Yii needs to paths to be set up in order to run without problems. Simply create them on the command line.

	mkdir protected/runtime
	mkdir htdocs/assets

In order for everyone having the proper access rights, configure you shell user and your web user to in the same group and
set the access rights as followed:

	chgrp www-data protected/runtime htdocs/assets
	chmod 775 protected/runtime
	chmod 775 htdocs/assets

If it is not possible to put both users in the same group, set permissions to 777 and skip chgrp.

## Setup configuration

Copy protected/config/console.local.tmpl.php to protected/config/console.local.php and protected/config/main.local.tmpl.php
to protected/config/main.local.php and configure them to your needs. They will override the defaults set in
protected/config/main.php and protected/config/console.php.

## Run webserver

You can either install this on a real webserver environment or simply run the application with the PHP built-in webserver. Simply execute

	sh bin/server.sh {port}
