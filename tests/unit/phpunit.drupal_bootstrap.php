<?php
/**
 * Script to bootstrap Drupal 7 for PHPUnit tests.
 * On multisite installation, set $http_host variable
 * to the site you want to test.
 */

/*=====================
  SETTINGS
  ====================*/

// set here drupal root path
$drupal_root = guessDrupalRootPath();
print_r($drupal_root);
// in a multisite installation, set here the domain name you are testing.
$http_host = 'localhost';

/*=====================
  DRUPAL BOOTSTRAP
  ====================*/

// try to guess drupal root path if not specified.
function guessDrupalRootPath() {
  $path = getcwd();
  $os =strtoupper(substr(PHP_OS, 0, 3));

  if ($os == "WIN"){
    $array = explode("\\", $path);
    $path = implode('/', $array);
  }

  while ($path != '/') {
    if (file_exists($path . '/html/includes/bootstrap.inc')) {
      break;
    }
    $path = dirname($path);
  }
  return $path;
}

$_SERVER['HTTP_HOST'] = $http_host;
$_SERVER['SCRIPT_NAME'] = '/html/index.php';
$_SERVER['REMOTE_ADDR'] = '127.0.0.1';
$_SERVER['REQUEST_METHOD'] = 'GET';
$_SERVER['SERVER_NAME'] = NULL;
$_SERVER['SERVER_SOFTWARE'] = NULL;
$_SERVER['HTTP_USER_AGENT'] = NULL;

define('DRUPAL_ROOT', $drupal_root.'/html');
require_once DRUPAL_ROOT . '/includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
