<?php
  include('./models/manajer.php');

  class keuangan {
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
		$result = $model->getKaryawan();
		
		return $result;
	}

  function getDataLaporan(){
    $model  = new model();
    $result = $model->getLaporan();
    
    return $result;
  }
  function getDataPengajuan(){
    $model  = new model();
    $result = $model->getPengajuan();
    
    return $result;
  }

  
  function getDataPengajuanKonfirm(){
    $model  = new model();
    $result = $model->getPengajuanKonfirm();
    
    return $result;
  }
	
	function insert(){
		$item['id_karyawan']  = $_POST['id'];
		$item['username']     = $_POST['user'];
		$item['password']     = $_POST['pass'];
		$item['namaKaryawan'] = $_POST['nama'];
		$item['alamat']       = $_POST['alamat'];
		$item['tanggalLahir'] = $_POST['lahir'];
		$item['unit']         = $_POST['jabatan'];
		$item['jenisKelamin'] = $_POST['jenis'];
		$item['tanggalKerja'] = $_POST['kerja'];
    $_SESSION['AAA']      = $_POST['nama'];
		$model                = new model();
		$result               = $model->insertKaryawan($item);
          $this->config['router']->redirect('FrontController','home');
	}

  function update(){
    $item['id_karyawan']  = $_POST['id'];
    $item['username']     = $_POST['user'];
    $item['password']     = $_POST['pass'];
    $item['namaKaryawan'] = $_POST['nama'];
    $item['alamat']       = $_POST['alamat'];
    $item['tanggalLahir'] = $_POST['lahir'];
    $item['unit']         = $_POST['jabatan'];
    $item['jenisKelamin'] = $_POST['jenis'];
    $item['tanggalKerja'] = $_POST['kerja'];
    $_SESSION['AAA']      = $_POST['nama'];
    $model                = new model();
    $result               = $model->updateKaryawan($item);

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
