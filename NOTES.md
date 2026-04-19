###### Start PHP7 container
docker run -it -v $(pwd):/scbi php:7 bash

###### Update and add tools to container
apt-get update -y && \
apt-get install -y git wget vim unzip zip zlib1g-dev && \
docker-php-ext-install zip && \
pecl install -o -f xdebug && \
echo "zend_extension=/usr/local/lib/php/extensions/no-debug-non-zts-20170718/xdebug.so" > /usr/local/etc/php/conf.d/xdebug.ini

###### Install library dependencies
cd ./scbi && \
wget https://getcomposer.org/composer.phar -O composer.phar && \
php composer.phar install --profile --prefer-dist -o -v

###### Run unit tests
clear && ./vendor/bin/phpunit --bootstrap ./vendor/autoload.php
