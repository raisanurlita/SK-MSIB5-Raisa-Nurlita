<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
</head>

<body>
    <?php
    include 'koneksi.php';
    ?>

    <div class="container ">
        <div class="m-5 shadow-lg p-3 mb-5 bg-body-tertiary rounded">
            <h1 class="text-center">Tambah Data Novel</h1>
            <form action="proses_tambah.php" method="post" enctype="multipart/form-data" name="formtambah">
                <div class="form-group mb-3">
                    <div class="form-label">Judul</div>
                    <input type="text" onkeyup="checkform()" name="judul_novel" data-name="Judul" class="required form-control">
                </div>
                <div class="form-group mb-3">
                    <div class="form-label">Gambar</div>
                    <input type="file" name="fileToUpload" id="fileToUpload" onkeyup="checkform()" data-name="Gambar" class="required form-control">
                </div>
                <div class="form-group mb-3">
                    <div class="form-label">penulis

                    </div>
                    <input type="text" onkeyup="checkform()" name="penulis" data-name="Penulis" class="required form-control">
                </div>
                <div class="form-group mb-3">
                    <div class="form-label">Penerbit</div>
                    <select name="penerbit" id="penerbit" data-name="Penerbit" onkeyup="checkform()" class="required form-control">
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM penerbit");
                        if (mysqli_num_rows($query) > 0) {
                            while ($data = mysqli_fetch_array($query)) {
                                echo "<option value='" . $data["id_penerbit"] . "'>" . $data["nama_penerbit"] . "</option>";
                            }
                        } else {
                            echo "<option value=''>No items available</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <div class="form-label">Genre</div>
                    <select name="genre" id="genre" data-name="Penerbit" onkeyup="checkform()" class="required form-control">
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM genre");
                        if (mysqli_num_rows($query) > 0) {
                            while ($data = mysqli_fetch_array($query)) {
                                echo "<option value='" . $data["id_genre"] . "'>" . $data["nama_genre"] . "</option>";
                            }
                        } else {
                            echo "<option value=''>No items available</option>";
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <div class="form-group mb-3">
                        <div class="form-label">Tahun Terbit</div>
                        <input type="number" onkeyup="checkform()" name="tahun_terbit" data-name="Tahun Terbit" class="required form-control">
                    </div>
                    <div class="form-group mb-3">
                        <div class="form-label">Stok</div>
                        <input type="number" onkeyup="checkform()" name="stok" data-name="Stok" class="required form-control">
                    </div>
                    <div class="form-group mb-3">
                        <div class="form-label">Harga</div>
                        <input type="number" onkeyup="checkform()" name="harga" data-name="Harga" class="required form-control">
                    </div>
                    <div>
                        <input id="submit" type="submit" name="Submit" value="Simpan" disabled="disabled" class="btn btn-primary btn-sm" style="width: 90px;">
                    </div>
                    </tbody>
                    </table>
            </form>
        </div>
    </div>
    <script>
        function checkform() {
            var f = document.forms['formtambah'].elements;
            var fieldsMustBeFilled = true;

            for (var i = 0; i < f.length; i++) {
                if (f[i].value.length == 0)
                    fieldsMustBeFilled = false;
            }

            if (fieldsMustBeFilled) {
                document.getElementById("submit").disabled = false;
            } else {
                document.getElementById("submit").disabled = true;
            }
        }
    </script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</html>