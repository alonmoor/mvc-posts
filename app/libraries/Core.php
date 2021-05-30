<?php


/*
   * App Core Class
   * Creates URL & loads core controller
   * URL FORMAT - /controller/method/params
   */
class Core {


    protected $currentMethod = 'index';
    protected $params = [];
    protected $currentController = '' ;
    public function __construct(){
        //print_r($this->getUrl());

        if ($_SERVER['REQUEST_URI'] == '/users/add' || $_SERVER['REQUEST_URI'] == '/user/add') {
            $currentController = 'Users';
        }else if($_SERVER['REQUEST_URI'] == "/users/show/1"){
            $currentController = 'Posts';
        }else{
            $currentController = 'Pages';
        }


        $url = $this->getUrl();
        if($_SERVER['REQUEST_URI'] == '/' || $_SERVER['REQUEST_URI'] == '/pages/get_curl' || $_SERVER['REQUEST_URI'] == '/pages/get_average'
        || $_SERVER['REQUEST_URI'] == '/users_posts/create'  || $_SERVER['REQUEST_URI'] == '/pages/get_json'|| $_SERVER['REQUEST_URI'] == '/pages/about' ){
            $url[0] = 'Pages';
        } else if(  ( ( ($url[1] == 'users' || $url[1] == 'user') ) && $url[2] !== 'show' ) || $_SERVER['REQUEST_URI'] == '/user/add'    ){
            $url[0] = 'Users';
        }else if($_SERVER['REQUEST_URI'] == '/posts' || ($url[1] == 'users' || $url[1] == 'user') || $url[1] == 'posts' || $url[2] == 'show' ||  $url[2] = 'user_show_post'){
            $url[0] = 'Posts';
        }
       else{
            $url[0] = 'Pages';
        }
        // Look in controllers for first value
        if(file_exists('app/controllers/' . ucwords($url[0]). '.php')){
            // If exists, set as controller
            $this->currentController = ucwords($url[0]);
            // Unset 0 Index
            unset($url[0]);
        }

//----------------------------------------------------------------------

        // Require the controller
        require_once 'app/controllers/'. $this->currentController . '.php';

        // Instantiate controller class
       $this->currentController = new $this->currentController;
//----------------------------------------------------------------------
        // Check for second part of url
        if(isset($url[1])){
            // Check to see if method exists in controller
            if(method_exists($this->currentController, $url[1])){
                $this->currentMethod = $url[1];
                // Unset 1 index
                unset($url[1]);
            }
        }
//----------------------------------------------------------------------
        // Check for second part of url
        if(isset($url[2])){
            // Check to see if method exists in controller
            if(method_exists($this->currentController, $url[2])){
                $this->currentMethod = $url[2];
                // Unset 1 index
                unset($url[2]);
            }
        }




//----------------------------------------------------------------------
        // Get params
        $this->params = $url ? array_values($url) : [];

        // Call a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl(){
        // if(isset($_GET['url'])){
        if(isset($_SERVER['REQUEST_URI'])){

            $url = rtrim($_SERVER['REQUEST_URI'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}













































//  /*
//   * App Core Class
//   * Creates URL & loads core controller
//   * URL FORMAT - /controller/method/params
//   */
//  class Core {
//    protected $currentController = 'Pages';
//    protected $currentMethod = 'index';//change if the url will change
//    protected $params = [];//param will get the path
//
//    public function __construct(){
//    //   print_r($this->getUrl());
//
//      $url = $this->getUrl();
//
//      // Look in BLL for first value
//      if(file_exists('app/controllers/' . ucwords($url[0]). '.php')){
//        // If exists, set as controller
//        $this->currentController = ucwords($url[0]);
//        // Unset 0 Index
//        unset($url[0]);
//      }
//
//
////===================================================================
////      // Check for second part of url
////      if(isset($url[1])){
////        // Check to see if method exists in controller
////        if(method_exists($this->currentController, $url[1])){
////          $this->currentMethod = $url[1];
////          // Unset 1 index
////          unset($url[1]);
////        }
////      }
////===================================================================
//
//
//        // Check for second part of url
//        if(isset($url[2])){
//            // Check to see if method exists in controller
//            if(method_exists($this->currentController, $url[2])){
//                $this->currentMethod = $url[2];
//                // Unset 1 index
//                unset($url[2]);
//            }
//        }
//
//
////===================================================================
//
//        // Require the controller
//        require_once 'app/controllers/'. $this->currentController . '.php';
//
//        // Instantiate controller class
//        $this->currentController = new $this->currentController;
//
//
//      // Get params
//      $this->params = $url ? array_values($url) : [];
//
//      // Call a callback with array of params
//      call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
//    }
//
//    public function getUrl(){
//      // if(isset($_GET['url'])){
//      //   $url = rtrim($_GET['url'], '/');
//      if(isset($_SERVER['REQUEST_URI'])){
//        $url = rtrim($_SERVER['REQUEST_URI'], '/');
//        //allowed you to filter variable as a string/string
//        $url = filter_var($url, FILTER_SANITIZE_URL);
//        $url = explode('/', $url);
//        return $url;
//      }
//    }
//  }
