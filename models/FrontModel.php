<?php
  include_once('./library/Database.php');
  class FrontModel{
    private $db;
    function __construct(){
      $this->db = new Database('localhost','3306','trpl2','root','');
    }

    function authenticate($username,$password){
      $password = ($password);
      $result   = $this->db->query("select * from karyawan where username='$username' and password='$password'");
      return $result;
    }
  }
 ?>
