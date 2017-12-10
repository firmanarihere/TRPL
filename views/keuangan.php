<?php
include "./controllers/Keuangan.php";
$c = new keuangan("keuangan");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Keuangan</title>
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
  
  <div id="pengaturanKeuangan" class="tab-pane fade in active">
  <div class="view">
  <table width="850" height="300" border="0">
  <tbody>
    <tr>
      <th class="table-top" scope="col">ID Laporan</th>
      <th class="table-top" scope="col">aktifitas</th>
      <th class="table-top" scope="col">keterangan</th>
      <th class="table-top" scope="col">jumlah Uang</th>
    </tr>
     <?php
      foreach($c->getDataLaporan() as $row){
      ?>
    <tr>
      <td><?php echo $row['id_laporan']; ?></td>
      <td><?php echo $row['aktifitas']; ?></td>
      <td><?php echo $row['keterangan']; ?></td>
      <td><?php echo $row['jumlahUang']; ?></td>
    </tr>
    <?php
      }
    ?>
  </tbody>
</table>

	  </div>
		</div>	
		
		<div id="konfirmasiPengajuan" class="tab-pane fade in">
  <div class="view">
  <table width="850" height="300" border="0">
  <tbody>
    <tr>
      <th class="table-top" scope="col">ID Laporan</th>
      <th class="table-top" scope="col">Nama Barang</th>
      <th class="table-top" scope="col">ID Karyawan</th>
      <th class="table-top" scope="col">Harga</th>
      <th class="table-top" scope="col">Jumlah Barang</th>
      <th class="table-top" scope="col">Status</th>
    </tr>
    <?php
      foreach($c->getDataPengajuan() as $row){
      echo"
    <tr>
      <td>".$row['id_pengajuan']."</td>
      <td><".$row['id_barang']."</td>
      <td>".$row['id_karyawan']."</td>
      <td>".$row['jumlah']."</td>
      <td>".$row['harga']."</td>
    <td>
        <a href=''><img alt='Terima'></a>
        <a href=''><img alt='Tolak'></a>
      </td>
    </tr>
      ";
        }
      ?>
  </tbody>
</table>

	  


	  </div>
		</div>
		
		<div id="history" class="tab-pane fade in">
  <div class="view">
  <table width="850" height="300" border="0">
  <tbody>
    <tr>
      <th class="table-top" scope="col">ID Laporan</th>
      <th class="table-top" scope="col">Nama Barang</th>
      <th class="table-top" scope="col">ID Karyawan</th>
      <th class="table-top" scope="col">Harga</th>
      <th class="table-top" scope="col">Jumlah Barang</th>
      <th class="table-top" scope="col">Status</th>
    </tr>
    <?php
      foreach($c->getDataPengajuanKonfirm() as $row){
      echo"
    <tr>
      <td>".$row['id_pengajuan']."</td>
      <td><".$row['id_barang']."</td>
      <td>".$row['id_karyawan']."</td>
      <td>".$row['jumlah']."</td>
      <td>".$row['harga']."</td>
    <td>".$row['status']."</td>
      </tr>
      ";
        }
      ?>
    
  </tbody>
</table>

	  


	  </div>
		</div>
		
  
</div>
	
	

	</div>
	
	<div class="judul">
		<p>Menu Utama</p>
	</div>
	
	<ul class="nav nav-pills nav-stacked">
        <li class="active">
        	<div class="menu">
        	  <img src="./assets/img/menu/karyawan.png">
          <a data-toggle="pill" href="#pengaturanKeuangan">Pengaturan Keuangan</a>
        	</div>
        </li>
		
       
        <li>
        	<div class="menu">
        	  <img src="./assets/img/menu/konfirmasi.png">
        	<a data-toggle="pill" href="#konfirmasiPengajuan">Konfirmasi Pengajuan</a>
        	</div>
        </li>
        
        <li>
        	<div class="menu">
        	  <img src="./assets/img/Administrasi/Pembayaran.png">
        	<a data-toggle="pill" href="#history">History</a>
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
      <td>ID Pelanggan</td>
      <td align="center"><input type="text"></td>
    </tr>
    <tr>
      <td>Nama Lengkap</td>
      <td align="center"><input type="text"></td>
    </tr>
    <tr>
      <td>Luas Lahan</td>
      <td align="center"><input type="text"></td>
    </tr>
    <tr>
      <td>Golongan</td>
      <td align="center"><input type="text"></td>
    </tr>
    <tr>
      <td>Tipe Bangunan</td>
      <td align="center"><input type="text"></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td align="center"><input type="text"></td>
    </tr>
    <tr>
      <td>Tanggal Langganan</td>
      <td align="center"><input type="text"></td>
    </tr>
    <tr>
      <td>Tagihan</td>
      <td align="center"><input type="text"></td>
    </tr>
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