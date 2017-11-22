<?php
include "./controllers/administrasi.php";
$c = new administrasi("administrasi");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Administrasi</title>
<link href="./assets/css/bootstrap.css" rel="stylesheet">
<link href="./assets/css/style.css" rel="stylesheet" type="text/css">
<style>
	.large input{
	width: 230px !important;
	}
	
	.large td {
		padding: 3px !important;
	}
	</style>
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
				<p>Administrasi</p>
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
  
  <div id="kelolaPelanggan" class="tab-pane fade in active">
  <div class="view" style="width: 850px;">
  <div class="karyawan-menu" style="left: 785px;">
		  <a href="#kelolaPelangganBaru" data-toggle="pill"><img src="./assets/img/menu/input.png" alt="Insert"></a>
	  </div>
  <table width="850" height="250" border="0">
  <tbody>
    <tr>
      <th class="table-top" scope="col">ID Pelanggan</th>
      <th class="table-top" scope="col">Nama Pelanggan</th>
      <th class="table-top" scope="col">Luas Lahan</th>
      <th class="table-top" scope="col">Golongan</th>
      <th class="table-top" scope="col">Tipe Bangunan</th>
      <th class="table-top" scope="col">Alamat</th>
      <th class="table-top" scope="col">Tanggal</th>
      <th class="table-top" scope="col">Tagihan</th>
    </tr>
     <?php
  foreach($c->getData() as $row){
  ?>
    <tr>
      <td><?php echo $row['no_pelanggan']; ?></td>
      <td><?php echo $row['nama_lengkap']; ?></td>
      <td><?php echo $row['luas_lahan']; ?></td>
      <td><?php echo $row['golongan']; ?></td>
      <td><?php echo $row['tipe_bangunan']; ?></td>
      <td><?php echo $row['alamat']; ?></td>
      <td><?php echo $row['tgl_langganan']; ?></td>
      <td><?php echo $row['tarif']; ?></td>
    </tr>
    <?php
}
    ?>
  </tbody>
  </tbody>
</table>

	  </div>
		</div>	
		
		<div id="pembayaranTagihan" class="tab-pane fade in">
		<div class="search">
		 Nomor Pelanggan<input type="text"><a href="#"><img src="./assets/img/menu/cari.png" alt="Search"></a>
	 	</div>
	  <div class="create-wrapper">
	  <div class="create">
	  <div class="large">
	  	<table width="800" border="0">
  <tbody>
    <tr>
      <td>Nomor Pelanggan</td>
      <td><input type="text"></td>
      <td>Golongan</td>
      <td><input type="text"></td>
    </tr>
    <tr>
      <td>Nama</td>
      <td><input type="text"></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td><input type="text"></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>Stand Kini</td>
      <td><input type="text"></td>
      <td>Harga Air</td>
      <td><input type="text"></td>
    </tr>
    <tr>
      <td>Stand Lalu</td>
      <td><input type="text"></td>
      <td>Beban Tetap</td>
      <td><input type="text"></td>
    </tr>
    <tr>
      <td>Pemakaian</td>
      <td><input type="text"></td>
      <td>Tagihan</td>
      <td><input type="text"></td>
    </tr>
    <tr>
      <td>Denda</td>
      <td><input type="text"></td>
      <td>Total</td>
      <td><input type="text"></td>
    </tr>
    <tr>
      <td>Terbilang</td>
      <td><input type="text"></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>Nomor LPPA</td>
      <td><input type="text"></td>
      <td>Tanggal Bayar</td>
      <td><input type="text"></td>
    </tr>
    <tr>
      <td>Kasir</td>
      <td><input type="text"></td>
      <td>Loket</td>
      <td><input type="text"></td>
    </tr>
    
  </tbody>
</table>
		  </div>
	  </div>
	  </div>
	  
	  <div class="submit">
		  <button type="submit" style="position: relative; bottom: 495px; right: 120px;"><img src="./assets/img/menu/input.png" alt="Submit"></button>
	  </div>
  </div>
		
	<div id="kelolaPelangganBaru" class="tab-pane fade in">
	  <div class="create-wrapper no-src">
	  <div class="create">
	  	<table width="800" border="0">
  <tbody>
    <tr>
      <td>ID Pelanggan</td>
      <td><input type="text"></td>
    </tr>
    <tr>
      <td>Nama Lengkap</td>
      <td><input type="text"></td>
    </tr>
    <tr>
      <td>Luas Lahan</td>
      <td><input type="text"></td>
    </tr>
    <tr>
      <td>Golongan</td>
      <td><input type="text"></td>
    </tr>
    <tr>
      <td>Tipe Bangunan</td>
      <td><input type="text"></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td><input type="text"></td>
    </tr>
    <tr>
      <td>Tanggal Langganan</td>
      <td><input type="text"></td>
    </tr>
    
  </tbody>
</table>
	  </div>
	  </div>
	  
	  <div class="submit">
		  <button type="submit" style="position: relative; top: 50px;"><img src="./assets/#" alt="logo3"></button>
	  </div>
  </div>
  
  	<div id="kelolaPelangganUpdate" class="tab-pane fade in">
      <form mothod="post" action="?c=administrasi&f=insert">
	  <div class="create-wrapper no-src">
	  <div class="create">
	  	<table width="800" border="0">
  <tbody>
    <tr>
      <td>ID Pelanggan</td>
      <td><input type="text" name="id"></td>
    </tr>
    <tr>
      <td>Nama Lengkap</td>
      <td><input type="text" name="nama"></td>
    </tr>
    <tr>
      <td>Luas Lahan</td>
      <td><input type="text" name="lahan"></td>
    </tr>
    <tr>
      <td>Golongan</td>
      <td><input type="text" name="gol"></td>
    </tr>
    <tr>
      <td>Tipe Bangunan</td>
      <td><input type="text" name="tipe"></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td><input type="text" name="alamat"></td>
    </tr>
    <tr>
      <td>Tanggal Langganan</td>
      <td><input type="text" name="tanggal"></td>
    </tr>
    
  </tbody>
</table>
	  </div>
	  </div>
	  
	  <div class="submit">
		  <button type="submit" style="position: relative; top: 50px;"><img src="./assets/#" alt="logo7"></button>
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
        	  <img src="./assets/img/Administrasi/Pelanggan.png">
        	<a data-toggle="pill" href="#kelolaPelanggan">Kelola Pelanggan</a>
        	</div>
        </li>
		
       
        <li>
        	<div class="menu">
        	  <img src="./assets/img/Administrasi/Pembayaran.png">
        	<a data-toggle="pill" href="#pembayaranTagihan">Pembayaran Tagihan</a>
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