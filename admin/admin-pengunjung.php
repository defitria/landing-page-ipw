<?php

session_start();

include '../koneksi.php';

if ($_GET['act'] && $_GET['act'] == 'hapus') {
    $id = (int)$_GET['no'];

    $c = $koneksi->query("DELETE FROM pengunjung WHERE no = " . $_GET["no"] . "");
} elseif ($_GET['act'] && $_GET['act'] == 'jawab') {

    header("Location: admin-answer.php?email=" . $_GET["email"] . "");
}

?>

<!-- USER SECTION -->
<section>
    <div class="container" style="margin-top:-50px;">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <h4 style="margin-top: 50px;">List Pesan</h4>
                <table class="table">
                    <tr>
                        <th class="">No</th>
                        <th class="">Nama</th>
                        <th class="">Email</th>
                        <th class="">Pesan</th>
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

                    $data = mysqli_query($koneksi, "SELECT * FROM pengunjung");
                    $jumlah_data = mysqli_num_rows($data);
                    $total_halaman = ceil($jumlah_data / $batas);

                    $data_pengunjung = mysqli_query($koneksi, "SELECT * FROM pengunjung ORDER BY no ASC limit $halaman_awal, $batas");

                    $nomor = $halaman_awal + 1;
                    while ($r = mysqli_fetch_array($data_pengunjung)) {
                        extract($r);
                    ?>
                        <tr>
                            <td class=''><?= $nomor++ ?> </td>
                            <td class=''><?= $nama ?></td>
                            <td class=''><?= $email ?></td>
                            <td class=''><?= $pesan ?></td>
                            <td class=''><?= date("d F Y", strtotime($tanggal)); ?></td>
                            <td class=''><a href='?mod=pengunjung&act=jawab&email=<?= $email ?>' class='btn btn-primary'>Jawab</a> | <a href='?mod=pengunjung&act=hapus&no=<?= $no ?>' class='btn btn-danger'><i class="fas fa-trash-alt"></i></a></td>

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
    </div>
</section>
<br>