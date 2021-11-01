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
        body {
            font-family: verdana;
            font-size: 12px;
        }

        a {
            /* margin-top: 500px; */
            margin-left: 30px;
            text-decoration: none;
            color: #3050F3;
        }

        a:hover {
            color: #000F5E;
        }

        div {
            margin-left: 100px;
        }

        .back {
            margin-bottom: 1150px;
        }
    </style>
</head>

<body>
    <?php
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    $id    = mysqli_real_escape_string($koneksi, $_GET['id']);
    $query = mysqli_query($koneksi, "SELECT * FROM arsip WHERE id='$id' ");
    $data  = mysqli_fetch_array($query);
    ?>
    <hr>
    <div>
        <embed src="../file/<?php echo $data['nama']; ?>" type="application/pdf" width="800" height="600">
        <a href='admin-arsip-ipw.php' class="btn btn-primary back"> Kembali </a>
    </div>
</body>

</html>