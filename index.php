<?php

<<<<<<< HEAD
require_once('./includes/services/Loader.php');
require_once('./includes/model/user.php');
include('./includes/model/session.php');

=======
/**
 * A simple PHP MVC skeleton
 *
 * @package php-mvc
 * @author Panique
 * @link http://www.php-mvc.net
 * @link https://github.com/panique/php-mvc/
 * @license http://opensource.org/licenses/MIT MIT License
 */
require_once('config/config.php');
require_once('./includes/services/loader.php');
require_once('./includes/model/user.php');
require_once('./includes/model/session.php');
require_once('./includes/services/functions.php');
>>>>>>> cc27163109ee226d3886bc92eb694a563653ae6b

// load the (optional) Composer auto-loader
if (file_exists('vendor/autoload.php')) {
    require 'vendor/autoload.php';
}

// load application config (error reporting etc.)


// load application class
require 'libs/application.php';
require 'libs/controller.php';

// start the application
$app = new Application();

?>
