<?php

require 'koneksi.php';

if(isset($_POST['btnreset'])){
  $username = $_POST['username'];
  $email = $_POST['email'];
  $new_password = $_POST['new_password'];
  $new_password_hashed = password_hash($new_password, PASSWORD_DEFAULT);
  $query = "SELECT * FROM users WHERE username = '$username' AND email = '$email'";
  $result = mysqli_query($koneksi, $query);
  $row = mysqli_fetch_assoc($result);

  if (mysqli_num_rows($result) > 0){
    $query = "UPDATE users SET password = '$new_password_hashed' WHERE username = '$username'";
    $result = mysqli_query($koneksi, $query);
    
    $test = mysqli_affected_rows($koneksi);
    
    if ($test > 0) {
        echo "
        <script>
            alert('Password berhasil diubah');
        </script>";
    }
  }

  else{
    echo"
    <script>
    alert('Username atau Email tidak cocok!');
    </script> ";
  }
  


}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AutoBuys</title>

    <link rel="stylesheet" href="assets/my_assets/manual.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/font-awesome/css/font-awesome.min.css">
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>

    <style>
    body{
      background-color: #9CD98E;
    }
  </style>
  
  </head>
  <body>


  <!-- NavBar -->
  <nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #58964D;">
    <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="assets/logo/logo.png" alt="Logo" width="150" height="50" class="d-inline-block align-text-top">
    </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item ">
            <button type="button" class="btn btn-primary mx-3" data-bs-toggle="modal" data-bs-target="#modalLogin">
              Login
            </button>
          </li>
          <li class="nav-item">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalRegister">
              Daftar
            </button>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End NavBar -->


<?php
$query = "SELECT * FROM tb_produk, tb_kategori
WHERE tb_produk.id_kategori = tb_kategori.id_kategori AND 
tb_produk.status_lelang = ''
ORDER BY tb_produk.pengunjung DESC LIMIT 4";

$hasil = mysqli_query($koneksi, $query);
?>
   

            <nav class="navbar bg-success" style="border-bottom: 1px solid black;">
  <div class="container">
    <div class="text-start mt-5 mx-5" style="color: #CDEB2A; height: 350px;">
      <h1 style="font-size: 106px;"><b>Lets Bidding.</b></h1>
      <p class="mt-4 font-weight-bolder" style="font-size: 24px;">    
         <br> Situs lelang aman dan terpercaya. <br> Menyediakan lebih dari 12.000 produk.
      </p>
      <a href=""  data-bs-toggle="modal" data-bs-target="#modalLogin" class="btn btn-lg mt-3" style="background-color: #CDEB2A; border-radius : 20px; color: black; text-decoration: none; font-family: Roboto Slab;">Mari Habiskan Uangmu!</a>
    </div>
  </div>
</nav>

<div class="container">
    <div class="container text-start mr-5 ">
        <div class="row row-cols-auto mr-5 mt-5">
            <div class="col"><h1>Paling sering dikunjungi:</h1></div>
        </div>
    </div>
</div>

<section class="kartus">
    <?php foreach ($hasil as $produk) : ?>
        <article class="kartu my-3">
            <div class="kartu-info-hover">
                <div class="kartu-clock-info">
                    <span class="kartu-time">Product by AutoBuys</span>
                </div>
            </div>
            <div class="kartu-img"></div>
            <a href="" data-bs-toggle="modal" data-bs-target="#modalLogin" class="stretched-link">
                <div class="kartu-img-hover" style="background-image: url(assets/img/<?=$produk['gambar_produk']?>);">
                </div>
            </a>
            <div class="kartu-info">
                <span class="kartu-category"><?=$produk['kategori']?></span>
                <a style="text-decoration: none; color:black" href="" data-bs-toggle="modal" data-bs-target="#modalLogin" class="stretched-link">
                <h3 class="kartu-title"><?=$produk['nama_produk']?></h3></a>
                <h3 class="kartu-title harga-produk"><span style="color: #1a597d;">Rp <?=$produk['harga_lelang']?></span></h3>
                <div class="kartu-status">
                <?=$produk['status_lelang']?>
                </div>
            </div>
        </article>
    <?php endforeach; ?>

