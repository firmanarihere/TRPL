<?php
  include_once('./library/Database.php');
  class model{
    private $db;
    function __construct(){
      $this->db = new Database('localhost','3306','trpl2','root','');
    }

    function getBarang(){
      $result   = $this->db->query("select * from barang");
      return $result;
    }

    function getPengajuan(){
      $result   = $this->db->query("select * from pengajuan");
      return $result;
    }

    function getPenggunaan(){
      $result   = $this->db->query("select * from penggunaan");
      return $result;
    }
	
	function getKaryawanId($id){
      $result   = $this->db->query("select * from karyawan where id_karyawan = '".$id."'");
      return $result;
    }
	
	function insertBarang(array $item){
		  $this->db->insert("barang",$item);
	 }

   function insertPengajuan(array $item){
      $this->db->insert("pengajuan",$item);
   }

   function insertPenggunaan(array $item){
      $this->db->insert("penggunaan",$item);
   }

   function updateBarang(array $item){
      $this->db->update("barang",$item);

   }
  }

?>
