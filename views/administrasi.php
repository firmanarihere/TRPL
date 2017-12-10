<?php
include "./controllers/administrasi.php";
$c = new administrasi("administrasi");
//echo $_SESSION['a'];
$id = "";
$nm = "";
$almt= "";
$gol = "";
$lalu = "";
$kini = "";
$tarif = "";
$tgl = "";
$monByr = 0;
$yrByr = 0;
$bebanT = "";
if(!empty($_POST['searchID'])){
  $bebanT = "11500";
  $searchID=$_POST['searchID'];
  //echo $searchID;

  foreach ($c->getDataSearch2($searchID) as $row) {
    $tgl = strtotime($row['tgl_pembayaran']);
    //echo "tgl2".$tgl;
  }
  foreach($c->getDataSearch($searchID) as $row){
    $id = $row['no_pelanggan'];
    $nm = $row['nama_lengkap'];
    $almt= $row['alamat'];
    $gol = $row['golongan'];
    $lalu = $row['standLalu'];
    $kini = $row['standKini'];
    $tarif = $row['tarif'];
    if (empty($tgl)) {
      $tgl = strtotime($row['tgl_langganan']);
      //echo "tgl1".$tgl;
    }
  }   
  $yrByr = date("Y", $tgl) .""; 
  $monByr = date("m", $tgl)."";
} 
//echo "monByr".$monByr;
$yrNow = date("Y", time()) .""; 
$monNow = date("m", time())."";
//echo "monNow".$monNow;
$tgl = (($kini-$lalu)*$tarif+$bebanT)*(($monNow-$monByr)*10)/100; 
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

    <div id="kelolaPelanggan" class="tab-pane fade in">
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
              <tr onclick="update('<?php echo $row['no_pelanggan']; ?>',
                '<?php echo $row['nama_lengkap']; ?>',
                '<?php echo $row['luas_lahan']; ?>',
                '<?php echo $row['golongan']; ?>',
                '<?php echo $row['tipe_bangunan']; ?>',
                '<?php echo $row['alamat']; ?>',
                '<?php echo $row['tgl_langganan']; ?>')" href="#kelolaPelangganUpdate" data-toggle="pill">
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

  <div id="pembayaranTagihan" class="tab-pane fade in active">
    <div class="search">
      <form method="post" action="">
       Nomor Pelanggan<input type="text" name="searchID"><button type="submit" name="search"><img src="./assets/img/menu/cari.png" alt="Search"></button>
     </form>
   </div>
   <div class="create-wrapper">
     <div class="create">
      <form method="POST" action="?c=administrasi&f=insertPembayaran">
       <div class="large">
        <table width="800" border="0">
          <tbody>
            <tr>
              <td>Nomor Pelanggan</td>
              <td><input readonly type="text" name="id" value="<?php echo $id ?>"></td>
              <td>Golongan</td>
              <td><input readonly type="text" name="gol" value="<?php echo $gol ?>"></td>
            </tr>
            <tr>
              <td>Nama</td>
              <td><input readonly type="text" name="nama" value="<?php echo $nm ?>"></td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td><input readonly type="text" naem="alamat" value="<?php echo $almt ?>"></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td>Stand Kini</td>
              <td><input readonly type="text" name="kini" value="<?php echo $kini ?>"></td>
              <td>Harga Air</td>
              <td><input readonly type="text" value="<?php echo $tarif ?>"></td>
            </tr>
            <tr>
              <td>Stand Lalu</td>
              <td><input readonly type="text" name="lalu" value="<?php echo $lalu ?>"></td>
              <td>Beban Tetap</td>
              <td><input readonly type="text" name="bebanT" value="<?php echo $bebanT ?>"></td>
            </tr>
            <tr>
              <td>Pemakaian</td>
              <td><input readonly type="text" name="pemakaian" value="<?php echo $kini-$lalu ?>"></td>
              <td>Tagihan</td>
              <td><input readonly type="text" value="<?php echo ($kini-$lalu)*$tarif+$bebanT ?>"></td>
            </tr>
            <tr>
              <td>Denda</td>
              <td><input readonly type="text" name="denda" value="<?php echo $tgl ?>"></td>
              <td>Total</td>
              <td><input readonly type="text" name="total" value="<?php echo ($kini-$lalu)*$tarif+$bebanT+$tgl ?>"></td>
            </tr>
            <tr>
              <td>Nomor LPPA</td>
              <td><input readonly type="text" value="auto"></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td>Kasir</td>
              <td><input type="text" name="idK" value="<?php echo $_SESSION['id'] ?>"></td>
              <td></td>
              <td></td>
            </tr>

          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="submit">
    <button type="submit" style="position: relative; bottom: 495px; right: 120px;"><img src="./assets/img/menu/input.png" alt="Submit"></button>
  </div>
</form>
</div>

<div id="kelolaPelangganUpdate" class="tab-pane fade in">
  <form method="post" action="?c=administrasi&f=update">
   <div class="create-wrapper no-src">
     <div class="create">
      <table width="800" border="0">
        <tbody>
          <tr>
            <td>ID Pelanggan</td>
            <td><input type="text" name="id" id="id"></td>
          </tr>
          <tr>
            <td>Nama Lengkap</td>
            <td><input type="text" name="nama" id="nama"></td>
          </tr>
          <tr>
            <td>Luas Lahan</td>
            <td><input type="text" name="lahan" id="lahan"></td>
          </tr>
          <tr>
            <td>Golongan</td>
            <td><select name="gol">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
            </select></td>
          </tr>
          <tr>
            <td>Tipe Bangunan</td>
            <td><input type="text" name="tipe" id="tipe"></td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td><input type="text" name="alamat" id="alamat"></td>
          </tr>
          <tr>
            <td>Tanggal Langganan</td>
            <td><input type="date" name="tanggal" id="tgl"></td>
          </tr>

        </tbody>
      </table>
    </div>
    <div class="submit">
      <button type="submit" style="position: relative; top: 50px;"><img src="./assets/#" alt="logo3"></button>
    </div>
  </div>


</form>
</div>

<div id="kelolaPelangganBaru" class="tab-pane fade in">
  <form method="POST" action="?c=administrasi&f=insert">
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
            <td><select name="gol">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
            </select></td>
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
            <td><input type="date" name="tanggal"></td>
          </tr>

        </tbody>
      </table>
    </div>
    <div class="submit">
      <button type="submit" style="position: relative; top: 50px;"><img src="./assets/#" alt="Insert"></button>
    </div>
  </div>
</form>

</div>	


</div>



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


<script>
  function update(id, nama, luas, gol, tipe, alamat, tgl){
    document.getElementById("id").value = id;
    document.getElementById("nama").value = nama;
    document.getElementById("lahan").value = luas;
    //document.getElementById("gol").value = gol;
    document.getElementById("alamat").value = alamat;
    document.getElementById("tipe").value = tipe;
    document.getElementById("tgl").value = tgl;
  };
</script>



<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="./assets/js/jquery-1.11.3.min.js"></script>
<script src="./assets/js/bootstrap.js"></script>
</body>
</html>