###### Start PHP7 container

docker run -it -v $(pwd):/scbi php:7.0-cli bash

###### Update and add tools to container

apt-get update -y && \
apt-get install -y wget vim unzip zip && \
cd ./scbi && \
wget https://getcomposer.org/composer.phar

###### Install PHP ext's req. but Codeception / Stripe
php composer.phar install --profile --prefer-dist -o -v
