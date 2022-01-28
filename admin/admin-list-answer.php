<?php
session_start();

include '../koneksi.php';
include 'header-admin.php';

if ($_GET['act'] && $_GET['act'] == 'hapus') {

    $c = $koneksi->query("DELETE FROM jawabanadmin WHERE id = " . $_GET['id'] . "");
}
?>
<!-- USER SECTION -->
<section>
    <div class="container" style="margin-top:130px;">
        <div class="col-lg-6 col-md-6 o" style="text-align: center;">
            <p class=""><a href="admin-pesan.php" class="galeri" style="font-size: 16px; font-weight:bold; text-decoration: none; color:black;">List Pesan</a></hp>
        </div>
        <div class="col-lg-6 col-md-6 o">
            <p class=""><a href="admin-list-answer.php" class="galeri" style="font-size: 16px; font-weight:bold;  text-decoration: none; color:black;">List Jawaban</a></p>
        </div>
        <div class="container col-md-12 col-sm-12">
            <h4 style="margin-top: 50px;">List Jawaban</h4>
            <table class="table">
                <tr>
                    <th class="">No</th>
                    <th class="">Email Pengunjung</th>
                    <th class="">Pesan oleh Admin</th>
                    <th class="">Tanggal</th>
                    <th class="">Aksi</th>
                </tr>

                <?php
                error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                $batas = 10;
                $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                $previous = $halaman - 1;
                $next = $halaman + 1;

                $data = mysqli_query($koneksi, "SELECT * FROM jawabanadmin");
                $jumlah_data = mysqli_num_rows($data);
                $total_halaman = ceil($jumlah_data / $batas);

                $data_jawaban = mysqli_query($koneksi, "SELECT * FROM jawabanadmin ORDER BY id ASC limit $halaman_awal, $batas");

                $nomor = $halaman_awal + 1;
                while ($r = mysqli_fetch_array($data_jawaban)) {
                    extract($r);
                ?>
                    <tr>
                        <td class=''><?= $nomor++ ?> </td>
                        <td class=''><?= $email_pengunjung ?></td>
                        <td class=''><?= $pesan_jawaban ?></td>
                        <td class=''><?= date("d F Y", strtotime($tanggal_jawaban)); ?></td>
                        <td class=''><a href='?mod=jawaban&act=hapus&id=<?= $id ?>' class='btn btn-danger'><i class="fas fa-trash-alt"></i></a></td>

                    </tr>
                <?php
                }
                ?>
            </table>
            <nav style="margin-left: 450px;">
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
        </div>
    </div>
</section>
<br>