<?php

require_once('./includes/services/Loader.php');


// load the (optional) Composer auto-loader
if (file_exists('vendor/autoload.php')) {
    require 'vendor/autoload.php';
}

// load application config (error reporting etc.)
require 'config/config.php';

// load application class
require 'libs/application.php';
require 'libs/controller.php';

// start the application
$app = new Application();

?>