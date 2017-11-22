<?php
include "./controllers/pencatatMeter.php";
$c = new pencatatMeter("pencatatMeter");
?>
<?php
      foreach($c->getData() as $row){
      ?>
<script>
    document.getElementById("id").value = '<?php echo $row['no_pelanggan']; ?>';
    document.getElementById("nama").value = '<?php echo $row['nama_lenggakap']; ?>';
    document.getElementById("alamat").value = '<?php echo $row['alamat']; ?>';
    document.getElementById("gol").value = '<?php echo $row['golongan']; ?>';
    document.getElementById("lalu").value = '<?php echo $row['standLalu']; ?>';
    document.getElementById("kini").value = '<?php echo $row['standKini']; ?>';

  </script>
  <?php
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
				<p>Pencatat Meter</p>
				Susilawati bambang Yudayaniwati
				<label>12345</label>
			</div>
		</div>
	</div>
	
	
	<div class="links">
		<a href="#">Home</a>
		<a href="#">Home</a>
	</div>
	
	<div class="form-crudnya">
	
	<div class="tab-content">
  
  <div id="view" class="tab-pane fade in active">
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
  
  <div id="create" class="tab-pane fade in">
	 <div class="search">
    <form method="post" action="?c=pencatatMeter&f=getDataSearch">
		 Nomor Pelanggan<input type="text" name="search"><button type="submit"><img src="./assets/img/menu/cari.png" alt="Search"></button>
    </form>
	 	</div>
    <form method="post" action="?c=pencatatMeter&f=updatePelanggan">
	  <div class="create-wrapper">

	  <div class="create">

	  	<table width="800" border="0">
  <tbody>
    <tr>
      <td>Nomor Pelanggan</td>
      <td align="center"><input type="text" value="" id="id"></td>
    </tr>
    <tr>
      <td>Nama Pelanggan</td>
      <td align="center"><input type="text" value="" id="nama"></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td align="center"><input type="text" value="" id="alamat"></td>
    </tr>
    <tr>
      <td>Golongan</td>
      <td align="center"><input type="text" value="" id="gol"></td>
    </tr>
    <tr>
      <td>Stand Lalu</td>
      <td align="center"><input type="text" value="" id="lalu"></td>
    </tr>
    <tr>
      <td>Stand Kini</td>
      <td align="center"><input type="text" value="" id="kini"></td>
    </tr>
  </tbody>
</table>
	  </div>
	  </div>
	  
	  <div class="submit">
		  <button type="submit"><img src="./assets/img/menu/input.png" alt="logo2"></button>
	  </div>
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
      <td align="center"><input type="text"></td>
    </tr>
    <tr>
      <td>Nama Pelanggan</td>
      <td align="center"><input type="text"></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td align="center"><input type="text"></td>
    </tr>
    <tr>
      <td>Golongan</td>
      <td align="center"><input type="text"></td>
    </tr>
    <tr>
      <td>Stand Lalu</td>
      <td align="center"><input type="text"></td>
    </tr>
    <tr>
      <td>Stand Kini</td>
      <td align="center"><input type="text"></td>
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