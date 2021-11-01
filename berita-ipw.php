<?php
include 'header-less.php';
?>

<div class="col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="0.6s" style="margin-top: 150px;">
    <?php
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    $batas = 6;
    $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
    $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

    $previous = $halaman - 1;
    $next = $halaman + 1;

    $data = mysqli_query($koneksi, "SELECT * FROM berita");
    $jumlah_data = mysqli_num_rows($data);
    $total_halaman = ceil($jumlah_data / $batas);

    $data_berita = mysqli_query($koneksi, "SELECT * FROM berita WHERE terbit='Y' ORDER BY id ASC limit $halaman_awal, $batas");

    while ($r = mysqli_fetch_array($data_berita)) {
        extract($r);

    ?>
        <div class="col-lg-6 col-md-6">
            <img src="images/<?php echo $gambar; ?>" class="card-img-top" width="540px"> <br> <br>
            <h4 class="bold"><?php echo $judul ?></h4>
            <i class="far fa-calendar-alt"></i> &nbsp;<?= date('d F Y', strtotime($tanggal)) ?>
            &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
            <a href="view-berita-ipw.php?id=<?= $id ?>" class="btn btn-primary btn-sm">Lihat</a>
        </div>
    <?php } ?>
</div>
<nav style="margin-left:550px; margin-top:50px;">
    <ul class="pagination justify-content-center">
        <li class="page-item">
            <a class="page-link" <?php if ($halaman > 1) {
                                        echo "href='?halaman=$Previous'";
                                    } ?>>Previous</a>
        </li>
        <?php
        for ($x = 1; $x <= $total_halaman; $x++) {
        ?>
            <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
        <?php
        }
        ?>
        <li class="page-item">
            <a class="page-link" <?php if ($halaman < $total_halaman) {
                                        echo "href='?halaman=$next'";
                                    } ?>>Next</a>
        </li>
    </ul>
</nav>