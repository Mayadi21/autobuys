<?php

if(isset($_GET['btn_cari'])){
    $data = $_GET['query_src'];
    if(empty($data)){
      echo '<script>alert("Anda belum mengisi pencarian.");</script>';
      echo '<script>window.history.back();</script>';
    exit;
    } else {
    $hasil = mysqli_query($koneksi,"SELECT tb_produk.* , tb_kategori.kategori FROM tb_produk INNER JOIN tb_kategori ON tb_produk.id_kategori = tb_kategori.id_kategori   WHERE nama_produk LIKE '%$data%' OR status_lelang LIKE '%$data%' OR kategori LIKE '%$data%'");
  }

?>

            <section style="   padding:20px ; margin-left: 30px; width: 90%">
                <h2 >Hasil Pencarian untuk '<?=$data?>' : <?php echo mysqli_num_rows($hasil); ?> hasil</h2>
            </section>

            <section class="kartus">
                <?php foreach ($hasil as $produk) : ?>
                    <article class="kartu my-5">
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
                            <h3 class="kartu-title"><?=$produk['nama_produk']?></h3></a>
                            <h3 class="kartu-title harga-produk"><span style="color: #1a597d;">Rp <?=$produk['harga_lelang']?></span></h3>
                            <div class="kartu-status">
                            <?=$produk['status_lelang']?>
                            </div>
                        </div>
                        </div>                    
                    </article>
                <?php endforeach; ?>
 
            </section>

<?php } ?>



<?php
    if(isset($_GET['btn_kategori'])){
        $data = $_GET['jeniskategori'];
        $hasil = mysqli_query($koneksi,"SELECT tb_produk.* , tb_kategori.kategori FROM tb_produk INNER JOIN tb_kategori ON tb_produk.id_kategori = tb_kategori.id_kategori   WHERE kategori LIKE '%$data' AND status_lelang = ''");
    ?>

            <section style="   padding:20px ; margin-left: 30px; width: 90%">
                <h2 >Hasil Pencarian untuk '<?=$data?>' : <?php echo mysqli_num_rows($hasil); ?> hasil</h2>
            </section>

            <section class="kartus">
                <?php foreach ($hasil as $pencarian) : ?>
                    <article class="kartu my-5">
                        <div class="kartu-info-hover">
                            <div class="kartu-clock-info">
                                <span class="kartu-time">Product By AutoBuys</span>
                            </div>
                        </div>
                        <div class="kartu-img"></div>
                        <a href="product.php?id_produk=<?=$pencarian['id_produk']?>" class="stretched-link">
                            <div class="kartu-img-hover" style="background-image: url(../assets/img/<?=$pencarian['gambar_produk']?>);">
                            </div>
                        </a>
                        <div class="kartu-info">
                            <span class="kartu-category"><?=$pencarian['kategori']?></span>
                            <a style="text-decoration: none; color:black" href="product.php?id_produk=<?=$pencarian['id_produk']?>" class="stretched-link">
                            <h3 class="kartu-title"><?=$pencarian['nama_produk']?></h3></a>
                            <h3 class="kartu-title">Rp<?=$pencarian['harga_lelang']?></h3>
                            <div class="kartu-status">
                            <?=$pencarian['status_lelang']?>
                        </div>
                        </div>                    
                    </article>
                <?php endforeach; ?>
 
            </section>

<?php } ?>


