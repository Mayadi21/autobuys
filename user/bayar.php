<?php

include 'navbar_user_page.php';
include '../koneksi.php';

$id_pemenang = $_POST['id_pemenang'];
$id_produk = $_POST['id_produk'];

$result =   mysqli_query($koneksi, "SELECT * FROM tb_produk
            WHERE id_produk = $id_produk");
$produk =   mysqli_fetch_assoc($result);



?>

<div class="container mt-5">
    <div class="row deskripsi mb-4"  style="border: solid rgb(107, 215, 64); border-radius:10px;">
        <div class="row mb-3">
            <h1>Detail Produk</h1>
        </div>
        <div class="col my-3">
            <div class="card mx-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="product">
                                <img class="product-img" src="../assets/img/<?=$produk['gambar_produk']?>"
                                alt="gambar">
                            </div>
                        </div>
                    </div>

                </div>
    
            </div>
                
        </div>


        <div class="col  my-auto">
            <div class=" mx-3">
                        <div class="row">
                            <div class="col">
                                <div class="d-flex align-items-center">
                                    <span class="text-center" style="font-size: 24px; font-weight:bold">Produk : <?=$produk['nama_produk']?></span>
                                </div>
                                <div class="border-bottom mb-3"></div>
                                <div class="d-flex align-items-center">
                                    <span style="font-size: 24px; font-weight:bold">Harga Lelang : Rp<?=$produk['harga_lelang']?></span>
                                </div>
                                <div class="border-bottom mb-3"></div>
                                <div class="d-flex align-items-center">
                                    <span style="font-size: 24px; font-weight:bold">Pelelang : <?=$_SESSION['nama']?></span>
                                </div>
                                <div class="border-bottom mb-3"></div>
                            </div>
                        </div>        
            </div>

        </div>

    </div>



    <div class="row  justify-content-evenly mt-1">
        <div class="col-md-6 mb-4">
                        <div class="row">
                            <div class="col">
                                <div class="product-bayar">
                                    <div class="d-flex align-items-center">
                                        <span >Metode Pembayaran : Rekening BRI</span>
                                    </div>
                                    <div class="border-bottom mb-3"></div>
                                    <div class="d-flex align-items-center">
                                        <span>No. Rekening Tujuan : 402762759301759</span>
                                    </div>
                                    <div class="border-bottom mb-3"></div>
                                    <div class="d-flex align-items-center">
                                        <span>Rekening Tujuan : AutoBuys Corporation</span>
                                    </div>
                                    <div class="border-bottom mb-3"></div> 
                                    <form method="post" action="completed.php">
                                        <input type="text" name="id_menang" hidden value="<?=$id_pemenang?>">
                                        <div class="d-grid gap-2">
                                            <button name="btn_konfirmasi" type="submit" class="btn btn-success py-3 ikutlelang">Konfirmasi Pembayaran</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                            
            </div>

    </div>



</div>


<?php include '../footer.php';?>

