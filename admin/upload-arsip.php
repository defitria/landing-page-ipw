<?php
include '../koneksi.php';
include 'header-admin.php';
//pengecekan tipe harus pdf
$tipe_file = $_FILES['file']['type']; //mendapatkan mime type
if ($tipe_file == "application/pdf") //mengecek apakah file tersebu pdf atau bukan
{
    $judul     = trim($_POST['judul']);
    $nama = trim($_FILES['file']['name']);
    $kategori = 'arsip IPW';
    $terbit = trim($_POST['terbit']);

    $koneksi->query("INSERT INTO arsip (judul, kategori, terbit, tanggal) VALUES ('$judul', '$kategori', '$terbit', '" . date('Y-m-d H:i:s') . "')");

    //dapatkan id terkahir
    $query = mysqli_query($koneksi, "SELECT id FROM arsip ORDER BY id DESC LIMIT 1");
    $data  = mysqli_fetch_array($query);

    //mengganti nama pdf
    // $nama_baru = "file_" . $data['id'] . ".pdf"; //hasil contoh: file_1.pdf
    $file_temp = $_FILES['file']['tmp_name']; //data temp yang di upload
    $folder    = "../file"; //folder tujuan

    move_uploaded_file($file_temp, "$folder/$nama"); //fungsi upload
    //update nama file di database
    $koneksi->query("UPDATE arsip SET nama ='$nama' WHERE id='$data[id]' ");

    header('location:admin-arsip-ipw.php?pesan=Upload-Berhasil');
} else {
    $error = "<div class='alert alert-danger' style='width: 500px; margin-top:200px; margin-left:100px;' role='alert'>Gagal. Bukan File PDF! &nbsp;
    <a href='admin-arsip-ipw.php' class='btn btn-primary btn-sm'> Kembali </a>
    </div>
    ";
    echo $error;
}
