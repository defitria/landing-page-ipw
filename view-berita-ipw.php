<?php
include "koneksi.php";
include "header-less.php";
?>
<style type="text/css">
    a {
        /* margin-top: 500px; */
        margin-left: 30px;
        text-decoration: none;
        color: #3050F3;
    }

    a:hover {
        color: #000F5E;
    }
</style>

<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$id    = mysqli_real_escape_string($koneksi, $_GET['id']);
$query = mysqli_query($koneksi, "SELECT * FROM berita WHERE id='$id' ");
$data  = mysqli_fetch_array($query);
?>
<div class="card" style="margin-top:150px; text-align:center; margin-bottom:150px;">
    <h3 class="bold"><?php echo $data['judul'] ?></h3> <br>
    <img src="images/<?php echo $data['gambar']; ?>" class="card-img-top" width="700px"> <br>
    <small style="font-size: 12px;">Diterbitkan oleh Admin pada tanggal <?= date('d F Y', strtotime($data['tanggal'])) ?>.</small>
    <br> <br>
    <p class="" style="font-size: 18px; text-align:justify; margin:40px;"><?php echo $data['isi'] ?></p>
</div>

<?php include "footer.php"; ?>