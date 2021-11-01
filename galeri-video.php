<?php
$batas = 3;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

$previous = $halaman - 1;
$next = $halaman + 1;

$data = mysqli_query($koneksi, "SELECT * FROM galerivideo");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);

$data_video = mysqli_query($koneksi, "SELECT * FROM galerivideo WHERE terbit='Y' limit $halaman_awal, $batas");
$nomor = $halaman_awal + 1;
while ($d = mysqli_fetch_array($data_video)) {
?>

    <video src="videos/<?php echo $d['video'] ?>" controls width="700px"></video>

<?php } ?>

<nav>
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