</section>




  <!-- Footer -->

  <div class="container">
  <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 border-top">
  <div class="col-md-5 offset-md-1 mb-3">
        <form action="pesan.php"  method="POST">
          <h5>Kritik dan Saran</h5>

          <div class=" flex-column flex-sm-row w-100 gap-2">
            <input type="date" name="tglpesan" hidden value="<?php  echo date("Y-m-d"); ?>" class="form-control">
            <input id="username" type="text" name="username" class="form-control my-3" placeholder="username anda" required>
            <input id="pesan" type="text" name="pesan" class="form-control my-3" placeholder="Ketik pesan dan kririk anda">
            <button class="btn btn-primary" type="submit">Kirim</button>
          </div>
        </form>
      </div>
    <div class="col mb-3">

    </div>

    <div class="col mb-3" >
      <h5>Hubungi Kami:</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 active" style="text-decoration: none; color: black;"><i class="fa fa-instagram "></i> Instagram</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 active" style="text-decoration: none; color: black;"><i class="fa fa-whatsapp"></i> WhatsApp</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 active" style="text-decoration: none; color: black;"><i class="fa fa-facebook "></i> FaceBook</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 active" style="text-decoration: none; color: black;"><i class="fa fa-twitter "></i> Twitter</a></li>
      </ul>
    </div>


  </footer>
</div>



<footer class="text-center text-lg-start text-white" style="background-color: #58964D;">
  <!-- Copyright -->
  <div class="text-center p-3">
    © 2023 Copyright : AutoBuys 

</footer>
  <!-- End Footer -->




  <!-- Modal Register -->
<div class="modal fade" id="modalRegister" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Daftarkan Akun anda</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="register.php" method="POST">
      <div class="modal-body">
        <div class="form-group mb-3">
          <label for="username" class=" col-form-label">Username</label>
          <div class="col">
            <input type="text" class="form-control" id="username" name="username" required>
          </div>
        </div>
        <div class="form-group mb-3">
          <label for="nama" class="col-sm-2 col-form-label">Nama</label>
          <div class="col">
            <input type="text" class="form-control" id="nama" name="nama" required>
          </div>
        </div>
        <div class="form-group mb-3">
          <label for="email" class="col-sm-2 col-form-label">Email</label>
          <div class="col">
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
        </div>
        <div class="form-group mb-3">
          <label for="password" class="col-sm-2 col-form-label">Password</label>
          <div class="col">
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary" >Daftar</button>
        
      </div>
      </form>
      <div class="text-center">
        Sudah Punya Akun? 
        <a href='' data-bs-toggle="modal" data-bs-target="#modalLogin" style="text-decoration: none;">
              Login
        </a>
      </div>
    </div>
  </div>
</div>
<!--End Modal Daftar -->

<!-- Modal Login -->
<div class="modal fade" id="modalLogin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1  class="modal-title fs-5" id="judulModal">Masuk</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="login.php" method="POST">
      <div class="modal-body">
        <div class="form-group mb-3">
          <label for="username" class="col-sm-2 col-form-label">Username</label>
          <div class="col">
            <input type="text" class="form-control" id="username" name="username" required>
          </div>
        </div>
        <div class="form-group mb-3">
          <label for="password" class="col-sm-2 col-form-label">Password</label>
          <div class="col">
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
        </div>
      </div> 
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
        <button name="btnlogin" class="btn btn-primary">Masuk</button>
      </div>
      </form>
      <div class="text-center">
        Belum Punya Akun 
        <a href='' data-bs-toggle="modal" data-bs-target="#modalRegister" style="text-decoration: none;">
              Daftar
        </a>
      </div>
      <div class="text-center">
        Lupa Password? 
        <a href='' data-bs-toggle="modal" data-bs-target="#modalResetPass" style="text-decoration: none;">
              Reset Password
        </a>
      </div>
    </div>
  </div>
</div>
  <!-- End Modal Login -->  

  <!-- Modal Reset Password -->
<div class="modal fade" id="modalResetPass" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1  class="modal-title fs-5" id="judulModal">Lupa  Password</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="POST">
      <div class="modal-body">
        <div class="form-group mb-3">
          <label for="username" class="= col-form-label">Username Anda</label>
          <div class="col">
            <input type="text" class="form-control" id="username" name="username" required>
          </div>
        </div>
        <div class="form-group mb-3">
          <label for="email" class=" col-form-label">Email Anda</label>
          <div class="col">
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
        </div>
        <div class="form-group mb-3">
          <label for="new_password" class="= col-form-label">Reset Password</label>
          <div class="col">
            <input type="text" class="form-control" id="password" name="new_password" required>
          </div>
        </div>
      </div> 
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button name="btnreset" type="submit" class="btn btn-primary">Reset</button>
      </div>
      </form>
    </div>
  </div>
</div>
  <!-- End Modal Reset Password -->


  </body>
</html>