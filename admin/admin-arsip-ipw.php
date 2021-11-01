<?php

session_start();

include 'header-admin.php';
include '../koneksi.php';

?>

<?php
if ($_GET['act'] && $_GET['act'] == 'terbitkan') {

    $sql = mysqli_query($koneksi, "UPDATE arsip SET terbit='Y' WHERE id='" . $_GET['id'] . "'");
} elseif ($_GET['act'] && $_GET['act'] == 'tidak-terbit') {
    $sql = mysqli_query($koneksi, "UPDATE arsip SET terbit='N' WHERE id='" . $_GET['id'] . "'");
}

if (isset($_POST['editarsip'])) {

    $sql = mysqli_query($koneksi, "UPDATE arsip SET judul='" . $_POST['judul'] . "', nama='" . $_POST['file'] . "', kategori='arsip IPW', terbit='" . $_POST['terbit'] . "', '" . date('Y-m-d H:i:s') . "' WHERE id='" . $_POST['id'] . "'");

    $error = "Data berhasil diperbaharui.";
}


if ($_GET['act'] && $_GET['act'] == 'editarsip') {
    include '../koneksi.php';
    $id = (int)$_GET['id'];

    $b = $koneksi->query("SELECT * FROM arsip WHERE id = " . $id . " ");
    $b = $b->fetch_assoc();

    if (isset($_GET['hapusfile']) && $_GET['hapusfile'] == 'yes') {
        unlink('pdf/' . $b['nama']);
        $sqlupdate = mysqli_query($koneksi, "UPDATE berita SET nama =' ' WHERE id=" . $id . " ");

        echo "<meta http-equiv='REFRESH' content='0;url=?modeditberita&id=" . $id . "' /> ";
    }
} elseif ($_GET['act'] && $_GET['act'] == 'hapusarsip') {
    $id = (int)$_GET['id'];

    $c = $koneksi->query("DELETE FROM arsip WHERE id = " . $_GET["id"]);
}

echo $error;

?>

<!-- SECTION -->
<section>
    <div class="container" style="margin-top:150px;">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <!-- TAMBAH USER ADMIN -->
                <form action="upload-arsip.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $b["id"] ?>">
                    <fieldset>
                        <legend class="bold">Tambah Arsip</legend>
                        <table>
                            <tr>
                                <td>
                                    <label class="form-label">Judul</label>
                                    <input class="form-control" style="width: 500px;" type="text" name="judul" value="<?= $b['judul'] ?>" placeholder="Masukkan Judul">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="form-label" style="margin-top: 20px;">Berkas</label>
                                    <input class="form-control" type="file" name="file">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="form-label" style="margin-top: 20px;">Terbitkan?</label>
                                    <select class="form-select" name="terbit" style="margin-left: 20px;">
                                        <option value="none">-- Pilih Status --</option>
                                        <option value="Y" <?= (($terbit == Y) ? 'selected' : '') ?>>Yes</option>
                                        <option value="N" <?= (($terbit == N) ? 'selected' : '') ?>>No</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input class="btn btn-primary" style="margin-top: 20px;" type="submit" name="<?= ($b["id"] ? "editarsip" : "tambaharsip") ?>" value="<?= ($b["id"] ? "Simpan" : "Tambah") ?>">
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </form>

                <!-- LIST ARSIP -->

                <h4 style="margin-top: 50px;">List Arsip</h4>
                <table class="table">
                    <tr>
                        <th class="">No</th>
                        <th class="">Judul</th>
                        <th class="">Nama File</th>
                        <th class="">Kategori</th>
                        <th class="">Terbit</th>
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

                    $data = mysqli_query($koneksi, "SELECT * FROM arsip");
                    $jumlah_data = mysqli_num_rows($data);
                    $total_halaman = ceil($jumlah_data / $batas);

                    $data_arsip = mysqli_query($koneksi, "SELECT * FROM arsip ORDER BY id ASC limit $halaman_awal, $batas");

                    $nomor = $halaman_awal + 1;
                    while ($r = mysqli_fetch_array($data_arsip)) {
                        extract($r);

                    ?>

                        <td class=''><?= $nomor++ ?></td>
                        <td class=''><?= $judul ?></td>
                        <td class=''><?= $nama ?></td>
                        <td class=''><?= $kategori ?></td>
                        <td class=''><?= $terbit ?></td>
                        <td class=''><?= date('d F Y', strtotime($tanggal)) ?></td>
                        <td class=''>
                            <?php if ($terbit == 'N') {
                                echo "<a href='?mod=terbit&act=terbitkan&id=" . $id . "' class='btn btn-info'>Terbitkan</a> | ";
                            } elseif ($terbit == 'Y') {
                                echo "<a href='?mod=terbit&act=tidak-terbit&id=" . $id . "' class='btn btn-info'>Batal Terbitkan</a> | ";
                            } ?>
                            <a href="admin-view-arsip.php?id=<?= $id ?>" class="btn btn-primary"><i class="far fa-eye"></i></a> | <a href="?mod=arsip-ipw&act=hapusarsip&id=<?= $id ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                        </td>
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