<?php
include "./controllers/inventaris.php";
$c = new inventaris("inventaris");
?>
<script>
  function update(id, nama, jenis, jumlah){
    document.getElementById("uID").value = id;
    document.getElementById("uNAMA").value = nama;
    document.getElementById("uJENIS").value = jenis;
    document.getElementById("uJUMLAH").value = jumlah;
  };
  function update2(id, idB, tgl,jawab, jumlah, ket){
    document.getElementById("id").value = id;
    document.getElementById("idB").value = idB;
    document.getElementById("tgl").value = tgl;
    document.getElementById("jawab").value = jawab;
    document.getElementById("jumlah").value = jumlah;
    document.getElementById("ket").value = ket;
  };
</script>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Inventaris</title>
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

    <div id="kelolaBarang" class="tab-pane fade in active">
      <div class="view">
       <div class="karyawan-menu" style="left: 785px;">
        <a href="#kelolaBarangBaru" data-toggle="pill"><img src="./assets/img/menu/input.png" alt="Insert"></a>
      </div>
      <table width="850" height="300" border="0">
        <tbody>
          <tr>
            <th class="table-top" scope="col">ID Barang</th>
            <th class="table-top" scope="col">Nama Barang</th>
            <th class="table-top" scope="col">Jenis Barang</th>
            <th class="table-top" scope="col">Jumlah</th>
          </tr>
          <?php
          foreach($c->getData() as $row){
            ?>
            <tr href="#kelolaBarangUpdate" data-toggle="pill" onclick="update('<?php echo $row['id_barang']; ?>','<?php echo $row['nama_barang']; ?>','<?php echo $row['jenis_barang']; ?>','<?php echo $row['jumlah']; ?>');">
              <td><?php echo $row['id_barang']; ?></td>
              <td><?php echo $row['nama_barang']; ?></td>
              <td><?php echo $row['jenis_barang']; ?></td>
              <td><?php echo $row['jumlah']; ?></td>
            </tr>
            <?php
          }
          ?>
        </tbody>
      </table>

    </div>
  </div>	
  
  
  <div id="kelolaBarangBaru" class="tab-pane fade in">
    <form method="post" action="?c=inventaris&f=insert">
     <div class="create-wrapper no-src">
       <div class="create">
        <table width="800" border="0">
          <tbody>
            <tr>
              <td>ID Barang</td>
              <td><input type="text" name="id"></td>
            </tr>
            <tr>
              <td>Nama Barang</td>
              <td><input type="text" name="nama"></td>
            </tr>
            <tr>
              <td>Jenis Barang</td>
              <td><input type="text" name="jenis"></td>
            </tr>
            <tr>
              <td>Jumlah Barang</td>
              <td><input type="text" name="jumlah"></td>
            </tr>    
          </tbody>
        </table>
      </div>
    </div>
    <div class="submit">
      <button type="submit" style="position: relative; top: 50px;"><img src="./assets/#" alt="logo2"></button>
    </div>
  </form>
</div>


<div id="kelolaBarangUpdate" class="tab-pane fade in">
 <form method="post" action="?c=inventaris&f=update">
  <div class="create-wrapper no-src">
    <div class="create">
      <table width="800" border="0">
        <tbody>
          <tr>
            <td>ID Barang</td>
            <td><input type="text" name="id" id="uID"></td>
          </tr>
          <tr>
            <td>Nama Barang</td>
            <td><input type="text" name="nama" id="uNAMA"></td>
          </tr>
          <tr>
            <td>Jenis Barang</td>
            <td><input type="text" name="jenis" id="uJENIS"></td>
          </tr>
          <tr>
            <td>Jumlah Barang</td>
            <td><input type="text" name="jumlah" id="uJUMLAH"></td>
          </tr>    
        </tbody>
      </table>
    </div>
  </div>
  <div class="submit">
    <button type="submit" style="position: relative; top: 50px;"><img src="./assets/#" alt="logo2"></button>
  </div>
</form>
</div>


<div id="pemakaian" class="tab-pane fade in">
  <div class="view">
   <div class="karyawan-menu" style="position: relative; left: 835px;">
    <a href="#pemakaianBaru" data-toggle="pill"><img src="./assets/img/menu/input.png" alt="Insert"></a>
  </div>
  <table width="900" height="300" border="0">
    <tbody>
      <tr>
        <th class="table-top" scope="col">ID Pengajuan</th>
        <th class="table-top" scope="col">Nama Barang</th>
        <th class="table-top" scope="col">Tanggal</th>
        <th class="table-top" scope="col">Tanggung Jawab</th>
        <th class="table-top" scope="col">Jumlah Unit</th>
        <th class="table-top" scope="col">Keterangan</th>
      </tr>
      <?php
      foreach($c->getDataPenggunaan() as $row){
        ?>
        <tr href="#pemakaianUpdate" data-toggle="pill" onclick="update2('<?php echo $row['id_penggunaan']; ?>','<?php echo $row['id_barang']; ?>','<?php echo $row['tanggal']; ?>','<?php echo $row['tanggungJawab']; ?>','<?php echo $row['jumlah']; ?>','<?php echo $row['keterangan']; ?>');">
          <td><?php echo $row['id_penggunaan']; ?></td>
          <td><?php echo $row['id_barang']; ?></td>
          <td><?php echo $row['tanggal']; ?></td>
          <td><?php echo $row['tanggungJawab']; ?></td>
          <td><?php echo $row['jumlah']; ?></td>
          <td><?php echo $row['keterangan']; ?></td>
        </tr>
        <?php
      }
      ?>
    </tbody>
  </table>

  


