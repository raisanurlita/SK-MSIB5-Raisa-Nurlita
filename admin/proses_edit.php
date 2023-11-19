<?php
include 'koneksi.php';

$judul_novel = $_POST["judul_novel"];
$penulis = $_POST["penulis"];
$nama_penerbit = $_POST["nama_penerbit"];
$nama_genre = $_POST["nama_genre"];
$tahun_terbit = $_POST["tahun_terbit"];
$stok = $_POST["stok"];
$harga = $_POST["harga"];


// Upload Proses
if ($_FILES["fileToUpload"]["size"] != 0) {   // Jika browse image di tekan maka $_FILES akan terisi
    $target_dir = "images/"; // path directory image akan di simpan
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); // full path dari image yg akan di simpan
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) { // fungsi ini utk memindahkan file dr tempat asal ke target_file
        echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.<br>";
    } else {
        echo "Sorry, there was an error uploading your file.<br>";
    }
    $result = mysqli_query($conn, "UPDATE `novel` set `judul_novel` = '$judul_novel', `penulis` = '$penulis', `id_penerbit` = '$nama_penerbit', `id_genre` = '$nama_genre', `tahun_terbit` = '$tahun_terbit', `stok` = '$stok', `harga` = '$harga' ,`gambar` = '$target_file' where `id_novel` = '$_GET[id_novel]'");
}
$result = mysqli_query($conn, "UPDATE `novel` set `judul_novel` = '$judul_novel', `penulis` = '$penulis', `id_penerbit` = '$nama_penerbit', `id_genre` = '$nama_genre', `tahun_terbit` = '$tahun_terbit', `stok` = '$stok', `harga` = '$harga' where `id_novel` = '$_GET[id_novel]'");



header("Location:index.php");
