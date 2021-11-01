<?php
include 'header-less.php';
?>

<!-- LIST ARSIP -->
<section style="margin-top: 150px;">
    <div class="container">

        <h4>List Arsip Bidang IPW Bappeda Sumsel</h4> <br>
        <table class="table">

            <?php
            error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
            $batas = 10;
            $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
            $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

            $previous = $halaman - 1;
            $next = $halaman + 1;

            $data = mysqli_query($koneksi, "SELECT * FROM arsip");
            $jumlah_data = mysqli_num_rows($data);
            $total_halaman = ceil($jumlah_data / $batas);

            $data_arsip = mysqli_query($koneksi, "SELECT * FROM arsip WHERE terbit='Y' ORDER BY id DESC limit $halaman_awal, $batas");

            while ($r = mysqli_fetch_array($data_arsip)) {
                extract($r);

            ?>
                <tr>
                    <td class="col"><?= $judul ?></td>
                    <td class="col">Diunggah pada : <?= date('d F Y', strtotime($tanggal)) ?></td>
                    <td class="col"><a href="view-arsip.php?id=<?= $id ?>" class="btn btn-primary btn-sm"><i class="far fa-eye"></i></a></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
    <nav style="margin-left:550px;">
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
</section>
<br><br>

<?php include 'footer.php'; ?>