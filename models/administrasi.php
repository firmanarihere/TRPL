<?php
  include_once('./library/Database.php');
  class model{
    private $db;
    function __construct(){
      $this->db = new Database('localhost','3306','trpl2','root','');
    }

    function getPelanggan(){
      $result   = $this->db->query("select * from pelanggan");
      return $result;
    }

    function getLaporan(){
      $result   = $this->db->query("select * from laporan");
      return $result;
    }

    function getSearch($id){
      $result   = $this->db->query("select * from pelanggan  where no_pelanggan = '".$id."'");
      $_SESSION['s']=$id;
      return $result;
    }
    function getSearch2($id){
      $result   = $this->db->query("select * from pembayaran  where id_pelanggan = '".$id."' order by tgl_pembayaran desc LIMIT 1" );
      $_SESSION['s']=$id;
      return $result;
    }
	
	function getKaryawanId($id){
      $result   = $this->db->query("select * from karyawan where id_karyawan = '".$id."'");
      return $result;
    }
	
	function insertPelanggan(array $item){
		  $this->db->insert("pelanggan",$item);
      
	 }
   function insertPembayaran(array $item){
      $this->db->insert("pembayaran",$item);
      
   }

   function insertLaporan(array $item){
      $this->db->insert("laporan",$item);
   }

   function updatePelanggan(array $item){
      $query = "UPDATE pelanggan SET 
      nama_lengkap ='".$item['nama_lengkap']."',
      luas_lahan = '".$item['luas_lahan']."',
      golongan = '".$item['golongan']."',
      tipe_bangunan = '".$item['tipe_bangunan']."',
      alamat = '".$item['alamat']."',
      tgl_langganan = '".$item['tgl_langganan']."',
      tarif = '".$item['tarif']."'
      WHERE no_pelanggan = '".$item['no_pelanggan']."'";
       $_SESSION['a']=$query;
       $this->db->execute($query);
   }
   function updatePelanggan2(array $item){
      $query = "UPDATE pelanggan SET 
      StandLalu ='".$item['kini']."'
      WHERE no_pelanggan = '".$item['no_pelanggan']."'";
       $_SESSION['a']=$query;
       $this->db->execute($query);
   }
  }

?>
