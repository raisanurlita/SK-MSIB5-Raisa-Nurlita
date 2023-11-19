<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style1.css">

    <title>reinznovel</title>
</head>

<body>
    <?php
    include "koneksi.php";
    $query = mysqli_query($conn, "SELECT * FROM novel as n join penerbit as p on n.id_penerbit = p.id_penerbit join genre as g on n.id_genre = g.id_genre ORDER BY id_novel ASC");
    ?>

    <!-- navbar -->
    <nav class="fixed-top">
        <div class="">
            <img src="./images/logo5.png" alt="Logo" width="50" height="50" class="d-inline-block">reinznovel
        </div>
        <ul>
            <li>
                <a href="home.php">Home</a>
            </li>
            <li>
                <a href="#katalog">katalog</a>
            </li>
            <li>
                <a href="#about">About Us</a>
            </li>
        </ul>
    </nav>

    <!-- banner -->
    <div class="container-fluid banner">
        <div class="container text-center">
            <h1 class="display-7" style="margin-left: 500px; font-weight:bold">Welcome To reinznovel !</h1>
            <a href="#katalog">
                <button type="button" class="btn btn-danger btn-lg" style="margin-top: 15px; margin-left: 230px">
                    Cek Katalog
                </button>
            </a>
        </div>
    </div>

    <!-- carousel -->
    <div class="container">
        <div id="carouselExampleAutoplaying" class="carousel slide mt-5" data-bs-ride="carousel">
            <div class="carousel-inner ">
                <div class="carousel-item active">
                    <img src="./images/cr1.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./images/cr2.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./images/cr4.png" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>


    <!-- katalog -->
    <div class="container mt-5" id="katalog">
        <div class="katalog">
            <h2 class="text-center" style="margin-top: 5px; margin-bottom: 20px; color:#CA1B6F"><b>KATALOG</b></h2>
            <div class="row mt-2">
                <?php
                while ($data = mysqli_fetch_array($query)) {
                ?>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-6 mt-2">
                        <div class="card">
                            <img src="../admin/<?php echo $data['gambar'] ?>" class="card-img-top" alt="">
                            <div class="card-body">
                                <p class="card-title"><b><?php echo $data['judul_novel'] ?></b></p>
                                <p class="card-text" style="color: #CA1B6F; font-weight:bold">Rp. <?php echo $data['harga'] ?></p>

                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

        <!-- About Us -->
        <section class="about">
            <div class="container-about" id="about">
                <img src="./images/about5.png" alt="Logo" class=" d-inline-block">
                <div class="about-text">
                    <h4 style="color: #604269">About Us</h4>
                    <p style="text-align: justify; color: #7D508B">
                        Selamat datang di reinznovel, tempat di mana dunia imaginasi dan cerita-cerita menakjubkan berkumpul. Kami adalah lebih dari sekadar toko novel; kami adalah gerbang ke dunia fantastis di mana setiap halaman membawa pengalaman yang mendalam dan petualangan tak terlupakan.<br><br>

                </div>
            </div>
        </section>

        <!-- footer -->
        <footer class="bg-light p-5 mt-5">
            <div class="container">
                <div class="row">

                    <div class="col-md-6">
                        <a href="" class="text-decoration-none">
                            <img src="./images/logo5.png" style="width: 30px;">
                        </a>
                        <span>Copyright @2023 | Created and Developed by <b>Raisa Nurlita</b></a></span>
                    </div>

                    <div class="col-md-6 text-end">
                        <a href="https://github.com/raisanurlita/SK-MSIB5-Raisa-Nurlita" class="text-decoration-none">
                            <img src="./images/github.png" class="ms-2" style="width: 20px;">
                        </a>
                        <a href="https://instagram.com/rreiinzz?igshid=YzAwZjE1ZTI0Zg==" class="text-decoration-none">
                            <img src="./images/instagram.png" class="ms-2" style="width: 20px;">
                        </a>
                    </div>

        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>