<?php
error_reporting(0);
include 'db.php';
$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
$a = mysqli_fetch_object($kontak);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bisnis Keluarga</title>


    <link rel="stylesheet" href="styleku.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="font/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse pl-5 " id="navbarText">
            <ul class="navbar-nav mr-auto ">

                <li class="nav-item">
                    <a class="nav-link text-light" href="mulai-beli.php">Mulai Beli</a>
                </li>
               
            </ul>
            <span class="navbar-text">
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav mr-auto">
                        <li>
                            <a class="nav-link text-light" href="prroduk.php">Produk <span class="sr-only">(current)</span></a>
                        </li>

                        <li class="nav-item active">
                            <a class="nav-link text-light" href="about2.php">Pentol Corah<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="index.php">Logout</a>
                        </li>
                    </ul>
            </span>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="foto_logo pl-5">
            <img src="BocilCuy.png" border="0" width="90px" height="90px" />
        </div>

        <!-- Search -->

        <form action="prroduk.php">
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0 pl-5">
                    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Cari Produk" aria-label="Search">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>

        </form>
        </div>


    </nav>


    <!-- Kategori -->

    <div class="container">
        <div class="judul">
            <h3>Kategori</h3>
        </div>
        <div class="box">

            <?php
            $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
            if (mysqli_num_rows($kategori) > 0) {
                while ($k = mysqli_fetch_array($kategori)) {
            ?>
                    <a href="prroduk.php?kat=<?php echo $k['category_id'] ?>">
                        <div class="col-5">
                            <img src="img/kategori-icon.png.png" width="50px" style="margin-bottom: 5px;">
                            <p><?php echo $k['category_name'] ?></p>
                        </div>
                    </a>
                <?php }
            } else { ?>
                <p>Kategori Tidak Ada</p>
            <?php } ?>
        </div>
    </div>
    </div>
    <!-- new product -->
    <div class="section">
        <div class="container">
            <h3>Produk Terbaru</h3>
            <div class="box">
                <?php
                if ($_GET['search'] != '' || $_GET['kat'] != '') {
                    $where = "AND product_name LIKE '%" . $_GET['search'] . "%' AND category_id LIKE '%" . $_GET['kat'] . "%' ";
                }
                $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 ORDER BY product_id DESC LIMIT 6");
                if (mysqli_num_rows($produk) > 0) {
                    while ($p = mysqli_fetch_array($produk)) {
                ?>
                        <a href="detail-produk.php?id=<?php echo $p['product_id'] ?>">
                            <div class="col-4">
                                <img src="produk/<?php echo $p['product_image'] ?>" width="70" height="220">
                                <p class="nama"><?php echo substr($p['product_name'], 0, 30) ?></p>
                                <p class="harga"> Rp. <?php echo number_format($p['product_price']) ?></p>

                            </div>
                        </a>
                    <?php }
                } else { ?>
                    <p> Produk tidak ada </p>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- footer-->
    <div class="footer">
        <div class="container">
            <h4>Alamat</h4>
            <p><?php echo $a->admin_address ?></p>
            <h4>Email</h4>
            <p><?php echo $a->admin_email ?></p>
            <h4>No Tlp</h4>
            <p><?php echo $a->admin_telp ?></p>
            <small>Copyright &copy; 2020- Bisnis Keluarga</small>
        </div>

    </div>
</body>

</html>