ARG DEST

FROM amazon/aws-lambda-provided:al2 as base

RUN yum install -y amazon-linux-extras
RUN amazon-linux-extras install epel -y

# http://rpms.remirepo.net/
RUN rpm -Uvh http://rpms.remirepo.net/enterprise/remi-release-7.rpm

# yaml extension temp requirement for composer dependencies
RUN yum --enablerepo=remi-php74 install -y \
    php-cli \
    composer

CMD [ "handler.php" ]


# ---- Build local image for development ---- #

FROM base as image-local

ARG DEST

RUN  yum --enablerepo=remi-php74 install -y \
        php-xdebug

# ---- Build aws image for deployment ---- #

FROM base as image-aws

ARG DEST

COPY bootstrap /var/runtime
RUN chmod 755 /var/runtime/bootstrap

COPY a.php /var/task/

# RUN composer install --no-ansi --no-dev --no-interaction --no-progress --prefer-dist --no-scripts --optimize-autoloader ; \

RUN yum remove -y composer

FROM image-$DEST AS final

