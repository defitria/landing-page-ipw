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

</head>

<body>
    <?php
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    $id    = mysqli_real_escape_string($koneksi, $_GET['id']);
    $query = mysqli_query($koneksi, "SELECT * FROM galerivideo WHERE id='$id' ");
    $data  = mysqli_fetch_array($query);
    ?>
    <hr>
    <div style="margin-left: 100px; margin-top:50px;">
        <video src="../videos/<?php echo $data['video'] ?>" controls width="500px"></video><br><br>
        <a href='admin-galeri.php' class="btn btn-primary back"> Kembali </a>
    </div>
</body>

</html>