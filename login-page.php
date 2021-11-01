<?php
include 'header-less.php';
include 'koneksi.php';

// login
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
if (isset($_POST['login'])) {
    global $koneksi;

    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    $sql = "SELECT * FROM admin WHERE email='" . $email . "' AND password='" . $password . "' ";
    $result = mysqli_query($koneksi, $sql);
    $numrow = mysqli_num_rows($result);

    $r = mysqli_fetch_array($result, MYSQL_ASSOC);

    if ($numrow > 0) {
        $_SESSION['adminid'] = $r['id'];
        $_SESSION['adminemail'] = $r['email'];
        $_SESSION['adminname'] = $r['name'];
        header('Location:admin/admin.php');
    } else {

        $error = "Username dan Password tidak cocok.";
        header('Location:login-page.php?' . $error . '');
    }
}

if (empty($_SESSION['adminemail'])) {

?>

    <div class="section" style="padding: 30px; margin-left:350px; margin-top:100px; margin-bottom:50px;">
        <div class=" container">
            <div class="row justify-content-center">
                <div class="col-md-8 d-flex flex-column justify-content-center sixtyvh">
                    <div class="card">
                        <p class="" style="font-size: 24px; font-weight:bold; text-align:center;">LOGIN</p>
                        <br>

                        <div class="card-body">
                            <form accept-charset="utf-8" method="POST" action="">

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">Alamat Email</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control is-invalid @enderror" name="email" placeholder="Masukkan Email" required autocomplete="email" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control is-invalid @enderror" name="password" placeholder="Masukkan Password" required autocomplete="current-password">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <input type="submit" class="btn btn-primary" name="login" value="LOGIN">
                                        <br>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer section -->
<?php
    include 'footer.php';
}
exit;
?>