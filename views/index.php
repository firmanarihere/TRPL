<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Beranda</title>
	<style>
  .affix {
      top: 30px;
      width: 100%;
      -webkit-transition: all .5s ease-in-out;
      transition: all .5s ease-in-out;
	  z-index: 999 !important;
  }
  .affix-top {
      position: static;
      top: 0px;
  }
  .affix + .container-fluid {
      padding-top: 70px;
  }
		.navbar {
			margin-bottom: 0 !important;
		}
		
		h1 {
			font-family: Arial, Arial Black, Arial Unicode MS !important;
			font-size: 63px !important;
		}
		p {
			font-size: 60px;
			color: white;
		}
	</style>
<!-- Bootstrap -->
<link href="./assets/css/bootstrap.css" rel="stylesheet">
<link href="./assets/css/style.css" rel="stylesheet" type="text/css">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#defaultNavbar1">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href=""><img src="./assets/img/LOGO2.png" class="menu-atas-logo menu-atas-logo-1"></a>
      </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="defaultNavbar1" >
      <ul class="nav navbar-nav">
        <li><a href="#beranda" style="font-size: 26px">Beranda<span class="sr-only">(current)</span></a></li>
        <li><a href="#profil" style="font-size: 26px">Profil</a></li>
        <li><a href="#infolayanan" style="font-size: 26px">Info Layanan</a></li>
        <li><a href="#contactperson" style="font-size: 26px">Contact Person</a></li>
      </ul>
        
	  <ul class="nav navbar-nav navbar-right">
			<li><a href="?c=FrontController&f=login" style="font-size: 26px"><span class="glyphicon glyphicon-user"></span> Login</a></li>
		</ul>
    </div>
    
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>
 
<div class="container-fluid" id="profil">
	<div class="profil-text">
		<p>Sejarah PDAM Jember</p>
		Perusahaan Daerah Air Minum pada mulanya dibangun oleh Pemerintah belanda cq. Provencial Oost Java yang berkedudukan di Kota Surabaya pada tahun 1930 dan diberi nama Provencial Water Leding Bedrijf. Sedang status Perusahaan ini diatur berdasarkan ketentuan status Gemente atau Regentscap. maka sejak 1940 diganti nama menjadi Regentscap Water Leding Berdrijf Djember. 
	</div>
  </div> 
              
  <hr>
  
  <hr>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="./assets/js/jquery-1.11.3.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="./assets/js/bootstrap.js"></script>
</body>
</html>
