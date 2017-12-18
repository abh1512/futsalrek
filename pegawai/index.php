<?php
include "../lib/settings.php";
include "../lib/function.php";

$halaman=isset($_GET['halaman'])?$_GET['halaman'].".php":"dashboard.php";
$aktif=array('registrasi'=>"",'dashboard'=>"",'lapangan'=>"",'transaksi'=>"",'laporan'=>"");
if(isset($_GET['halaman'])){
	$aktif[$_GET['halaman']]='active';
	if($_GET['halaman']=="logout"){
	 unset($_SESSION['id_pengguna']);
	 session_destroy();
	 telahLogin();
 }
}else{
	$aktif['dashboard']='active';
}

 ?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- Title -->
        <title>Alpha | Responsive Admin Dashboard Template</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />

				<!-- Styles -->
				<link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css"/>
				<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
				<link href="../assets/plugins/metrojs/MetroJs.min.css" rel="stylesheet">
				<link href="../assets/plugins/weather-icons-master/css/weather-icons.min.css" rel="stylesheet">
				<link href="../assets/plugins/google-code-prettify/prettify.css" rel="stylesheet" type="text/css"/>
				<link href="../assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css"/>
				<link href="../assets/plugins/select2/css/select2.css" rel="stylesheet">

				<!-- Theme Styles -->
				<link href="../assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
				<link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>
        <div class="loader-bg"></div>
        <div class="loader">
            <div class="preloader-wrapper big active">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-teal lighten-1">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mn-content fixed-sidebar">
            <header class="mn-header navbar-fixed">
              <nav class="cyan darken-1">
                <div class="nav-wrapper row">
                    <section class="material-design-hamburger navigation-toggle">
                        <a href="javascript:void(0)" data-activates="slide-out" class="button-collapse show-on-large material-design-hamburger__icon">
                            <span class="material-design-hamburger__layer"></span>
                        </a>
                    </section>
                    <!--div class="header-title col s3 m3">
                        <span class="chapter-title">PEMBIMBING</span>
                    </div-->
                    <ul id="dropdown1" class="dropdown-content">
                      <li><a href="?halaman=logout">Log Out</a></li>
                    </ul>
                    <ul class="right col s9 m3 nav-right-menu">
                      <li class=""><a class="dropdown-button" href="#!" data-beloworigin="true" data-activates="dropdown1"><i class="material-icons right">perm_identity</i></a></li>
                      <li><small>Kebraon Sport Center</small></li>
                    </ul>
                </div>
            </nav>
            </header>
            <aside id="slide-out" class="side-nav white fixed">
                <div class="side-nav-wrapper">
                    <div class="sidebar-profile center">
                        <div class="sidebar-profile-image">
                            <img src="../../assets/images/profile-image.png" class="circle" alt="">
                        </div>
                        <div class="sidebar-profile-info">
                                <p>David Doe</p>
                                <span>david@gmail.com</span>
                        </div>
                    </div>
                <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
                    <li class="no-padding <?=$aktif['dashboard']?>"><a class="waves-effect waves-grey active" href="?"><i class="material-icons">settings_input_svideo</i>Dashboard</a></li>
                    <li class="no-padding <?=$aktif['registrasi']?> "><a class="waves-effect waves-grey active" href="?halaman=registrasi"><i class="material-icons">assignment</i>Registrasi</a></li>
                    <li class="no-padding <?=$aktif['transaksi']?>"><a class="waves-effect waves-grey active" href="?halaman=transaksi"><i class="material-icons">add_shopping_cart</i>Transaksi</a></li>
                    <li class="no-padding <?=$aktif['lapangan']?>"><a class="waves-effect waves-grey active" href="?halaman=lapangan"><i class="material-icons">settings_input_svideo</i>Lapangan</a></li>
                    <li class="no-padding <?=$aktif['laporan']?>"><a class="waves-effect waves-grey active" href="index.html"><i class="material-icons">insert_chart</i>Laporan</a></li>
                </ul>
                <div class="footer">
                    <p class="copyright">Steelcoders ©</p>
                    <a href="#!">Privacy</a> &amp; <a href="#!">Terms</a>
                </div>
                </div>
            </aside>
            <main class="mn-inner inner-active-sidebar">
              <?php
				          if (file_exists($halaman))
					             include $halaman;
			          ?>
              </div>
            </main>
        </div>
        <div class="left-sidebar-hover"></div>


				<!-- Javascripts -->
				<script src="../assets/plugins/jquery/jquery-2.2.0.min.js"></script>
				<script src="../assets/plugins/materialize/js/materialize.min.js"></script>
				<script src="../assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
				<script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
				<script src="../assets/plugins/waypoints/jquery.waypoints.min.js"></script>
				<script src="../assets/plugins/counter-up-master/jquery.counterup.min.js"></script>
				<script src="../assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
				<script src="../assets/plugins/chart.js/chart.min.js"></script>
				<script src="../assets/plugins/flot/jquery.flot.min.js"></script>
				<script src="../assets/plugins/flot/jquery.flot.time.min.js"></script>
				<script src="../assets/plugins/flot/jquery.flot.symbol.min.js"></script>
				<script src="../assets/plugins/flot/jquery.flot.resize.min.js"></script>
				<script src="../assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
				<script src="../assets/plugins/curvedlines/curvedLines.js"></script>
				<script src="../assets/plugins/peity/jquery.peity.min.js"></script>
				<script src="../assets/js/alpha.min.js"></script>
				<?=isset($loadAfterJQuery)?$loadAfterJQuery:"";?>

    </body>
</html>
