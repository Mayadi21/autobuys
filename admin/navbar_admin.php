<?php

require '../koneksi.php';

    if( $_SESSION["level"] != "2"){
        
        echo"<script>
        document.location.href='../denied.php';
        </script> "; 
		exit;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin AutoBuys</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/my_assets/manual.css">
    <link rel="stylesheet" type="text/css" href="../assets/font-awesome/css/font-awesome.min.css">
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="ckeditor/ckeditor.js"></script>




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
    <a class="navbar-brand" href="#">
      <img src="../assets/logo/logo.png" alt="Logo" width="150" class="d-inline-block align-text-top">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Cek Lelang
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="daftar_lelang.php">Daftar Lelang</a></li>
              <li><a class="dropdown-item" href="pemenang.php">Pemenang Lelang</a></li>
            </ul>
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
                        <li><a class="dropdown-item" href="profil.php">Lihat Profil</a></li>
                        <li><a class="dropdown-item" href="">About Us</a></li>
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