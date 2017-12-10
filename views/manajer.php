<?php
  include("./controllers/manajer.php");
  $c = new manajer('manajer');
  //echo $_SESSION['a'];
?>
<script>
function update(id, nama, kel, lahir, kerja, alamat, jabatan, user, pass){
    document.getElementById("uID").value = id;
    document.getElementById("uNAMA").value = nama;
    //document.getElementById("setLUAS").value = kel;
    document.getElementById("uLAHIR").value = lahir;
    document.getElementById("uKERJA").value = kerja;
    document.getElementById("uALAMAT").value = alamat;
    document.getElementById("uJABATAN").value = jabatan;
    document.getElementById("uUSER").value = user;
    document.getElementById("uPASS").value = pass;
};
</script>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Manajer</title>
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
  
  <div id="kelolaKaryawan" class="tab-pane fade in active">
  <div class="view">
	  <div class="karyawan-menu">
		  <a href="#insertKaryawan" data-toggle="pill"><img src="./assets/img/menu/input.png" alt="Insert"></a>
	  </div>
  <table width="850" height="300" border="0">
  <tbody>
    <tr>
      <th class="table-top" scope="col">ID Karyawan</th>
      <th class="table-top" scope="col">Nama Lengkap</th>
      <th class="table-top" scope="col">Jenis Kelamin</th>
      <th class="table-top" scope="col">Tanggal Lahir</th>
      <th class="table-top" scope="col">Tanggal Kerja</th>
      <th class="table-top" scope="col">Alamat</th>
      <th class="table-top" scope="col">Jabatan</th>
    </tr>
  <?php
  foreach($c->getData() as $row){
  ?>
    <tr href="#updateKaryawan" onclick="update('<?php echo $row['id_karyawan']; ?>','<?php echo $row['namaKaryawan']; ?>','<?php echo $row['jenisKelamin']; ?>','<?php echo $row['tanggalLahir']; ?>','<?php echo $row['tanggalKerja']; ?>','<?php echo $row['alamat']; ?>','<?php echo $row['unit']; ?>','<?php echo $row['username']; ?>','<?php echo $row['password']; ?>')" data-toggle="pill">
      <td><?php echo $row['id_karyawan']; ?></td>
      <td><?php echo $row['namaKaryawan']; ?></td>
      <td><?php echo $row['jenisKelamin']; ?></td>
      <td><?php echo $row['tanggalLahir']; ?></td>
      <td><?php echo $row['tanggalKerja']; ?></td>
      <td><?php echo $row['alamat']; ?></td>
      <td><?php echo $row['unit']; ?></td>
    </tr>
  <?php
    }
  ?>
  </tbody>
</table>

	  </div>
		</div>
		
		
			<div id="insertKaryawan" class="tab-pane fade in">
        <form method="POST" action="?c=manajer&f=insert">
				<div class="create" style="position: relative; top: 190px;">
					<table width="800" border="0">
            <tbody>
              <tr>
                <td>ID</td>
                <td><input type="text" name="id" readonly></td>
              </tr>
              <tr>
                <td>Nama Lengkap</td>
                <td><input type="text" name="nama"></td>
              </tr>
              <tr>
                <td>Jenis Kelamin</td>
                <td><select name="jenis">
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select></td>
              </tr>
              <tr>
                <td>Tanggal Lahir</td>
                <td><input type="date" name="lahir"></td>
              </tr>
              <tr>
                <td>Tanggla Kerja</td>
                <td><input type="date" name="kerja"></td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat"></td>
              </tr>
              <tr>
                <td>Jabatan</td>
                <td><select name="jabatan">
                <option value="Administrasi">Administrasi</option>
                <option value="Manajer">Manajer</option>
                <option value="Keuangan">Keuangan</option>
                <option value="Inventaris">Inventaris</option>
                <option value="Pencatat Meter">Pencatat Meter</option>
              </select></td>
              </tr>
              <tr>
                <td>Username</td>
                <td><input type="text" name="user"></td>
              </tr>
              <tr>
                <td>Password</td>
                <td><input type="text" name="pass"></td>
              </tr>
            </tbody>
          </table>
					<div class="karyawan-menu" style="left: 655px;">
						<button type="submit" name="insert"><img alt="insert"></button>
					</div>
				</div>
      </form>
			</div>
		
			<div id="updateKaryawan" class="tab-pane fade in">
        <form method="post" action="?c=manajer&f=update">
				<div class="create" style="position: relative; top: 190px;">
					<table width="800" border="0">
            <tbody>
              <tr>
                <td>ID</td>
                <td><input type="text" name="id" readonly id="uID"></td>
              </tr>
              <tr>
                <td>Nama Lengkap</td>
                <td><input type="text" name="nama" id="uNAMA"></td>
              </tr>
              <tr>
                <td>Jenis Kelamin</td>
                <td><select name="jenis"  id="uGENDER">
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select></td>
              </tr>
              <tr>
                <td>Tanggal Lahir</td>
                <td><input type="date" name="lahir" id="uLAHIR"></td>
              </tr>
              <tr>
                <td>Tanggla Kerja</td>
                <td><input type="date" name="kerja" id="uKERJA"></td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" id="uALAMAT"></td>
              </tr>
              <tr>
                <td>Jabatan</td>
                <td><select name="jabatan">
                <option value="Administrasi">Administrasi</option>
                <option value="Manajer">Manajer</option>
                <option value="Keuangan">Keuangan</option>
                <option value="Inventaris">Inventaris</option>
                <option value="Pencatat Meter">Pencatat Meter</option>
              </select></td>
              </tr>
              <tr>
                <td>Username</td>
                <td><input type="text" name="user" id="uUSER"></td>
              </tr>
              <tr>
                <td>Password</td>
                <td><input type="text" name="pass" id="uPASS"></td>
              </tr>
            </tbody>
          </table>
					<div class="karyawan-menu">
						<button type="submit"><img src="" alt="update"></button>
					</div>
				</div>
      </form>
			</div>
		
		<div id="melihatLaporan" class="tab-pane fade in">
  <div class="view">
  <table width="800" height="300" border="0">
  <tbody>
    <tr>
      <th class="table-top" scope="col">ID Laporan</th>
      <th class="table-top" scope="col">Nama Laporan</th>
      <th class="table-top" scope="col">Jenis Laporan</th>
      <th class="table-top" scope="col">Keterangan</th>
      <th class="table-top" scope="col">Tanggal</th>
    </tr>
     <?php
      foreach($c->getDataLaporan() as $row){
      ?>
    <tr>
      <td><?php echo $row['id_laporan']; ?></td>
      <td><?php echo $row['aktifitas']; ?></td>
      <td><?php echo $row['keterangan']; ?></td>
      <td><?php echo $row['jumlahUang']; ?></td>
      <td><?php echo $row['tanggal']; ?></td>
    </tr>
    <?php
      }
    ?>
  </tbody>
