<?php
session_start();

include '../koneksi.php';
include 'header-admin.php';

if (isset($_POST['simpan'])) {

    $email = $_POST['email'];
    $jawaban = $_POST['jawaban'];

    $koneksi->query("INSERT INTO jawabanadmin VALUES(null,'" . $email . "', '" . $jawaban . "', '" . date('Y-m-d H:i:s') . "') ");

    header("Location: admin-pesan.php");
}
?>
<section>
    <div class="container" style="margin-top:150px;">
        <form action="" method="post">
            <input type="hidden" name="email" value="<?= $_GET["email"] ?>">
            <fieldset>
                <legend class="bold">Jawab Pertanyaan</legend>
                <table>
                    <small>Jawaban ini akan tertuju kepada : <?= $_GET['email'] ?></small>
                    <tr>
                        <td>
                            <label class="form-label" style="margin-top: 20px;">Jawaban</label>
                            <textarea class="form-control" name="jawaban" id="jawaban" cols="30" rows="10" placeholder="Masukkan Jawaban"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="btn btn-primary" style="margin-top: 20px;" type="submit" name="simpan" value="Simpan">
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>
    </div>
</section>