<?php
  include('./models/inventaris.php');

  class inventaris {
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
		$result = $model->getBarang();
		
		return $result;
	}

  function getDataPengajuan(){
    $model  = new model();
    $result = $model->getPengajuan();
    
    return $result;
  }
  function getDataPenggunaan(){
    $model  = new model();
    $result = $model->getPenggunaan();
    
    return $result;
  }
	
	function insert(){
		$item['id_barang']  = $_POST['id'];
		$item['nama_barang'] = $_POST['nama'];
		$item['jenis_barang'] = $_POST['jenis'];
    $item['jumlah']     = $_POST['jumlah'];
		$model                = new model();
		$result               = $model->insertBarang($item);
          $this->config['router']->redirect('FrontController','home');
	}

  function insertPengajuan(){
    $item['id_pengajuan']  = $_POST['idPengajuan'];
    $item['id_barang'] = $_POST['idBarang'];
    $item['id_karyawan'] = $_POST['idKaryawan'];
    $item['jumlah']     = $_POST['jumlah'];
    $item['harga'] = $_POST['harga'];
    $item['status']     = 'belum disetujui';
    $model                = new model();
    $result               = $model->insertPengajuan($item);
          $this->config['router']->redirect('FrontController','home');
  }

  function insertPemakaian(){
    $item['id_penggunaan']  = $_POST['idPenggunaan'];
    $item['id_barang'] = $_POST['idBarang'];
    $item['tanggal'] = $_POST['tgl'];
    $item['tanggungJawab']     = $_POST['jawab'];
    $item['jumlah'] = $_POST['jumlah'];
    $item['keterangan']     = $_POST['keterangan'];
    $model                = new model();
    $result               = $model->insertPenggunaan($item);
          $this->config['router']->redirect('FrontController','home');
  }

  function updatePemakaian(){
    $item['id_penggunaan']  = $_POST['idPenggunaan'];
    $item['id_barang'] = $_POST['idBarang'];
    $item['tanggal'] = $_POST['tgl'];
    $item['tanggungJawab']     = $_POST['jawab'];
    $item['jumlah'] = $_POST['jumlah'];
    $item['keterangan']     = $_POST['keterangan'];
    $model                = new model();
    $result               = $model->updatePenggunaan($item);
          $this->config['router']->redirect2('FrontController','home',"#pemakaian");
  }

  function update(){
    $item['id_barang']  = $_POST['id'];
    $item['nama_barang'] = $_POST['nama'];
    $item['jenis_barang'] = $_POST['jenis'];
    $item['jumlah']     = $_POST['jumlah'];
    $model                = new model();
    $result               = $model->updateBarang($item);
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
