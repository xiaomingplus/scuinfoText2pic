FROM nmcteam/php56


# PHP config
ADD php.ini    /etc/php5/fpm/php.ini
ADD php-fpm.conf    /etc/php5/fpm/php-fpm.conf

WORKDIR /opt

# Write Permission
RUN usermod -u 1000 www-data

EXPOSE 9000
VOLUME ["/opt"]
