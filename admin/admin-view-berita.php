<?php
include "../koneksi.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin IPW Bappeda Sumsel</title>
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
</head>

<body>
    <?php
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    $id    = mysqli_real_escape_string($koneksi, $_GET['id']);
    $query = mysqli_query($koneksi, "SELECT * FROM berita WHERE id='$id' ");
    $data  = mysqli_fetch_array($query);
    ?>
    <div class="card" style="margin-top:50px; text-align:center;">
        <h3 class="bold"><?php echo $data['judul'] ?></h3> <br>
        <img src="../images/<?php echo $data['gambar']; ?>" class="card-img-top" width="700px"> <br>
        <small style="font-size: 12px;">Diterbitkan oleh Admin pada tanggal <?= date('d F Y', strtotime($data['tanggal'])) ?>.</small>
        <br> <br>
        <p class="" style="font-size: 18px; text-align:justify; margin:40px;"><?php echo $data['isi'] ?></p>
    </div>
    <div style="margin-bottom:50px;">
        <a href='admin-berita-ipw.php' class="btn btn-primary back"> Kembali </a>
    </div>
</body>

</html>