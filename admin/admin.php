<?php

session_start();

include 'header-admin.php';
include '../koneksi.php';

?>

<?php

if (isset($_POST['tambah'])) {
    include '../koneksi.php';

    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    $sql = mysqli_query($koneksi, "SELECT * FROM admin WHERE email='" . $email . "' ");
    $hasil = mysqli_num_rows($sql);

    if ($hasil > 0) {
        $error = "Email sudah ada.";
    } else {
        $email = $_POST["email"];
        $name = $_POST["name"];
        $password = $_POST["password"];


        $koneksi->query("INSERT INTO admin VALUES(null,'" . $email . "', '" . $name . "', '" . $password . "') ");

        $error = "Berhasil menambahkan data.";
    }
}

if (isset($_POST['edit'])) {

    $sql = mysqli_query($koneksi, "UPDATE admin SET email='" . $_POST['email'] . "', name='" . $_POST['name'] . "', password='" . $_POST['password'] . "' WHERE id='" . $_POST['id'] . "'");

    $error = "Data berhasil diperbaharui.";
}


if ($_GET['act'] && $_GET['act'] == 'edit') {
    include '../koneksi.php';
    $id = (int)$_GET['id'];

    $b = $koneksi->query("SELECT * FROM admin WHERE id = " . $id . " ");
    $b = $b->fetch_assoc();
} elseif ($_GET['act'] && $_GET['act'] == 'hapus') {
    $id = (int)$_GET['id'];

    $c = $koneksi->query("DELETE FROM admin WHERE id = " . $_GET["id"]);
}

?>

<!-- USER SECTION -->
<section>
    <div class="container" style="margin-top:150px;">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <!-- TAMBAH USER ADMIN -->
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?= $b["id"] ?>">
                    <fieldset>
                        <legend class="bold">Tambah Admin</legend>
                        <table>
                            <tr>
                                <td>
                                    <label class="form-label">Email</label>
                                    <input class="form-control" style="width: 500px;" type="text" name="email" value="<?= $b['email'] ?>" placeholder="Masukkan Email">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="form-label" style="margin-top: 20px;">Nama</label>
                                    <input class="form-control" type="text" name="name" value="<?= $b["name"] ?>" placeholder="Masukkan Nama">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="form-label" style="margin-top: 20px;">Password</label>
                                    <input class="form-control" type="password" name="password" value="<?= $b["password"] ?>" placeholder="Masukkan Password">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input class="btn btn-primary" style="margin-top: 20px;" type="submit" name="<?= ($b["id"] ? "edit" : "tambah") ?>" value="<?= ($b["id"] ? "Simpan" : "Tambah") ?>">
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </form>

                <!-- LIST USER ADMIN -->

                <h4 style="margin-top: 50px;">List Admin</h4>
                <table class="table">
                    <tr>
                        <th class="">No</th>
                        <th class="">Nama</th>
                        <th class="">Email</th>
                        <th class="">Password</th>
                        <th class="">Aksi</th>
                    </tr>

                    <?php
                    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                    $batas = 10;
                    $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                    $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                    $previous = $halaman - 1;
                    $next = $halaman + 1;

                    $data = mysqli_query($koneksi, "SELECT * FROM admin");
                    $jumlah_data = mysqli_num_rows($data);
                    $total_halaman = ceil($jumlah_data / $batas);

                    $data_admin = mysqli_query($koneksi, "SELECT * FROM admin ORDER BY id ASC limit $halaman_awal, $batas");

                    $nomor = $halaman_awal + 1;
                    while ($r = mysqli_fetch_array($data_admin)) {
                        extract($r);
                    ?>
                        <tr>
                            <td class=''><?= $nomor++ ?> </td>
                            <td class=''><?= $name ?></td>
                            <td class=''><?= $email ?></td>
                            <td class=''><?= $password ?></td>
                            <td class=''>
                                <a href="?mod=useradmin&act=edit&id=<?= $id ?>" class=' btn btn-warning'><i class="fas fa-edit"></i></a> | <a href='?mod=useradmin&act=hapus&id=<?= $id ?>' class='btn btn-danger'><i class="fas fa-trash-alt"></i></a>
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
<br>