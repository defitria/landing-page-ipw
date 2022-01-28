<?php
include "header-admin.php";
?>

<!-- ABOUT SECTION -->
<section style="margin-top: 150px;">
    <div class="container">
        <div class="row" style=" margin-left:250px;">
            <div class="col-lg-6 col-md-6 o">
                <p class=""><a href="?mod=admin-pengunjung" class="galeri" style="font-size: 16px; font-weight:bold; text-decoration: none; color:black;">List Pesan</a></hp>
            </div>
            <div class="col-lg-6 col-md-6 o">
                <p class=""><a href="admin-list-answer.php" class="galeri" style="font-size: 16px; font-weight:bold;  text-decoration: none; color:black;">List Jawaban</a></p>
            </div>
        </div> <br>
        <?php
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        $mod = $_GET['mod'];

        switch ($mod) {
            case 'admin-pengunjung':
                include("admin-pengunjung.php");
                break;

            default:
                include("admin-pengunjung.php");
                break;
        }
        ?>
    </div>
</section>