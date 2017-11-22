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

    function getPengajuan(){
      $result   = $this->db->query("select * from pengajuan");
      return $result;
    }
	
	function getKaryawanId($id){
      $result   = $this->db->query("select * from karyawan where id_karyawan = '".$id."'");
      return $result;
    }
	
	function insertPelanggan(array $item){
		  $this->db->insert("pelanggan",$item);
	 }

   function updateKaryawan(array $item){
      $this->db->update("karyawan",$item);

   }
  }

?>
