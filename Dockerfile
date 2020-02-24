FROM drupal:8-apache
#MAINTAINER Edgar Dueñas / Christian Pernillo
ENV LAST_MODIFIED "11-12-2018"

# Installing usefull tools
RUN apt-get update
RUN apt-get install -y unzip wget zip
RUN apt-get install -y nano vim

# Install Postfix for send email
#RUN apt-get install -y postfix rsyslog \
#    && apt-get clean

#RUN apt-get upgrade bash -y
#ADD docker-config/main.cf /
#ADD docker-config/startservices.sh /
#RUN chmod +x startservices.sh

# Getting and installing composer
RUN wget https://getcomposer.org/composer.phar && chmod +x composer.phar && mv composer.phar /usr/local/bin/composer

# Install Laravel Envoy
RUN composer global require "laravel/envoy=~1.0"

# Install librery mysqli
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Create directories for Drupal
RUN mkdir -p /tmp/drupal && chown www-data:www-data /tmp/drupal
RUN chown www-data:www-data /var/www
WORKDIR /var/www/html

# Config
ENV DOCROOT=/var/www/html/web
COPY docker-config/apache.conf /etc/apache2/sites-enabled/000-default.conf
ADD docker-config/bashrc.sh /var/www/.bashrc

# Getting drush
#ADD docker-config/drushrc.php /etc/drush/drushrc.php

#ENTRYPOINT ["/startservices.sh"]