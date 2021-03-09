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

COPY a.php /var/task

COPY bootstrap /var/runtime
RUN chmod 755 /var/runtime/bootstrap

CMD [ "handler.php" ]

#
## ---- Build local image for development ---- #
#
#FROM base as image-local
#
#ARG DEST
#
## Use bash conditional to prevent install on each build unless required
#RUN if [[ "$DEST" == "local" ]] ; then \
#        yum --enablerepo=remi-php74 install -y \
#        php-xdebug ; \
#    fi
#
#
## ---- Build aws image for deployment ---- #
#
#FROM base as image-aws
#
#ARG DEST
#
##COPY bootstrap /var/runtime
##RUN chmod 755 /var/runtime/bootstrap
##
##COPY 99-prod-overrides.ini /etc/php.d
##
##COPY handler.php composer.json composer.lock auth.json /var/task/
##COPY src /var/task/src
##
### Use bash conditional to prevent install on each build unless required
##RUN if [[ "$DEST" == "aws" ]] ; then \
##        composer install --no-ansi --no-dev --no-interaction --no-progress --prefer-dist --no-scripts --optimize-autoloader ; \
##    fi
#
##RUN yum remove -y composer
#
#
#FROM image-$DEST AS final

