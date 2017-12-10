<?php
  include_once('./library/Database.php');
  class model{
    private $db;
    function __construct(){
      $this->db = new Database('localhost','3306','trpl2','root','');
    }

    function getKaryawan(){
      $result   = $this->db->query("select * from karyawan");
      return $result;
    }

    function getLaporan(){
      $result   = $this->db->query("select * from laporan");
      return $result;
    }

    function getLaporanIni($m){
      $result   = $this->db->query("select sum(jumlahUang) as uang from laporan where year(tanggal) = year(now()) and month(tanggal) = '".$m."'");
      return $result;
    }

    function getPengajuan(){
      $result   = $this->db->query("select * from pengajuan where status = ''");
      return $result;
    }

    function getPengajuan2($id){
      $result   = $this->db->query("select * from pengajuan where id_pengajuan = '".$id."'");
      return $result;
    }

	
	function getKaryawanId($id){
      $result   = $this->db->query("select * from karyawan where id_karyawan = '".$id."'");
      return $result;
    }
	
	function insertKaryawan(array $item){
		  $this->db->insert("karyawan",$item);
	 }

   function insertLaporan(array $item){
      $this->db->insert("laporan",$item);
   }

   function updateKaryawan(array $item){
    $query = "UPDATE karyawan SET username = '".$item['username'].
    "', password         = '".$item['password'].
    "',namaKaryawan      = '".$item['namaKaryawan'].
    "',alamat            = '".$item['alamat'].
    "',tanggalLahir      = '".$item['tanggalLahir'].
    "',unit              = '".$item['unit'].
    "',JenisKelamin      = '".$item['jenisKelamin'].
    "',tanggalKerja      = '".$item['tanggalKerja'].
    "' WHERE id_karyawan = '".$item['id_karyawan']."'";
      $this->db->execute($query);

   }

   function updatePengajuan(array $item){
    $query = "UPDATE pengajuan SET status = '".$item['status'].
    "' WHERE id_pengajuan = '".$item['id']."'";
      $this->db->execute($query);

   }
  }

?>
