@ECHO OFF
SET BIN_TARGET=%~dp0/../vendor/drush/drush/drush.php
php "%BIN_TARGET%" %*
