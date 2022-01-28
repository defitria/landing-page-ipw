<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

$keluar = (isset($_GET['keluar'])) ? $_GET['keluar'] : '';

if (isset($_GET["keluar"]) == "yes") {
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    session_destroy();
    header("Location:../index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- SITE TITLE -->
    <title>IPW Bappeda Sumsel</title>
    <!--

Blaster Template

http://www.templatemo.com/tm-472-blaster

-->
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <!-- STYLESHEET CSS FILES -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.min.css">
    <link rel="stylesheet" href="../css/calendar.css">
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="stylesheet" href="../css/nivo-lightbox.css">
    <link rel="stylesheet" href="../css/nivo_themes/default/default.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
</head>

<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

    <!-- navigation section -->
    <section class="navbar navbar-fixed-top custom-navbar" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                </button>
                <a href="admin.php" class="navbar-bappeda">
                    <p style="font-size: 14px; font-weight: bold; font-family: 'Montserrat', sans-serif;">
                        <img src="../images/logo1.png" alt="" style="width: 35px;">
                        &nbsp; ADMIN IPW
                        BAPPEDA SUMSEL
                    </p>
                </a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="admin.php" class="smoothScroll">BERANDA</a></li>

                    <li><a href="admin-arsip-ipw.php" class="smoothScroll">ARSIP</a></li>

                    <li><a href="admin-agenda-ipw.php" class="smoothScroll">AGENDA</a></li>

                    <li><a href="admin-galeri.php" class="smoothScroll">GALERI</a></li>

                    <li><a href="admin-berita-ipw.php" class="smoothScroll">BERITA</a></li>

                    <li><a href="admin-pesan.php" class="smoothScroll">PESAN</a></li>

                    <li><a href="?keluar=yes" class="smoothScroll">LOGOUT</a></li>
                </ul>
            </div>
        </div>
    </section>