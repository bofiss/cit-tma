@ECHO OFF
SET BIN_TARGET=%~dp0/../vendor/phplint/phplint/bin/phplint
php "%BIN_TARGET%" %*
