<?php
  include_once('./library/Database.php');
  class model{
    private $db;
    function __construct(){
      $this->db = new Database('localhost','3306','trpl2','root','');
    }

    function getJadwal(){
      $result   = $this->db->query("select * from jadwalPencatatan");
      return $result;
    }

    function getSearch($id){
      $result   = $this->db->query("select * from pelanggan where no_pelanggan = $id");
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
	
	function insertKaryawan(array $item){
		  $this->db->insert("karyawan",$item);
	 }

   function updateKaryawan(array $item){
      $this->db->update("karyawan",$item);

   }
  }

?>
