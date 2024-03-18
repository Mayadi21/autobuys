<?php
require("koneksi.php");


    $user_login = ($_POST['username']);
    $pass_login = ($_POST['password']);
    $query = "SELECT *FROM users WHERE username='$user_login'";
    $result = mysqli_query($koneksi,$query);
  
    
    // cek username
    if (mysqli_num_rows($result)===1) {
      
      // cek password
      
      $row = mysqli_fetch_assoc($result);
      if (password_verify($pass_login,$row['password'])) {
  
  
        $tarik_data = "SELECT * FROM users WHERE username='$user_login'";
        $data = mysqli_query($koneksi,$tarik_data);
        $hasil = mysqli_fetch_assoc($data);
  
       
        $id_user = $hasil['id_user'];
        $username = $hasil['username'];
        $nama = $hasil['nama'];
        $email = $hasil['email'];
        $level = $hasil['level'];
  
        
        if($level == '1') {
            header("Location: user/index.php");
            $_SESSION['nama'] = $nama;
            $_SESSION['id_user'] = $id_user;
            $_SESSION['username'] = $username;
            $_SESSION['level'] = 1;
            $_SESSION['email'] = $email;
            exit;
  
        } elseif ($level == "2") {
            header("Location: admin/index.php");
            $_SESSION['id_user'] = $id_user;
            $_SESSION['nama'] = $nama;
            $_SESSION['username'] = $username;
            $_SESSION['level'] = 2;
            $_SESSION['email'] = $email;
            exit;
        }
  
      } else
      {
        echo "<script>alert('Password yang Anda masukkan salah. Silakan coba lagi.');
        document.location.href='index.php';
        </script>";
      }
  
  
      
    }
    else {
      echo "<script>alert('Username pengguna tidak ditemukan. Silakan coba lagi.');
      document.location.href='index.php';
      </script>";
    }
  
?>