</div>
</div>

<div id="pengajuanBarang" class="tab-pane fade in">
  <div class="view">
   <div class="karyawan-menu" style="position: relative; left: 820px;">
    <a href="#pengajuanBarangBaru" data-toggle="pill"><img src="./assets/img/menu/input.png" alt="Insert"></a>
  </div>
  <table width="900" height="300" border="0">
    <tbody>
      <tr>
        <th class="table-top" scope="col">ID Pengajuan</th>
        <th class="table-top" scope="col">ID Barang</th>
        <th class="table-top" scope="col">Nama karyawan</th>
        <th class="table-top" scope="col">jumlah</th>
        <th class="table-top" scope="col">harga</th>
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
          <td><?php echo $row['status']; ?></td>
        </tr>
        <?php
      }
      ?>
    </tbody>
  </table>

  


</div>
</div>

<div id="pengajuanBarangBaru" class="tab-pane fade in">
  <form method="post" action="?c=inventaris&f=insertPengajuan">
   <div class="create-wrapper no-src">
     <div class="create">
      <table width="800" border="0">
        <tbody>
          <tr>
            <td>ID Pengajuan</td>
            <td><input type="text" name="idPengajuan"></td>
          </tr>
          <tr>
            <td>Nama Barang</td>
            <td><input type="text" name="idBarang"></td>
          </tr>
          <tr>
            <td>id karyawan</td>
            <td><input type="text" name="idKaryawan"></td>
          </tr>
          <tr>
            <td>jumlah</td>
            <td><input type="text" name="jumlah"></td>
          </tr>
          <tr>
            <td>harga</td>
            <td><input type="text" name="harga"></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  
  <div class="submit">
    <button type="submit" style="position: relative; top: 50px;"><img src="./assets/#" alt="logo2"></button>
  </div>
</form>
</div>

<div id="pemakaianBaru" class="tab-pane fade in">
  <form method="post" action="?c=inventaris&f=insertPemakaian">
   <div class="create-wrapper no-src">
     <div class="create">
      <table width="800" border="0">
        <tbody>
          <tr>
            <td>ID Penggunaa</td>
            <td><input type="text" name="idPenggunaan"></td>
          </tr>
          <tr>
            <td>Nama Barang</td>
            <td><input type="text" name="idBarang"></td>
          </tr>
          <tr>
            <td>Tanggal</td>
            <td><input type="date" name="tgl"></td>
          </tr>
          <tr>
            <td>Tanggung Jawab</td>
            <td><input type="text" name="jawab"></td>
          </tr>
          <tr>
            <td>Jumlah</td>
            <td><input type="text" name="jumlah"></td>
          </tr>
          <tr>
            <td>Keterangan</td>
            <td><input type="text" name="keterangan"></td>
          </tr>
          
        </tbody>
      </table>
    </div>
  </div>
  
  <div class="submit">
    <button type="submit" style="position: relative; top: 50px;"><img src="./assets/#" alt="logo2"></button>
  </div>
</form>
</div>

<div id="pemakaianUpdate" class="tab-pane fade in">
  <form method="post" action="?c=inventaris&f=updatePemakaian">
   <div class="create-wrapper no-src">
     <div class="create">
      <table width="800" border="0">
        <tbody>
          <tr>
            <td>ID Penggunaa</td>
            <td><input type="text" name="idPenggunaan" id="id"></td>
          </tr>
          <tr>
            <td>Nama Barang</td>
            <td><input type="text" name="idBarang" id="idB"></td>
          </tr>
          <tr>
            <td>Tanggal</td>
            <td><input type="date" name="tgl" id="tgl"></td>
          </tr>
          <tr>
            <td>Tanggung Jawab</td>
            <td><input type="text" name="jawab" id="jawab"></td>
          </tr>
          <tr>
            <td>Jumlah</td>
            <td><input type="text" name="jumlah" id="jumlah"></td>
          </tr>
          <tr>
            <td>Keterangan</td>
            <td><input type="text" name="keterangan" id="ket"></td>
          </tr>
          
        </tbody>
      </table>
    </div>
  </div>
  
  <div class="submit">
    <button type="submit" style="position: relative; top: 50px;"><img src="./assets/#" alt="logo2"></button>
  </div>
</form>
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
     <img src="./assets/img/menu/barang.png">
     <a data-toggle="pill" href="#kelolaBarang">Kelola Barang</a>
   </div>
 </li>
 
 
 <li>
   <div class="menu">
     <img src="./assets/img/menu/keluarmasuk.png">
     <a data-toggle="pill" href="#pemakaian">Pemakaian</a>
   </div>
 </li>
 
 <li>
   <div class="menu">
     <img src="./assets/img/menu/pengajuan.png">
     <a data-toggle="pill" href="#pengajuanBarang">Pengajuan Barang</a>
   </div>
 </li>

</ul>




<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="./assets/js/jquery-1.11.3.min.js"></script>
<script src="./assets/js/bootstrap.js"></script>
</body>
</html>