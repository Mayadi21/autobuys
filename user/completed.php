<?php
include 'navbar_user_page.php';

if(isset($_POST['btn_konfirmasi'])){
    $sql = "UPDATE tb_pemenang SET status_bayar = 'DIBAYAR' WHERE id_pemenang = '$_POST[id_menang]'" ;

    if($koneksi -> query($sql) === TRUE){
        header("Location: completed.php");
    }
}
?>

<div class="container mt-5">
    <div class="row "  style="border: solid rgb(107, 215, 64); border-radius:10px;">

        <div class="col  my-auto text-center">
                <div class="">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                        <span>Pembayaran Berhasil</span>
                                    <div class="border-bottom mb-3"></div>
                                        <span>Anda bisa mengunduh resi pembayaran 
                                            <a style="color: green;" href="../assets/my_assets/resi.pdf" download><u><b><i>di sini</i></b></u></a>
                                        </span>
                                    <div class="border-bottom mb-3"></div>

                                        <span> Terimakasih sudah menggunakan jasa kami</span>
                                    </div>
                                    <div class="border-bottom mb-3"></div>
                                        <span><a href="index.php" class="btn btn-primary" >Kembali ke Beranda</a></span>
                                    <div class="border-bottom mb-3"></div>
                                </div>
                            </div>

                    </div>
        </div>







        <div class="col my-0 pb-5">
            <div class=" mx-5" style="background-color: #9CD98E;">
                <div class="">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <img class="product-img" src="../assets/logo/completed.png"
                                alt="gambar">
                            </div>
                        </div>
                    </div>

                </div>
    
            </div>
                
        </div>




    </div>



</div>
