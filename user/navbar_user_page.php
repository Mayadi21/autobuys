<?php

require '../koneksi.php';

if($_SESSION['level'] != 1){
  echo"<script>
        alert('Anda Belum Login. Silakan Login terlebih dahulu!');
        document.location.href='../index.php';
        </script> "; 
		exit;


}



$id = $_SESSION['id_user'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoBuys</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">    
    <link rel="stylesheet" href="../assets/my_assets/manual.css">
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="../admin/ckeditor/ckeditor.js"></script>




    <script>
      function confirmLogout() {
          var confirmLogout = confirm("Apakah Anda ingin logout dari akun Anda?");
          if (confirmLogout) {
              window.location.href = "../logout.php";
          }
      }
  </script>

  <style>
    body{
      background-color: #9CD98E;
    }
  </style>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark"  style="background-color: #58964D;">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="../assets/logo/logo.png" alt="Logo" width="150" class="d-inline-block align-text-top">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="category.php">Kategori</a>
        </li>
        <li class="nav-item">
        <a class="nav-link active" href="kemenangan.php?id_user=<?=$id?>">Kemenangan Saya</a>
        </li>
      </ul>

      
      
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <!-- <li class="nav-item">
                    <a class="nav-link active" href=""><?php echo $_SESSION['nama'] ?></a>
                </li> -->
                <li class="nav-item dropdown">
                    <a class="nav-link active" href="" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <?php echo $_SESSION['nama'] ?>
                        <img class="rounded-circle img-responsive" src="../assets/logo/no-profile.png" alt=""
                            style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;">
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="profil.php?id_user=<?=$id?>">Lihat Akun Saya</a></li>
                        <li><a class="dropdown-item" href="kemenangan.php?id_user=<?=$id?>">Kemenangan Saya</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="ml-2">
                          <div class="btn-group px-1" style="display: flex; flex-wrap: wrap;">
                            <button type="button" class="btn btn-danger btn-block ml-2" onclick="confirmLogout()">
                            Logout 
                          </button>
                          </div>
                        </li>
                    </ul>
                </li>
            </ul>
      </div>
  </div>
</nav>
</body>
</html>