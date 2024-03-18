
<?php
require '../koneksi.php'; 
include '../fungsi.php';
include 'navbar_user_index.php';



$result = mysqli_query($koneksi, "SELECT * FROM tb_produk, tb_kategori
        WHERE tb_produk.id_kategori = tb_kategori.id_kategori AND tb_produk.status_lelang = ''
        ORDER BY RAND()");



            include 'cari.php';
?>

            


            <div class="container">
                <div class="container text-start mr-5 mt-5">
                    <div class="row row-cols-auto mr-5 mt-5">
                        <div class="col"><h1>Rekomendasi Lelang</h1></div>
                    </div>
                </div>
            </div>

            <section class="kartus mb-5">
                <?php foreach ($result as $produk) : ?>
                    <article class="kartu my-3">
                        <div class="kartu-info-hover">
                            <div class="kartu-clock-info">
                                <span class="kartu-time">Product by AutoBuys</span>
                            </div>
                        </div>
                        <div class="kartu-img"></div>
                        <a href="product.php?id_produk=<?=$produk['id_produk']?>" class="stretched-link">
                            <div class="kartu-img-hover" style="background-image: url(../assets/img/<?=$produk['gambar_produk']?>);">
                            </div>
                        </a>
                        <div class="kartu-info">
                            <span  class="kartu-category"><a href="kategori.php?id_kategori=<?=$produk['id_kategori']?>" style="text-decoration: none; color:#3f7ac8"><?=$produk['kategori']?></a></span>
                            <a style="text-decoration: none; color:black" href="product.php?id_produk=<?=$produk['id_produk']?>">
                            <h3 class="kartu-title"><?=$produk['nama_produk']?></h3></a>
                            <h3 class="kartu-title harga-produk"><span style="color: #1a597d;">Rp <?=$produk['harga_lelang']?></span></h3>
                            <div class="kartu-status">
                            <?=$produk['status_lelang']?>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
 
            </section>

    <?php include '../footer.php';?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
</body>
</html>