@ECHO OFF
SET BIN_TARGET=%~dp0/../vendor/drush/drush/drush.complete.sh
php "%BIN_TARGET%" %*
