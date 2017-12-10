<?php
  include('./models/FrontModel.php');

  class FrontController {
    private $config;

    function __construct($config){
      $this->config = $config;
      $router = new Router();
    }

    function index(){
      include_once('./views/index.php');
    }

    function login(){
      if(!isset($_POST['username'])){
        include('./views/login.php');
      }else {
        $frontModel = new FrontModel();
        $result     = $frontModel->authenticate($_POST['username'],$_POST['password']);
        if(count($result)>0){
          $_SESSION['id']       = $result[0]['id_karyawan'];
          $_SESSION['username'] = $result[0]['namaKaryawan'];
          $_SESSION['jabatan']  = $result[0]['unit'];
          $this->config['router']->redirect('FrontController','home');
        }else{
          $_SESSION['msg']      = 'User or Password not match';
          $this->config['router']->redirect('FrontController','login');
        }
      }
    }

    function logout(){
      session_destroy();
      include_once('./views/index.php');
    }

    function home(){
      if($_SESSION['jabatan']=="Administrasi"){
        include('./views/administrasi.php');
      }
      elseif($_SESSION['jabatan']=="Keuangan"){
        include('./views/keuangan.php');
      }
      elseif($_SESSION['jabatan']=="Inventaris"){
        include('./views/inventaris.php');
      }
      elseif($_SESSION['jabatan']=="Manajer"){
        include('./views/manajer.php');
      }
      else{
        include('./views/pencatatMeter.php');
      }
    }
  }
 ?>
