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
  function getDataSearch($id){
    $model  = new model();
    $result = $model->getSearch($id);
    $_SESSION['t']=$_POST['search'];
    return $result;
  }
  function getDataSearch2($id){
    $model  = new model();
    $result = $model->getSearch2($id);
    $_SESSION['t']=$_POST['search'];
    return $result;
  }

  function insertPembayaran(){
    $yr = date("Y", time()) .""; 
    $mon = date("m", time()).""; 
    $date = date("d", time()); 
    $item['id_pelanggan']  = '';
    $item['id_pelanggan']     = $_POST['id'];
    $item['id_karyawan']     = $_POST['id'];
    $item['tgl_pembayaran'] = $yr."/".$mon."/".$date;
    $item['jasaPemasangan'] = 0;
    $item['administrasi']       = $_POST['babanT'];
    $item['perawatan'] = 0;
    $item['denda']= $_POST['denda'];
    $item['totalAir'] = $_POST['pemakaian'];
    $item['total_bayar'] = $_POST['total'];
    $item['status'] ="lunas";

    $item2['no_pelanggan']     = $_POST['id'];
    $item2['kini'] =$_POST['kini'];

    $_SESSION['a'] = $item['id_pelanggan'];
    $model                = new model();
    $result               = $model->insertPembayaran($item);
    $item3['id_laporan'] = '';
    $item3['aktifitas'] = "pemasukan";
    $item3['keterangan'] = "pelanggan membayar";
    $item3['jumlahUang'] = $_POST['total'];
    $item3['tanggal'] = $yr."/".$mon."/".$date;
    $model->insertLaporan($item3);

    $model->updatePelanggan2($item2);
    $this->config['router']->redirect('FrontController','home');
  }

  function insert(){
    $item['no_pelanggan']  = $_POST['id'];
    $item['nama_lengkap']     = $_POST['nama'];
    $item['luas_lahan']     = $_POST['lahan'];
    $item['golongan'] = $_POST['gol'];
    $item['tipe_bangunan'] = $_POST['tipe'];
    $item['alamat']       = $_POST['alamat'];
    $item['tgl_langganan'] = $_POST['tanggal'];
    $item['tarif']= "0";
    switch ($item['golongan']) {
      case 1:
        # code...
      $item['tarif']         = "1050";
      break;
      case 2:
        # code...
      $item['tarif']         = "1050";
      break;
      case 3:
        # code...\
      $item['tarif']         = "3550";
      break;
      case 4:
        # code...
      $item['tarif']         = "4900";
      break;
      case 5:
        # code...
      $item['tarif']         = "6825";
      break;
      case 6:
        # code...
      $item['tarif']         = "12550";
      break;
      case 7:
        # code...
      $item['tarif']         = "14650";
      break;
      
      default:
        # code...
      break;
    }
    
    $item['standLalu'] = "0";
    $item['standKini'] = "0";
    $_SESSION['a']=$_POST['nama'];
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
    switch ($item['golongan']) {
      case 1:
        # code...
      $item['tarif']         = "1050";
      break;
      case 2:
        # code...
      $item['tarif']         = "1050";
      break;
      case 3:
        # code...
      $item['tarif']         = "3550";
      break;
      case 4:
        # code...
      $item['tarif']         = "4900";
      break;
      case 5:
        # code...
      $item['tarif']         = "6825";
      break;
      case 6:
        # code...
      $item['tarif']         = "12550";
      break;
      case 7:
        # code...
      $item['tarif']         = "14650";
      break;
      
      default:
        # code...
      break;
    }
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
