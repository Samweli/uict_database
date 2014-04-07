<?php

require_once('config/config.php');
require_once('./includes/services/Loader.php');
require_once('./includes/model/user.php');
require_once('./includes/model/session.php');
require_once('./includes/services/functions.php');


// load the (optional) Composer auto-loader
if (file_exists('vendor/autoload.php')) {
    require 'vendor/autoload.php';
}

// load application config (error reporting etc.)


// load application class
require 'libs/application.php';
require 'libs/controller.php';
require 'libs/security.php';

// start the application
$app = new Application();

?>
