<?php

//css+images+js==document_root
// root www.




define('ROOT_WWW','');



define('SITE_DIR',ROOT_DIR . "app");
define('SITE_WWW_DIR',ROOT_WWW . "app");



define('APPROOT',ROOT_DIR . "app");


// URL Root
define('URLROOT', 'http://mvc-dary.local');
// Site Name
define('SITENAME', 'Test post for users');
// App Version
define('APPVERSION', '1.0.0');




define('LIBRARIES_DIR', SITE_DIR . "/libraries");
define('LIBRARIES_WWW_DIR',SITE_WWW_DIR . "/libraries");


define('MODELS_DIR', SITE_DIR . "/models");
define('MODELS_DIR',SITE_WWW_DIR . "/models");



define('CONTROLLERS_DIR', SITE_DIR . "/controllers");
define('CONTROLLERS_WWW_DIR',SITE_WWW_DIR . "/controllers");




define('VIEW_DIR', SITE_DIR . "/views");
define('VIEW_WWW_DIR',SITE_WWW_DIR . "/views");


define('HELPERS_DIR', SITE_DIR . "/helpers");
define('HELPERS_WWW_DIR',SITE_WWW_DIR . "/helpers");





define('PUBLIC_DIR', ROOT_DIR . "/public");
define('PUBLIC_WWW_DIR', ROOT_DIR . "/public");


define ('CSS_DIR',PUBLIC_WWW_DIR . "/css");
define ('CSS_WWW_DIR',PUBLIC_WWW_DIR . "/css");


define ('JS_DIR',PUBLIC_WWW_DIR . "/js");
define ('JS_WWW_DIR',PUBLIC_WWW_DIR . "/js");


// lib dir -
define('LIB_DIR', ROOT_DIR . "/lib");
define('LIB_WWW_DIR', ROOT_WWW . "/lib");



define("INCLUDES_DIR",ROOT_DIR . "/");
define("INCLUDES_WWW_DIR",ROOT_WWW . "/includes");

define("USER_DIR",ROOT_DIR . "/");
define("USER_WWW_DIR",ROOT_WWW . "/");


 /* set version number */
define("VERSION", "1.0");                              // apps version



// /* assign base system constants */
// define("SITE_URL", "http://mvc-dary.local");     // base site url


// //define("SITE_DIR", "/");                               // base site directory
// define("BASE_DIR", $_SERVER["DOCUMENT_ROOT"]);         // base file directory
// define("SELF", $_SERVER["PHP_SELF"]);                  // self file directive
// define("FILEMAX", 1500000);                             // file size max






 //define('DB_HOST', '192.168.0.204');
 define('DB_HOST', '127.0.0.1');
 define('DB_USER', 'root');
 define('DB_PASSWORD','alon');


//define('DB_USER', 'alon');
//define('DB_PASSWORD','qwerty');
 define('DB_TBL_PREFIX', '');



 define('DB_DATABASE','user_post');
 define('DB_SCHEMA', 'user_post');




