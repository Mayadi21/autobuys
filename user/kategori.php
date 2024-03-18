<?php
require '../koneksi.php';
include 'navbar_user_page.php';




$id = $_GET['id_kategori'];

// Mengambil produk berdasarkan kategori
$hasil = mysqli_query($koneksi, "SELECT * FROM tb_produk
JOIN tb_kategori ON tb_produk.id_kategori = tb_kategori.id_kategori
WHERE tb_kategori.id_kategori = $id ORDER BY status_lelang");

$kategori = mysqli_query($koneksi, "SELECT kategori FROM tb_kategori WHERE id_kategori = $id");
$kategori = mysqli_fetch_assoc($kategori);

$data = mysqli_query($koneksi, "SELECT * FROM tb_kategori ORDER BY kategori");

?>
        <section style="   padding:20px ; margin-left: 30px; width: 90%">
            <h2 ><?= mysqli_num_rows($hasil)?> Produk berkategori <?=$kategori['kategori']?></h2>
        </section>

<section class="kartus">
                <?php foreach ($hasil as $produk) : ?>
                    <article class="kartu my-3">
                        <div class="kartu-info-hover">
                            <div class="kartu-clock-info">
                                <span class="kartu-time">Product By AutoBuys</span>
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
                                <h3 class="kartu-title"><?=$produk['nama_produk']?></h3>
                            </a>
                            <h3 class="kartu-title harga-produk"><span style="color: #1a597d;">Rp <?=$produk['harga_lelang']?></span></h3>
                            <div class="kartu-status">
                            <?=$produk['status_lelang']?>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
 
            </section>

            <div class="container">
                <section class="kartus">
                    <?php foreach ($data as $category) :?>
                            <div class="kategori">
                                <div class="kategori-jenis">
                                    <a href="kategori.php?id_kategori=<?=$category['id_kategori']?>" class="stretched-link link-produk">
                                        <?=$category['kategori']?>
                                    </a>
                                </div>
                            </div>
                    <?php endforeach;?>
                </section>
            </div>

</html>