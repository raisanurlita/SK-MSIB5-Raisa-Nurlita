<?php
include 'koneksi.php';

$judul_novel = $_POST["judul_novel"];
$penulis = $_POST["penulis"];
$penerbit = $_POST["penerbit"];
$genre = $_POST["genre"];
$tahun_terbit = $_POST["tahun_terbit"];
$stok = $_POST["stok"];
$harga = $_POST["harga"];


// Upload Proses
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.<br>";
} else {
    echo "Sorry, there was an error uploading your file.<br>";
}

$result = mysqli_query($conn, "INSERT INTO `novel` ( `judul_novel`, `penulis`, `id_penerbit`, `id_genre`, `tahun_terbit`, `stok`, `harga`, `gambar`) VALUES ( '$judul_novel', '$penulis', '$penerbit', '$genre', '$tahun_terbit', '$stok', '$harga', '$target_file');");


header("Location:index.php");
