<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
</head>

<body>

    <?php
    include 'koneksi.php';

    $novel = mysqli_query($conn, "SELECT * FROM novel where id_novel='$_GET[id_novel]'");


    while ($n = mysqli_fetch_array($novel)) {
        $id_novel = $n["id_novel"];
        $judul_novel = $n["judul_novel"];
        $gambar = $n["gambar"];
        $penulis = $n["penulis"];
        $nama_penerbit = $n["id_penerbit"];
        $nama_genre = $n["id_genre"];
        $tahun_terbit = $n["tahun_terbit"];
        $stok = $n["stok"];
        $harga = $n["harga"];
    }
    ?>
    <div class="container ">
        <div class="m-5 shadow-lg p-3 mb-5 bg-body-tertiary rounded">
            <h1 class="text-center">Edit Data Novel</h1>
            <form action="proses_edit.php?id_novel=<?php echo $id_novel ?>" method="post" enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <div class="form-label">Judul</div>
                    <input type="text" name="judul_novel" data-name=" Judul" class="required form-control" value="<?php echo $judul_novel ?>">
                </div>
                <div class="form-group mb-3">
                    <div class="form-label">Gambar</div>
                    <img src="../admin/<?php echo $gambar ?>" width="100">
                    <input type="file" name="fileToUpload" id="fileToUpload" data-name="Gambar" class="required form-control">
                </div>
                <div class="form-group mb-3">
                    <div class="form-label">Penulis</div>
                    <input type="text" name="penulis" data-name="Penulis" class="required form-control" value="<?php echo $penulis ?>">
                </div>
                <div class="form-group mb-3">
                    <div class="form-label">Nama Penerbit
                        <select name="nama_penerbit" id="penerbit" data-name="Penerbit" class="required form-control">
                            <?php
                            $query = mysqli_query($conn, "SELECT * FROM penerbit");
                            if (mysqli_num_rows($query) > 0) {
                                while ($data = mysqli_fetch_array($query)) {
                                    $selected = ($data["id_penerbit"] == $nama_penerbit) ? 'selected' : '';
                                    echo "<option value='" . $data["id_penerbit"] . "' $selected>" . $data["nama_penerbit"] . "</option>";
                                }
                            } else {
                                echo "<option value=''>No items available</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <div class="form-label">Genre
                        <select name="nama_genre" id="genre" data-name="genre" class="required form-control">
                            <?php
                            $query = mysqli_query($conn, "SELECT * FROM genre");
                            if (mysqli_num_rows($query) > 0) {
                                while ($data = mysqli_fetch_array($query)) {
                                    $selected = ($data["id_genre"] == $nama_genre) ? 'selected' : '';
                                    echo "<option value='" . $data["id_genre"] . "' $selected>" . $data["nama_genre"] . "</option>";
                                }
                            } else {
                                echo "<option value=''>No items available</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <div class="form-label">Tahun Terbit</div>
                    <input type="text" name="tahun_terbit" data-name="Tahun Terbit" class="required form-control" value="<?php echo $tahun_terbit ?>">
                </div>
                <div class="form-group mb-3">
                    <div class="form-label">Stok</div>
                    <input type="number" name="stok" data-name="Stok" class="required form-control" value="<?php echo $stok ?>">
                </div>
                <div class="form-group mb-3">
                    <div class="form-label">Harga</div>
                    <input type="number" name="harga" data-name="Harga" class="required form-control" value="<?php echo $harga ?>">
                </div>
                <div>
                    <input type="submit" name="Submit" value="Simpan" class="btn btn-primary btn-sm" style="width: 90px;" onclick="return confirm('Simpan Perubahan?')">
                </div>

                </tbody>
                </table>
            </form>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</html>