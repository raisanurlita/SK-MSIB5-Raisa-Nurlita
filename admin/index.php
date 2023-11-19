<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="./fontawesome/css/all.css">

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <h5 style="color: white;">&nbsp; &nbsp; Admin reinznovel</h5>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">DataTables</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container-fluid mt-5 ">
        <?php
        include "koneksi.php";
        $query = mysqli_query($conn, "SELECT * FROM novel as n join penerbit as p on n.id_penerbit = p.id_penerbit join genre as g on n.id_genre = g.id_genre ORDER BY id_novel ASC");
        ?>
        <div class="row">
            <!-- Sidebar -->
            <div class="bg-dark col-auto col-md-2 min-vh-100 fixed-top mt-5">
                <div class="bg-dark p-2">
                    <a class="d-flex text-decoration-none mt-3 align-items-center text-white">&nbsp; &nbsp; &nbsp;
                        <img src="./images/about1.png" alt="Logo" width="30" height="30" class="d-inline-block">
                        <span class="fs-4 d-none d-sm-inline">&nbsp; Raisa Nurlita</span>
                    </a>
                    <ul class="nav nav-pills flex-column mt-4">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link active text-white" style="background-color: #696969;">
                                <i class="fa-solid fa-table"></i><span class="fs-4 d-none d-sm-inline">&nbsp; &nbsp; &nbsp; DataTables</span>
                            </a>
                        </li>
                        <li class="nav-item mt-2">
                            <a href="../users/home.php" class="nav-link active  text-white" style="background-color: #696969;">
                                <i class="fs-5 fa fa-house"></i><span class="fs-4 d-none d-sm-inline">&nbsp; &nbsp; &nbsp;Home</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>

            <!-- Main Content -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <h1 class="mt-5">DataTables</h1>

                <!-- Table -->
                <div class="table-responsive mt-4">
                    <a class="btn btn-info" style="margin-bottom:10px; margin-top:10px" href="tambah.php?"> Tambah Novel </a>
                    <table class="table table-striped table-bordered" id="tokonovel" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Gambar</th>
                                <th>Penulis</th>
                                <th>Penerbit</th>
                                <th>Genre</th>
                                <th style="width: 100px;">Tahun Terbit</th>
                                <th>Stok</th>
                                <th>Harga</th>
                                <th style="width: 150px;">Action</th>
                            </tr>
                        </thead>

                        <tbody> <?php
                                if (mysqli_num_rows($query) > 0) {
                                    $no = 1;
                                    while ($data = mysqli_fetch_array($query)) {
                                ?> <tr>
                                        <td> <?php echo $no ?></td>
                                        <td> <?php echo $data["judul_novel"] ?> </td>
                                        <td> <img src="<?php echo $data["gambar"] ?>" width="100"> </td>
                                        <td> <?php echo $data["penulis"] ?></td>
                                        <td> <?php echo $data["nama_penerbit"] ?></td>
                                        <td> <?php echo $data["nama_genre"] ?></td>
                                        <td> <?php echo $data["tahun_terbit"] ?></td>
                                        <td> <?php echo $data["stok"] ?></td>
                                        <td> <?php echo $data["harga"] ?></td>
                                        <td> <a class="btn btn-warning" href="edit.php?id_novel=<?php echo $data["id_novel"] ?>">&nbsp; Edit &nbsp; </a>
                                            <a class="btn btn-danger" href="proses_delete.php?id_novel=<?php echo $data["id_novel"] ?>" onclick="return confirm('Yakin Data Akan Dihapus?')"> Delete </a>
                                        </td>
                                    </tr>
                                <?php $no++;
                                    } ?>
                            <?php } ?>
                            <!-- Datatables -->
                            <script>
                                $(document).ready(function() {
                                    $('#tokonovel').DataTable();
                                });
                            </script>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>