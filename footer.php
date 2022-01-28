<!-- CONTACT SECTION -->
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 text-center">
                <h1 class="heading bold">KONTAK BIDANG IPW BAPPEDA SUMSEL</h1>
            </div>
        </div> <br> <br>
        <div class="row">
            <div class="contact-info-box col-md-4 col-sm-4 col-xs-6 wow fadeInUp" data-wow-delay="0.6s">
                <i class="fas fa-phone-alt"></i>
                <h3>0711-356018</h3>
            </div>
            <div class="contact-info-box col-md-4 col-sm-4 col-xs-6 wow fadeInUp" data-wow-delay="0.8s">
                <i class="far fa-envelope"></i>
                <h3>sarprasbappeda@yahoo.com</h3>
            </div>
            <div class="contact-info-box col-md-4 col-sm-4 col-xs-6 wow fadeInUp" data-wow-delay="1s">
                <i class="fas fa-map-marker-alt"></i>
                <h3>Jl. Kapten A. Rivai No.23, Palembang, 30127</h3>
            </div>
        </div>

        <br> <br>

        <!-- PHP Script -->
        <?php
        if (isset($_POST['kirim'])) {
            include 'koneksi.php';

            $no = null;
            $nama = $_POST["nama"];
            $email = $_POST["email"];
            $pesan = $_POST["pesan"];
            $tanggal = date("Y-m-d H:i:s");

            $koneksi->query("INSERT INTO pengunjung VALUES('" . $no . "' ,'" . $nama . "', '" . $email . "', '" . $pesan . "', '" . $tanggal . "') ");

            $error = "Pesan anda telah terkirim!";
            echo "<span class='alert alert-success' style='font-size:18px; font-weight: bold;'> " . $error . " </span>";
        }
        ?>
        <!-- End of PHP Script -->

        <div class="row">
            <div class="col-md-12 col-sm-12" style="margin-top: -40px;">
                <form action="" method="POST">
                    <div class="col-md-6 col-sm-6">
                        <input name="nama" type="text" class="form-control" id="name" placeholder="Name">
                        <input name="email" type="email" class="form-control" id="email" placeholder="Email">
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <textarea name="pesan" rows="7" class="form-control" id="message" placeholder="Message"></textarea>
                    </div>
                    <div class="col-md-offset-4 col-md-4 col-sm-offset-4 col-sm-6">
                        <input name="kirim" type="submit" class="form-control SA" id="submit" value="KIRIM">
                    </div>
                </form>
            </div>
        </div>
        <br>
        <hr style="border: 1px solid #14213d;">
        <h3 style="margin-top: 40px;">Tanya Jawab</h3>
        <br>
        <?php
        $sql = mysqli_query($koneksi, "SELECT * FROM pengunjung JOIN jawabanadmin WHERE pengunjung.email=jawabanadmin.email_pengunjung ORDER BY pengunjung.tanggal DESC LIMIT 5");
        while ($r = mysqli_fetch_array($sql)) {

            extract($r);

        ?>
            <table class="table" style="border: 1px solid #bdbcb9;">
                <tr>
                    <td scope="col-md-6 col-sm-6 wow fadeInUp">
                        Dikirimkan oleh <small class="bold"><?php echo $nama ?></small>
                        pada tanggal: <small class="bold"><?php echo date('d F Y H:i', strtotime($tanggal)) ?></small>
                    </td>
                </tr>
                <tr>
                    <td scope="col" class="bold">
                        <?= $pesan ?>
                    </td>
                </tr>
                <tr>
                    <td scope="col-md-6 col-sm-6 wow fadeInUp">
                        Dijawab oleh <small class="bold">admin</small>
                        pada tanggal: <small class="bold"><?php echo date('d F Y H:i', strtotime($tanggal_jawaban)) ?></small>
                    </td>
                </tr>
                <tr>
                    <td scope="col" class="bold">
                        <?= $pesan_jawaban ?>
                    </td>
                </tr>
            </table>
        <?php } ?>
        <br>
        <hr style="border: 1px solid #14213d;">
    </div>
</section>

<!-- footer section -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <ul class="social-icon">
                    <li><a href="https://www.instagram.com/ipw_bappedasumsel/" class="fab fa-instagram wow bounceIn" data-wow-delay="0.9s"></a></li>
                    <li><a href="https://www.youtube.com/channel/UCP4jLTqanCTT26V9acRtScg" class="fab fa-youtube wow bounceIn" data-wow-delay="0.9s"></a></li>
                    <li><a href="#" class="fas fa-globe wow bounceIn" data-wow-delay="0.9s"></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<!-- copyright section -->
<section id="copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-9">
                <p>Copyright © 2021 BIDANG IPW BAPPEDA PROVINSI SUMATERA SELATAN</p>
            </div>
        </div>
    </div>
</section>

<!-- JAVASCRIPT JS FILES -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/isotope.js"></script>
<script src="js/imagesloaded.min.js"></script>
<script src="js/nivo-lightbox.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/custom.js"></script>

</body>

</html>