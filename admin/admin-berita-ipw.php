<?php
session_start();

include 'header-admin.php';
include '../koneksi.php';

?>
<?php
if (isset($_POST['tambahberita'])) {
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $tanggal = $_POST['tanggal'];
    $terbit = $_POST['terbit'];



    if (!empty($_FILES['gambar']['name']) && ($_FILES['gambar']['error'] !== 4)) {

        $gambarfile = $_FILES['gambar']['tmp_name'];
        $gambarfile_name = $_FILES['gambar']['name'];

        $filetype = $_FILES['gambar']['type'];

        $allowtype = array('image/jpeg', 'image/jpg', 'image/png');

        $dest = '../images/' . $gambarfile_name;

        if (!in_array($filetype, $allowtype)) {
            echo "Invalid file type";
            exit;
        }


        move_uploaded_file($gambarfile, $dest);

        if ($gambarfile && $gambarfile_name) {

            $gambarbaru = preg_replace("/[^a-zA-Z0-9]", "_", $_POST['gambar']);

            $dest1 = '../images/' . $path . $gambarbaru . '.jpg';
            $dest2 = $path . $gambarbaru . '.jpg';

            copy($_FILES['gambar']['tmp_name'], $dest1);

            $gambar = $dest2;
        } else {

            $gambar = $_POST['gambarfile_name'];
        }

        $koneksi->query("INSERT INTO berita VALUES (null, '" . $judul . "', '" . $isi . "', '" . $gambarfile_name . "', '" . $terbit . "', '" . date('Y-m-d H:i:s') . "')");
    }
}

if ($_GET['act'] && $_GET['act'] == 'terbitkan') {

    $sql = mysqli_query($koneksi, "UPDATE berita SET terbit='Y' WHERE id='" . $_GET['id'] . "'");
} elseif ($_GET['act'] && $_GET['act'] == 'tidak-terbit') {
    $sql = mysqli_query($koneksi, "UPDATE berita SET terbit='N' WHERE id='" . $_GET['id'] . "'");
}

if ($_GET['act'] && $_GET['act'] == 'hapusberita') {
    $id = (int)$_GET['id'];

    $c = $koneksi->query("DELETE FROM berita WHERE id = " . $_GET["id"]);
}
?>

<!-- SECTION -->
<section>
    <div class="container" style="margin-top:150px;">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <!-- TAMBAH USER ADMIN -->
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $b["id"] ?>">
                    <fieldset>
                        <legend class="bold">Tambah Berita</legend>
                        <table>
                            <tr>
                                <td>
                                    <label class="form-label">Judul</label>
                                    <input class="form-control" style="width: 500px;" type="text" name="judul" value="<?= $b['judul'] ?>" placeholder="Masukkan Judul">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="form-label" style="margin-top: 20px;">Isi Berita</label>
                                    <textarea name="isi" class="form-control" value="<?= $b['isi'] ?>"> <?= $b['isi'] ?> </textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label name=" gambar" style="margin-top: 20px;">Headline gambar</label>
                                    <?php
                                    if ($b['gambar']) {

                                        echo "
                                            <br>
 						                    <img src='../images/" . $b["gambar"] . "' width='200'><br><br>
 						                    <a href='?mod=uploadBerita&act=editberita&hapusgambar=yes&id=" . $id . "' class='hapus btn btn-danger btn-sm'>HAPUS</a>
 						                ";
                                    } elseif (($b['gambar']) == ' ') {
                                        echo "
 						                <input class='form-control' type='file' name='gambar'>
 						                ";
                                    } else {
                                        echo "
 						                <input class='form-control' type='file' name='gambar'>
 						                ";
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class=" form-label" style="margin-top: 20px;">Terbitkan?</label>
                                    <select class="form-select" name="terbit" style="margin-left: 20px;">
                                        <option value="none">-- Pilih Status --</option>
                                        <option value="Y" <?= (($b['terbit'] == Y) ? 'selected' : '') ?>>Yes</option>
                                        <option value="N" <?= (($b['terbit'] == N) ? 'selected' : '') ?>>No</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input class="btn btn-primary" style="margin-top: 20px;" type="submit" name="<?= ($b["id"] ? "editberita" : "tambahberita") ?>" value="<?= ($b["id"] ? "Simpan" : "Tambah") ?>">
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </form>

                <!-- LIST BERITA -->

                <h4 style="margin-top: 50px;">List Berita</h4>
                <table class="table">
                    <tr>
                        <th class="">No</th>
                        <th class="">Judul</th>
                        <th class="">Headline Gambar</th>
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

                    $data = mysqli_query($koneksi, "SELECT * FROM berita");
                    $jumlah_data = mysqli_num_rows($data);
                    $total_halaman = ceil($jumlah_data / $batas);

                    $data_berita = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY id ASC limit $halaman_awal, $batas");

                    $nomor = $halaman_awal + 1;
                    while ($r = mysqli_fetch_array($data_berita)) {
                        extract($r);

                    ?>

                        <td class=''><?= $nomor++ ?></td>
                        <td class=''><?= $judul ?></td>
                        <td class=''><?php
                                        if ($gambar !== "") {
                                            echo "<img src='../images/" . $gambar . "' width='100px'>";
                                        } elseif ($gambar == "") {
                                            echo "Tidak ada headline gambar.";
                                        }
                                        ?></td>
                        <td class=''><?= $terbit ?></td>
                        <td class=''><?= date('d F Y', strtotime($tanggal)) ?></td>
                        <td class=''>
                            <?php if ($terbit == 'N') {
                                echo "<a href='?mod=terbit&act=terbitkan&id=" . $id . "' class='btn btn-info'>Terbitkan</a> | ";
                            } elseif ($terbit == 'Y') {
                                echo "<a href='?mod=terbit&act=tidak-terbit&id=" . $id . "' class='btn btn-info'>Batal Terbitkan</a> | ";
                            } ?>
                            <a href="admin-view-berita.php?id=<?= $id ?>" class="btn btn-primary"><i class="far fa-eye"></i></a> | <a href="?mod=berita&act=hapusberita&id=<?= $id ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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