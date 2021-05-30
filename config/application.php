<?php
$config_dir = dirname( __FILE__);
$root_dir = str_replace("/config", "", $config_dir);//line for all time replace config with nothing
define('ROOT_DIR', $root_dir);
unset($root_dir, $config_dir);

require_once(ROOT_DIR.'/config/constants.php');
//require_once(HTML_DIR.'/template.php');






require_once (HELPERS_WWW_DIR."/session_helper.php");
require_once (HELPERS_WWW_DIR."/url_helper.php");

// define('HELPERS_DIR', SITE_DIR . "/helpers");
// define('HELPERS_WWW_DIR',SITE_WWW_DIR . "/helpers");



require_once (CSS_WWW_DIR."/style.css");
require_once (JS_WWW_DIR."/main.js");



// // Autoload Core Libraries
// spl_autoload_register(function($className){
//     if(file_exists(LIBRARIES_DIR.'/'. $className . '.php')) {
//         require_once LIBRARIES_DIR . '/' . $className . '.php';
//     }else if(file_exists(MODELS_DIR.'/'. $className . '.php')) {
//         require_once MODELS_DIR . '/' . $className . '.php';
//         //return true;
//     }
// });




// require_once (CONTROLLERS_DIR."/Pages.php");
// require_once (CONTROLLERS_DIR."/Posts.php");
// require_once (CONTROLLERS_DIR."/Users.php");



// require_once (MODELS_DIR."/Post.php");
// require_once (MODELS_DIR."/User.php");




//require_once (VIEW_DIR."/inc/footer.php");
//require_once (VIEW_DIR."/inc/header.php");
//require_once (VIEW_DIR."/inc/navbar.php");



//require_once (VIEW_DIR."/pages/about.php");
//require_once (VIEW_DIR."/pages/index.php");


//
//require_once (VIEW_DIR."/posts/add.php");
//require_once (VIEW_DIR."/posts/edit.php");
//require_once (VIEW_DIR."/posts/index.php");
//require_once (VIEW_DIR."/posts/show.php");
//
//
//
//require_once (VIEW_DIR."/users/add.php");
//require_once (VIEW_DIR."/users/login.php");
//require_once (VIEW_DIR."/users/register.php");











// frequently used functions...
require_once (HELPERS_WWW_DIR."/html_functions.php");
require_once (HELPERS_WWW_DIR."/formfunctions.php");


require_once(HELPERS_WWW_DIR.'/mydb.php');
$db = new MyDb(); // Running on Windows or Linux/Unix?
$db->execute_query("SET NAMES 'utf8'");

function isAjax() {
    return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'));
}







