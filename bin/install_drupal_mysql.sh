#!/bin/bash

#
# Build an instance of Drupal using mysql.
# This assumes that you have a mysql user
# 'root' with no password.  Travis sets
# up one of these for you by default.
#
BASEDIR=${pwd}
rm -rf html
$BASEDIR/vendor/bin/drush make -y --force-complete drupal.make html
cd html
$BASEDIR/vendor/bin/drush si -y standard --db-url=mysql://root@localhost/cit-tma --account-name=admin --account-pass=admin
