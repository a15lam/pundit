FROM ubuntu:xenial

ENV DEBIAN_FRONTEND nonintera:ctive

RUN apt-get update -y && apt-get install -y --no-install-recommends software-properties-common

RUN LANG=C.UTF-8 add-apt-repository ppa:ondrej/php -y && \
    apt-get update && apt-get install -y --no-install-recommends --allow-unauthenticated \
    git-core curl mcrypt openssl zip wget php7.1-fpm php7.1-common \
    php7.1-cli php7.1-curl php7.1-json php7.1-mcrypt php7.1-mysqlnd php7.1-pgsql php7.1-sqlite \
    php-pear php7.1-dev php7.1-ldap php7.1-interbase php7.1-mbstring php7.1-zip php7.1-xml
