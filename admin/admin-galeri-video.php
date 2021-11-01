<?php
session_start();

include '../koneksi.php';
include 'header-admin.php';

?>

<?php
if (isset($_POST['tambahgalerifoto'])) {
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

    $tanggal = $_POST['tanggal'];
    $terbit = $_POST['terbit'];

    $maxsize = 25242880; // 25MB

    $name = $_FILES['video']['name'];
    $target_dir = "../videos/";
    $target_file = $target_dir . $_FILES["video"]["name"];

    // Select file type
    $videoFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("mp4", "avi", "3gp", "mov", "mpeg");

    // Check extension
    if (in_array($videoFileType, $extensions_arr)) {

        // Check file size
        if (($_FILES['file']['size'] >= $maxsize) || ($_FILES["video"]["size"] == 0)) {
            echo "File too large. File must be less than 25MB.";
        } else {
            // Upload
            if (move_uploaded_file($_FILES['video']['tmp_name'], $target_file)) {
                // Insert record
                $koneksi->query("INSERT INTO galerivideo VALUES (null, '" . $name . "', '" . $terbit . "', '" . date('Y-m-d H:i:s') . "')");

                echo "Upload successfully.";
            }
        }
    } else {
        echo "Invalid file extension.";
    }
}

if ($_GET['act'] && $_GET['act'] == 'vterbitkan') {
    $koneksi->query("UPDATE galerivideo SET terbit='Y' WHERE id='" . $_GET['id'] . "'");
    header('Location: admin-galeri-video.php');
} elseif ($_GET['act'] && $_GET['act'] == 'vtidak-terbit') {
    $koneksi->query("UPDATE galerivideo SET terbit='N' WHERE id='" . $_GET['id'] . "'");
    header('Location: admin-galeri-video.php');
}

if ($_GET['act'] && $_GET['act'] == 'hapusgalerifoto') {
    $id = (int)$_GET['id'];
    $c = $koneksi->query("DELETE FROM galerivideo WHERE id = " . $_GET["id"]);
}
?>

<section style="margin-top: 150px;">
    <div class="container">
        <div class="row" style=" margin-left:250px;">
            <div class="col-lg-6 col-md-6 o">
                <p class=""><a href="admin-galeri.php" class="galeri" style="font-size: 16px; font-weight:bold; text-decoration: none; color:black;">GALERI FOTO</a></hp>
            </div>
            <div class="col-lg-6 col-md-6 o">
                <p class=""><a href="admin-galeri-video.php" class="galeri" style="font-size: 16px; font-weight:bold;  text-decoration: none; color:black;">GALERI VIDEO</a></p>
            </div>
        </div> <br>
        <?php
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        $mod = $_GET['mod'];

        switch ($mod) {
            case 'admin-galeri':
                include("admin-galeri-foto.php");
                break;
        }
        ?>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <!-- TAMBAH USER ADMIN -->
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $b["id"] ?>">
                    <fieldset>
                        <legend class="bold">Tambah Video</legend>
                        <table>
                            <tr>
                                <td>
                                    <label name=" gambar" style="margin-top: 20px;">Video</label>
                                    <input class="form-control" type="file" name="video">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class=" form-label" style="margin-top: 20px;">Terbitkan?</label>
                                    <select class="form-select" name="terbit" style="margin-left: 20px;">
                                        <option value="none">-- Pilih Status --</option>
                                        <option value="Y">Yes</option>
                                        <option value="N">No</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input class="btn btn-primary" style="margin-top: 20px;" type="submit" name="tambahgalerifoto" value="Simpan">
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </form>


                <!-- LIST BERITA -->

                <h4 style="margin-top: 50px;">List Video</h4>
                <table class="table">
                    <tr>
                        <th class="">No</th>
                        <th class="">Video</th>
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

                    $data = mysqli_query($koneksi, "SELECT * FROM galerivideo");
                    $jumlah_data = mysqli_num_rows($data);
                    $total_halaman = ceil($jumlah_data / $batas);

                    $data_galerivideo = mysqli_query($koneksi, "SELECT * FROM galerivideo ORDER BY id ASC limit $halaman_awal, $batas");

                    $nomor = $halaman_awal + 1;
                    while ($r = mysqli_fetch_array($data_galerivideo)) {
                        extract($r);

                    ?>

                        <td class=''><?= $nomor++ ?></td>
                        <td class=''><?php
                                        if ($video !== "") {
                                            echo $video;
                                        } elseif ($video == "") {
                                            echo "Tidak ada video.";
                                        }
                                        ?></td>
                        <td class=''><?= $terbit ?></td>
                        <td class=''><?= date('d F Y', strtotime($tanggal)) ?></td>
                        <td class=''>
                            <?php if ($terbit == 'N') {
                                echo "<a href='?mod=videoterbit&act=vterbitkan&id=" . $id . "' class='btn btn-info'>Terbitkan</a> | ";
                            } elseif ($terbit == 'Y') {
                                echo "<a href='?mod=videoterbit&act=vtidak-terbit&id=" . $id . "' class='btn btn-info'>Batal Terbitkan</a> | ";
                            } ?>
                            <a href="admin-view-galeri-video.php?id=<?= $id ?>" class="btn btn-primary"><i class="far fa-eye"></i></a> | <a href="?mod=galeri&act=hapusgalerifoto&id=<?= $id ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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