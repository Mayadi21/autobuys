<?php include '../koneksi.php'; ?>
<?php include 'navbar_user_page.php'; ?>
<?php include '../fungsi.php'; ?>

<?php
$id = $_SESSION["id_user"];

$data = mysqli_query($koneksi, "SELECT * FROM users WHERE id_user='$id'");
$data = mysqli_fetch_assoc($data);


$ambil = "SELECT tb_pemenang.*, tb_produk.nama_produk, users.nama FROM tb_pemenang
JOIN users ON tb_pemenang.id_user = users.id_user
JOIN tb_produk ON tb_pemenang.id_produk = tb_produk.id_produk
WHERE tb_pemenang.id_user = $id";

$hasil = mysqli_query($koneksi, $ambil);
$menang = mysqli_num_rows($hasil);

?>


<div class="container">
    <div class="row">
        <div class="col-sm-12 mt-5 mb-5 pt-5">
            <h1>Mari Kita lihat kemenanganmu, <?=$data['nama'];?>.</h1>
            <div class=" mt-5 pt-3">
                <div class="row row-cols-auto">
                </div>
                <hr>
                <div class="container pt-2">
                    <div class="row">

                    <?php

                    if ($menang > 0) 
                    :?>
                        <div class="col mx-5">
                          <div><h3 class="text-start">Kemenangan Lelang Saya</h3></div>
                            <table class="table table-success table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col">No</th>
                                        <th class="text-center" scope="col">Nama Produk</th>
                                        <th class="text-center" scope="col">Harga Lelang</th>
                                        <th class="text-center" scope="col">Pembayaran</th>
                                        

                                    </tr>
                                    </thead>
                                    <?php $ii=1;?>
                                    <?php  foreach ($hasil as $hasil) {
                                    ?>
                                    <tbody>
                                    <tr class="text-center ">
                                        <th scope="row"><?=$ii?></th>
                                        <td ><?=$hasil['nama_produk']?></td>
                                        <td>Rp<?=$hasil['harga_lelang']?></td>
                                        <td>

                                            <?php
                                            
                                            if($hasil['status_bayar'] == ''){ ?>
                                                <form action="bayar.php" method="POST">
                                                    <input type="text" hidden name="id_pemenang" value="<?=$hasil['id_pemenang']?>">
                                                    <input type="text" hidden name="id_produk" value="<?=$hasil['id_produk']?>">
                                                    <button type="submit" name="btnbayar" class="btn btn-primary">Bayar</button>
                                                </form>
                                            <?php
                                            }
                                            else {?>
                                                <a href="" class="btn btn-success">Pembayaran Berhasil</a>
                                            <?php
                                            }
                                            ?>

                                        </td>
                                    </tr>
                                    </tbody>
                                <?php $ii++; } ?>

                            </table>
                            <div class="text-end">
                            <p><i>Dimohon untuk melakukan pembayaran produk secepatnya**</i></p>
                        </div>
                        </div>   
                        
                    <?php endif; ?>

                    <?php
                    if ($menang == 0) {?>

                        <h1>yahhh... Kamu belum memenangkan pelelangan apapun</h1>
                        <h1><i>hehehe...</i> Miskin ya?</h1>


                    <?php }?>


                    </div>
                </div>
                    <hr>

</body>
</html>

