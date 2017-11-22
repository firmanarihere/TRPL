<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Pencatat Meter</title>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div class="menu-atas">
		<div class="menu-atas-logo">
			<img src="img/Administrasi/logo.jpg">
		</div>
		<div class="menu-atas-exit">
			<a href="?c=FrontController&f=logout"><img src="img/Administrasi/Escape.png"></a>
		</div>
	</div>
	
	<div class="profile-box">
		<div class="profile-box-pic">
			<img src="img/Administrasi/User.png">
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
    <tr>
      <td>Tes;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>

	  


	  </div>
		</div>
  
  <div id="create" class="tab-pane fade in">
	 <div class="search">
		 Nomor Pelanggan<input type="text"><a href="#"><img src="img/menu/cari.png" alt="Search"></a>
	 	</div>
	  <div class="create-wrapper">
	  <div class="create">
	  	<table width="800" border="0">
  <tbody>
    <tr>
      <td>ID Barang</td>
      <td><input type="text"></td>
    </tr>
    <tr>
      <td>Nama Barang</td>
      <td><input type="text"></td>
    </tr>
    <tr>
      <td>Jenis Barang</td>
      <td><input type="text"></td>
    </tr>
    <tr>
      <td>Jumlah</td>
      <td><input type="text"></td>
    </tr>
      <td>Status</td>
      <td><input type="text"></td>
    <tr>
      <td>Tanggung Jawab</td>
      <td><input type="text"></td>
    </tr>
  </tbody>
</table>
	  </div>
	  </div>
	  
	  <div class="submit">
		  <button type="submit"><img src="img/menu/input.png" alt="logo2"></button>
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
        	  <img src="img/menu/ikonJadwal.png">
        	<a data-toggle="pill" href="#view">Melihat Jadwal</a>
        	</div>
        </li>
		
       
        <li>
        	<div class="menu">
        	  <img src="img/menu/ikonMeteran.png">
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
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>