<?php
include '../koneksi.php';

//mengambil data dari form input
$kegiatan   = $_POST['kegiatan'];
$mulai      = $_POST['mulai'];
$selesai    = $_POST['selesai'];
$nama    = $_POST['nama'];
$tempat    = $_POST['tempat'];
$peserta    = $_POST['peserta'];


//insert data ke dalam database
$koneksi->query("INSERT INTO agenda SET kegiatan='$kegiatan', mulai='$mulai', selesai='$selesai', nama='$nama', tempat='$tempat', peserta='$peserta' ");


//kembali ke halaman index.php
header("location: admin-agenda-ipw.php");
