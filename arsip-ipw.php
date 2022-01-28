<?php
include 'header-less.php';

?>

<!-- LIST ARSIP -->
<section style="margin-top: 150px;">
    <div class="container">
        <h4>List Arsip Bidang IPW Bappeda Sumsel</h4>

        <form action="" method="POST">
            <div class="row">
                <div class="col-lg-4 col-sm-4 col-md-4">
                    <select name="tahun" class="form-control" style="width: 350px;">
                        <option selected>-- Pilih Tahun --</option>
                        <?php
                        $sql = mysqli_query($koneksi, "SELECT tanggal FROM arsip GROUP BY EXTRACT(YEAR FROM tanggal) DESC");
                        while ($r = mysqli_fetch_array($sql)) {

                            extract($r);

                        ?>
                            <option value="<?= date('Y', strtotime($tanggal)) ?>"><?= date('Y', strtotime($tanggal)) ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-4 col-sm-4 col-md-4">
                    <input class="btn btn-primary" style=" width:80px;" type="submit" name="ok" value="Oke">
                </div>
            </div>
        </form>
        <br>
        <?php
        if (isset($_POST['ok'])) {

        ?>
            <table class="table">

                <?php
                error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                $batas = 10;
                $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                $previous = $halaman - 1;
                $next = $halaman + 1;

                $data = mysqli_query($koneksi, "SELECT * FROM arsip WHERE YEAR(tanggal) = " . $_POST["tahun"] . "");
                $jumlah_data = mysqli_num_rows($data);
                $total_halaman = ceil($jumlah_data / $batas);

                $data_arsip = mysqli_query($koneksi, "SELECT * FROM arsip WHERE terbit='Y' AND YEAR(tanggal) = " . $_POST["tahun"] . " ORDER BY id ASC limit $halaman_awal, $batas");

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
<?php
        } else {
?>

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

            $data_arsip = mysqli_query($koneksi, "SELECT * FROM arsip WHERE terbit='Y' ORDER BY id ASC limit $halaman_awal, $batas");

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
<?php } ?>
</section>
<br><br>

<?php include 'footer.php'; ?>