</table>

	  


	  </div>
		</div>
		
		<div id="melihatGrafik" class="tab-pane fade in">
  <div class="view">
  <table width="800" border="0">
  <tbody>
    <tr>
      <th class="table-top" scope="col" colspan="2">Grafik Tahun INI</th>
    </tr>
    <?php
    $months[0] = "Januari";
    $months[1] = "Februari";
    $months[2] = "Maret";
    $months[3] = "April";
    $months[4] = "Mei";
    $months[5] = "Juni";
    $months[6] = "Juli";
    $months[7] = "Agustus";
    $months[8] = "September";
    $months[9] = "Oktober";
    $months[10] = "November";
    $months[11] = "Desember";
    $total = 0;
    $percent = 0;
    $i= 0;
    $i2 = 0;
    while($i!=12) {
      foreach ($c->getDataLaporanIni($i+1) as $key) {
      # code...
      $total+=$key['uang'];
      }
      $i++;
    }
    while($i2!=12) {
      
      foreach ($c->getDataLaporanIni($i2+1) as $key) {
      # code...
      if (empty($key['uang'])) {
        $percent = 0*100;
      }
      else{
        $percent = $key['uang']/$total*100;
      }
     ?>
    <tr>
      <td width="100"><?php echo $months[$i2]; ?></td>
      <td><div style="background-color: red;width:<?php echo $percent; ?>%;">.<?php echo $key['uang']; ?></div></td>
    </tr>

    <?php }  $i2++; } ?>
  </tbody>
</table>

	  


	  </div>
		</div>
		
		<div id="konfirmasiPengajuan" class="tab-pane fade in">
  <div class="view">
	  <div class="karyawan-menu"><a href="#"><img src="./assets/img/menu/input.png" alt="submit"></a></div>
  <table width="800" height="300" border="0">
  <tbody>
    <tr>
      <th class="table-top" scope="col">ID Pengajuan</th>
      <th class="table-top" scope="col">Barang</th>
      <th class="table-top" scope="col">Karyawan</th>
      <th class="table-top" scope="col">Jumlah</th>
      <th class="table-top" scope="col">Harga</th>
      <th class="table-top" scope="col">Status</th>
    </tr>
    <?php
      foreach($c->getDataPengajuan() as $row){
    ?>
    <tr>
      <td><?php echo $row['id_pengajuan']; ?></td>
      <td><?php echo $row['id_barang']; ?></td>
      <td><?php echo $row['id_karyawan']; ?></td>
      <td><?php echo $row['jumlah']; ?></td>
      <td><?php echo $row['harga']; ?></td>
      <td>
        <a href="?c=manajer&f=setuju&id=<?php echo $row['id_pengajuan']; ?>"><button>setuju</button></a>
        <a href="?c=manajer&f=tidak&id=<?php echo $row['id_pengajuan']; ?>"><button>tidak setuju</button></a>
      </td>
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
		 Nomor Pelanggan<input type="text"><a href="#"><img alt="logo"></a>
	 	</div>
	  <div class="create-wrapper">
	  <div class="create">
	  	<table width="800" border="0">
  <tbody>
    <tr>
      <td>ID Barangs</td>
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
		  <button type="submit"><img src="./assets/#" alt="logo2"></button>
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
        	<a data-toggle="pill" href="#kelolaKaryawan">Kelola Karyawan</a>
        	</div>
        </li>
		
       
        <li>
        	<div class="menu">
        	  <img src="./assets/img/menu/laporan.png">
        	<a data-toggle="pill" href="#melihatLaporan">Melihat Laporan</a>
        	</div>
        </li>
        
        <li>
        	<div class="menu">
        	  <img src="./assets/img/menu/grafik.png">
        	<a data-toggle="pill" href="#melihatGrafik">Melihat Grafik</a>
        	</div>
        </li>
        
        <li>
        	<div class="menu">
        	  <img src="./assets/img/menu/konfirmasi.png">
        	<a data-toggle="pill" href="#konfirmasiPengajuan">Konfirmasi Pengajuan</a>
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