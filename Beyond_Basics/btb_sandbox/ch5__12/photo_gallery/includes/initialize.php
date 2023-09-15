<?php

// // Define the core paths
// // Define them as absolute paths to make sure that require_once works as expected

// // DIRECTORY_SEPARATOR is a PHP pre-defined constant
// // (\ for Windows, / for Unix)
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

// defined('SITE_ROOT') ? null : 
// 	define('SITE_ROOT', DS.'Users'.DS.'kevin'.DS.'Sites'.DS.'photo_gallery');

// defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT.DS.'includes');

  // Assign file paths to PHP constants
  // __FILE__ returns the current path to this file
  // dirname() returns the path to the parent directory
  define("INCLUDES_PATH", dirname(__FILE__));
  //echo INCLUDES_PATH;
  define("PROJECT_PATH", dirname(INCLUDES_PATH));
  //echo PROJECT_PATH;
  define("PUBLIC_PATH", PROJECT_PATH . '/public');
  define("LOGS_PATH", PROJECT_PATH . '/logs');

  // Assign the root URL to a PHP constant
  // * Do not need to include the domain
  // * Use same document root as webserver
  // * Can set a hardcoded value:
  // define("WWW_ROOT", '/~kevinskoglund/globe_bank/public');
  // define("WWW_ROOT", '');
  // * Can dynamically find everything in URL up to "/public"
  $public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
  $doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
  define("WWW_ROOT", $doc_root);

// load config file first
require_once(INCLUDES_PATH.DS.'config.php');

// load basic functions next so that everything after can use them
require_once(INCLUDES_PATH.DS.'functions.php');

// load core objects
require_once(INCLUDES_PATH.DS.'session.php');
require_once(INCLUDES_PATH.DS.'database.php');
require_once(INCLUDES_PATH.DS.'database_object.php');
require_once(INCLUDES_PATH.DS."PHPMailer".DS."src".DS."PHPMailer.php");
require_once(INCLUDES_PATH.DS."PHPMailer".DS."src".DS. "SMTP.php");


// load database-related classes
require_once(INCLUDES_PATH.DS.'user.php');
require_once(INCLUDES_PATH.DS.'photograph.php');
require_once(INCLUDES_PATH.DS.'comment.php');
require_once(INCLUDES_PATH.DS.'pagination.php');


?>