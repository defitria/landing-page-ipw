<?php
include 'header-less.php';
?>

<!-- LIST ARSIP -->
<section style="margin-top: 150px; ">
    <div class="container">
        <table class="table">
            <tr>
                <th style="text-align: center;">Pukul</th>
                <th style="text-align: center;">Nama Agenda</th>
                <th style="text-align: center;">Tempat</th>
                <th>Dihadari Oleh</th>
            </tr>

            <?php
            error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
            $id    = mysqli_real_escape_string($koneksi, $_GET['id']);
            $sql = mysqli_query($koneksi, "SELECT * FROM agenda WHERE id='$id' ORDER BY id ASC");
            while ($r = mysqli_fetch_array($sql)) {
                extract($r);

            ?>

                <td class=''><?= date('H:i', strtotime($mulai)) ?> WIB</td>
                <td class=''><?= $nama ?></td>
                <td class=''><?= $tempat ?></td>
                <td class=''><?= $peserta ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</section> <br> <br>

<?php
include 'footer.php';
?>