<?php
include 'header-less.php';
?>

<!-- ABOUT SECTION -->
<section style="margin-top: 150px; text-align:center;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 o">
                <p class=""><a href="?mod=galeri-foto" class="galeri" style="font-size: 16px; font-weight:bold; text-decoration: none; color:black;">GALERI FOTO</a></hp>
            </div>
            <div class="col-lg-6 col-md-6 o">
                <p class=""><a href="?mod=galeri-video" class="galeri" style="font-size: 16px; font-weight:bold;  text-decoration: none; color:black;">GALERI VIDEO</a></p>
            </div>
        </div> <br>
        <?php
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        $mod = $_GET['mod'];

        switch ($mod) {
            case 'galeri-foto':
                include("galeri-foto.php");
                break;

            case 'galeri-video':
                include("galeri-video.php");
                break;

            default:
                include("galeri-foto.php");
                break;
        }
        ?>
    </div>
</section>

<?php
include 'footer.php';
?>