<?php 
include 'navbar_admin.php';
?>

<style>
    .card:hover {
        background-color: #f0f0f0;
        transform: scale(1.05); 
        box-shadow: 0 0 20px #99db2e; 
        border: solid rgb(183, 176, 38) 2px;
    }
    .card{
        border-radius: 20px;
    }
</style>

<!--HALAMAN ADMIN-->

<div class="col-12">
    <h1 class="text-center p-3" style="background-color: #99db2e;">Dashboard Admin</h1>
    <div class="container text-center">
        <div class="row mt-5 mb-5 justify-content-center">
                
                <div class="card my-4 mx-3" style="width: 18rem;">
                    <img src="../assets/logo/logo_lelang.png" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Daftar Lelang</h5>
                        <a href="daftar_lelang.php" class="stretched-link">
                            <div class="d-grid gap-2"><button class="btn btn-primary">Lihat</button></div>
                        </a>
                    </div>
                </div>

                <div class="card my-4 mx-3" style="width: 18rem;">
                    <img src="../assets/logo/logopemenang.png" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Pemenang Lelang</h5>
                        <a href="pemenang.php" class="stretched-link">
                            <div class="d-grid gap-2"><button class="btn btn-primary">Lihat</button></div>
                        </a>
                    </div>
                </div>

                <div class="card my-4 mx-3" style="width: 18rem;">
                    <img src="../assets/logo/produk.png" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Produk</h5>
                        <a href="produk.php" class="stretched-link">
                            <div class="d-grid gap-2"><button class="btn btn-primary">Lihat</button></div>
                        </a>
                    </div>
                </div>

                <div class="card my-4 mx-3" style="width: 18rem;">
                    <img src="../assets/logo/pengguna.png" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Pengguna</h5>
                        <a href="lihat_user.php" class="stretched-link">
                            <div class="d-grid gap-2"><button class="btn btn-primary">Lihat</button></div>
                        </a>
                    </div>
                </div>

                <div class="card my-4 mx-3" style="width: 18rem;">
                    <img src="../assets/logo/kategorii.png" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Kategori Produk</h5>
                        <a href="kategori.php" class="stretched-link">
                            <div class="d-grid gap-2"><button class="btn btn-primary">Lihat</button></div>
                        </a>
                    </div>
                </div>

                <div class="card my-4 mx-3" style="width: 18rem;">
                    <img src="../assets/logo/comment.webp" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Komentar</h5>
                        <a href="comment.php" class="stretched-link">
                            <div class="d-grid gap-2"><button class="btn btn-primary">Lihat</button></div>
                        </a>
                    </div>
                </div>

                <div class="card my-4 mx-3" style="width: 18rem;">
                    <img src="../assets/logo/logoreport.png" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Kotak Pesan dan Saran</h5>
                        <a href="lihat_pesan.php" class="stretched-link">
                            <div class="d-grid gap-2"><button class="btn btn-primary">Lihat</button></div>
                        </a>
                    </div>
                </div>


            </div>
        </div>
</div>


