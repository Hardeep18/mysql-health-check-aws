FROM registry2.agiliz.tech/php-ca

RUN rm -rf /var/www/html/*
RUN mkdir /var/www/html/php
RUN mkdir /var/www/html/php/health-check
WORKDIR /var/www/html/php/health-check
COPY index.html /var/www/html/php/
COPY testdb.php /var/www/html/php/health-check
RUN rm -rf /etc/apache2/sites-available/000-default.conf
COPY default.conf /etc/apache2/sites-available/000-default.conf
ADD service.sh /
#RUN chmod 777 /var/www/html/examina/storage/logs/laravel.log
CMD ["/bin/bash", "/service.sh"]
