FROM drupal:8.8.10-apache-buster
WORKDIR /opt/drupal
RUN set -eux; \
        composer require drush/drush;

