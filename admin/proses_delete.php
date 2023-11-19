<?php
include 'koneksi.php';

$result = mysqli_query($conn, "DELETE from novel where `id_novel` = '$_GET[id_novel]'");


header("Location:index.php");
