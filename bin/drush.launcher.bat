@ECHO OFF
SET BIN_TARGET=%~dp0/../vendor/drush/drush/drush.launcher
sh "%BIN_TARGET%" %*
