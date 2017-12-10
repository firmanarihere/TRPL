<?php
include "./controllers/pencatatMeter.php";
$c = new pencatatMeter("pencatatMeter");
//echo $_SESSION['t']."c";
//echo $_SESSION['s']."m";
//echo "<br>".$_SESSION['a'];

$id = "";
$nm = "";
$almt= "";
$gol = "";
$lalu = "";
$kini = "";
if(!empty($_POST['searchID'])){
  $searchID=$_POST['searchID'];
  //echo $searchID;
  foreach($c->getDataSearch($searchID) as $row){
    $id = $row['no_pelanggan'];
    $nm = $row['nama_lengkap'];
    $almt= $row['alamat'];
    $gol = $row['golongan'];
    $lalu = $row['standLalu'];
    $kini = $row['standKini'];
  }
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Pencatat Meter</title>
  <link href="./assets/css/bootstrap.css" rel="stylesheet">
  <link href="./assets/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div class="menu-atas">
		<div class="menu-atas-logo">
			<img src="./assets/img/Administrasi/logo.jpg">
		</div>
		<div class="menu-atas-exit">
			<a href="?c=FrontController&f=logout"><img src="./assets/img/Administrasi/Escape.png"></a>
		</div>
	</div>
	
	<div class="profile-box">
		<div class="profile-box-pic">
			<img src="./assets/img/Administrasi/User.png">
			<div class="profile-box-text">
        <p><?php echo $_SESSION['jabatan']; ?></p>
        <?php echo $_SESSION['username']; ?>
        <label><?php echo $_SESSION['id']; ?></label>
      </div>
    </div>
  </div>


  <div class="links">
    <a href="#">Home</a>
    <a href="#">Home</a>
  </div>

  <div class="form-crudnya">

   <div class="tab-content">

    <div id="view" class="tab-pane fade in">
      <div class="view">
        <h2 style="margin: auto; text-align: center;">Jadwal Survey Lokasi</h2>
        <table width="800" height="300" border="0">
          <tbody>
            <tr>
              <th class="table-top" scope="col">ID Petugas</th>
              <th class="table-top" scope="col">Nama Petugas</th>
              <th class="table-top" scope="col">Tanggal Pemeriksaan</th>
              <th class="table-top" scope="col">Daerah Pemeriksaan</th>
            </tr>
            <?php
            foreach($c->getData() as $row){
              ?>
              <tr>
                <td><?php echo $row['id_karyawan']; ?></td>
                <td><?php echo $row['id_pelanggan']; ?></td>
                <td><?php echo $row['tanggalPeriksa']; ?></td>
                <td><?php echo $row['status']; ?></td>
              </tr>
              <?php
            }
            ?>
          </tbody>
        </table>




      </div>
    </div>

    <div id="create" class="tab-pane fade in active">
      <div class="search">
        <form method="post" action="">
         Nomor Pelanggan<input type="text" name="searchID"><button type="submit" name="search" ><img src="./assets/img/menu/cari.png" alt="Search"></button>
       </form>
</div>
<form method="post" action="?c=pencatatMeter&f=update">
 <div class="create-wrapper">

   <div class="create">
    <table width="800" border="0">
      <tbody>
        <tr>
          <td>Nomor Pelanggan</td>
          <td align="center"><input readonly type="text" value="<?php echo $id ?>" id="id" name="no_pelanggan"></td>
        </tr>
        <tr>
          <td>Nama Pelanggan</td>
          <td align="center"><input readonly type="text" value="<?php echo $nm ?>" id="nama" name="nama_lengkap"></td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td align="center"><input readonly type="text" value="<?php echo $almt ?>" id="alamat" name="alamat"></td>
        </tr>
        <tr>
          <td>Golongan</td>
          <td align="center"><input readonly type="text" value="<?php echo $gol ?>" id="gol" name="golongan"></td>
        </tr>
        <tr>
          <td>Stand Lalu</td>
          <td align="center"><input readonly type="text" value="<?php echo $lalu ?>" id="lalu" name="standLalu"></td>
        </tr>
        <tr>
          <td>Stand Kini</td>
          <td align="center"><input type="text" value="<?php echo $kini ?>" id="kini" name="standKini"></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<?php
if(!empty($_POST['searchID'])){
  ?>
<div class="submit">
  <button type="submit"><img src="./assets/img/menu/input.png" alt="logo2"></button>
</div>
<?php } ?>
</div>

</div>

</form>

</div>

<div class="judul">
  <p>Menu Utama</p>
</div>

<ul class="nav nav-pills nav-stacked">
  <li class="active">
   <div class="menu">
     <img src="./assets/img/menu/ikonJadwal.png">
     <a data-toggle="pill" href="#view">Melihat Jadwal</a>
   </div>
 </li>


 <li>
   <div class="menu">
     <img src="./assets/img/menu/ikonMeteran.png">
     <a data-toggle="pill" href="#create">Input Meteran</a>
   </div>
 </li>

</ul>

<div class="modal fade" id="Modal" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        Modal
      </div>
      <div class="modal-body">

        <div class="crud-modal">			
          <table width="700" height="350" border="0" align="center">
            <tbody>
              <tr>
                <td>Nomor Pelanggan</td>
                <td align="center"><input type="text" id="id"></td>
              </tr>
              <tr>
                <td>Nama Pelanggan</td>
                <td align="center"><input type="text" id="nama"></td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td align="center"><input type="text" id="alamat"></td>
              </tr>
              <tr>
                <td>Golongan</td>
                <td align="center"><input type="text" id="gol"></td>
              </tr>
              <tr>
                <td>Stand Lalu</td>
                <td align="center"><input type="text" id="lalu"></td>
              </tr>
              <tr>
                <td>Stand Kini</td>
                <td align="center"><input type="text" id="kini"></td>
              </tbody>
            </table>
          </div>			

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>



  <!-- Include all compiled plugins (below), or include individual files as needed --> 
  <script src="./assets/js/jquery-1.11.3.min.js"></script>
  <script src="./assets/js/bootstrap.js"></script>
</body>
</html>