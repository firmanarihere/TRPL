<?php
  class Router{
    private $siteName, $baseUrl;

    function __construct(){
        $this->siteName = $_SERVER['HTTP_HOST'];
        $this->baseUrl  = "http://".$this->siteName."/index.php/";
    }

    function getBaseURL(){
      return $this->baseUrl;
    }

    function getSiteName(){
      return 'http://'.$this->siteName.'/';
    }

    function redirect($controller, $function){
      $getParam = (!empty($controller)?"?c=$controller&f=$function":"");
      header("Location:?c=$controller&f=$function");
    }
  }
?>
