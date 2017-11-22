<?php
  include('./models/administrasi.php');

  class administrasi {
    private $config;

    function __construct($config){
      $this->config = $config;
      $router       = new Router();
    }

    function index(){
      include_once('./views/index.php');
    }

	function getData(){
		$model  = new model();
		$result = $model->getPelanggan();
		
		return $result;
	}

  function getDataLaporan(){
    $model  = new model();
    $result = $model->getLaporan();
    
    return $result;
  }
  function getDataSearch(){
    $id = $_POST['search'];
    $model  = new model();
    $result = $model->getSearch($id);
    
    return $result;
  }
	
	function insert(){
		$item['no_pelanggan']  = $_POST['id'];
		$item['nama_lengkap']     = $_POST['nama'];
		$item['luas_lahan']     = $_POST['lahan'];
		$item['golongan'] = $_POST['gol'];
    $item['tipe_bangunan'] = $_POST['tipe'];
		$item['alamat']       = $_POST['alamat'];
		$item['tgl_langganan'] = $_POST['tanggal'];
		$item['tarif']         = "0";
		$item['standLalu'] = "0";
		$item['standKini'] = "0";
		$model                = new model();
		$result               = $model->insertPelanggan($item);
          $this->config['router']->redirect('FrontController','home');
	}

  function update(){
    $item['no_pelanggan']  = $_POST['id'];
    $item['nama_lengkap']     = $_POST['nama'];
    $item['luas_lahan']     = $_POST['lahan'];
    $item['golongan'] = $_POST['gol'];
    $item['tipe_bangunan'] = $_POST['tipe'];
    $item['alamat']       = $_POST['alamat'];
    $item['tgl_langganan'] = $_POST['tanggal'];
    $item['tarif']         = "0";
    $item['standLalu'] = "0";
    $item['standKini'] = "0";
    $model                = new model();
    $result               = $model->updatePelanggan($item);
          $this->config['router']->redirect('FrontController','home');
  }

	
	
    function login(){
      if(!isset($_POST['username'])){
        include('./views/login.php');
      }else {
        $frontModel = new FrontModel();
        $result     = $frontModel->authenticate($_POST['username'],$_POST['password']);
        if(count($result)>0){
          $_SESSION['id']       = $result[0]['id'];
          $_SESSION['username'] = $result[0]['username'];
          $this->config['router']->redirect('FrontController','home');
        }else{
          $_SESSION['msg']      = 'User or Password not match';
          $this->config['router']->redirect('FrontController','index');
        }
      }
    }

    function home(){
      include('./views/home_admin.php');
    }
  }
 ?>
