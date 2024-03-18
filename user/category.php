<?php
include 'navbar_user_page.php';

$data = mysqli_query($koneksi, "SELECT * FROM tb_kategori ORDER BY kategori");

?>

    <div>
        <h1>Kategori-Kategori Produk</h1>
    </div>

    <div class="container">
        <section class="kartus">
            <?php foreach ($data as $produk) :?>
                    <div class="kategori"> 
                        <div class="kategori-jenis">
                            <a href="kategori.php?id_kategori=<?=$produk['id_kategori']?>" class="stretched-link link-produk">
                                <?=$produk['kategori']?>
                            </a>
                        </div>
                    </div>
            <?php endforeach;?>
        </section>
    </div>

    <script src="../assets/bootstrap/js/jquery-3.7.1.min.js"></script>

</body>

</html>