#!/bin/bash

echo Updating base linux box
if [ ! -f "/tmp/apt-get-update" ]
then
    /usr/bin/sudo /usr/bin/apt-get -q -y update
    #/usr/bin/sudo /usr/bin/apt-get -q -y upgrade
    #/usr/bin/sudo /usr/bin/apt-get -q -y dist-upgrade
    touch /tmp/apt-get-update
fi

# PHP SETUP
echo Install PHP5 stuff
/usr/bin/sudo /usr/bin/apt-get -q -y install php5
/usr/bin/sudo /usr/bin/apt-get -q -y install php5-cli
/usr/bin/sudo /usr/bin/apt-get -q -y install php5-fpm
/usr/bin/sudo /usr/bin/apt-get -q -y install php5-common php5-curl php5-json
/usr/bin/sudo /usr/bin/apt-get -q -y install php5-xdebug php5-xhprof

ln -fs /etc/php5/mods-available/xhprof.ini /etc/php5/apache2/conf.d/
ln -fs /etc/php5/mods-available/xhprof.ini /etc/php5/cli/conf.d/
ln -fs /etc/php5/mods-available/xhprof.ini /etc/php5/fpm/conf.d/

# ENV SETUP
echo Setup linux environment
/usr/bin/sudo /usr/bin/apt-get -q -y install htop
/usr/bin/sudo /usr/bin/apt-get -q -y install supervisor
/usr/bin/sudo /usr/bin/apt-get -q -y install vim
/usr/bin/sudo /usr/bin/apt-get -q -y install graphviz
/usr/bin/sudo /usr/bin/apt-get -q -y install git

if [ ! -f "/usr/bin/composer" ]
then
    echo Download composer
    /usr/bin/curl -sS https://getcomposer.org/installer | /usr/bin/sudo /usr/bin/php -- --install-dir=/usr/bin/ --filename=composer
fi

/usr/bin/composer self-update

# APP SETUP
echo Setup the app
APP_DIR=/www
LOG_DIR=$APP_DIR/logs
WEB_DIR=$APP_DIR/htdocs

mkdir -p -m 0755 $LOG_DIR
mkdir -p -m 0755 $APP_DIR/protected/runtime
mkdir -p -m 0755 $WEB_DIR/assets

cd $APP_DIR
/usr/bin/composer install

if [ ! -f "$APP_DIR/protected/config/main.local.php" ]
then
    echo Copy example application config
    cp -f $APP_DIR/protected/config/main.local.tmpl.php $APP_DIR/protected/config/main.local.php
fi

# APACHE SETUP
echo Setup apache webserver
rm -f /etc/apache2/sites-enabled/000-default.conf
cp -f /vagrant/files/etc/apache2/sites-available/yii.conf /etc/apache2/sites-available/
ln -fs /etc/apache2/sites-available/yii.conf /etc/apache2/sites-enabled/
ln -fs /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled/

service apache2 restart
