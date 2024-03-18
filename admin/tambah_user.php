<?php include 'navbar_admin.php'; ?>
<?php include '../fungsi.php'; ?>
<?php

if (isset($_POST['btn_tambah'])) {

if (tambah_user($_POST)>0) {
    echo "<script>
    alert('Akun telah berhasil didaftar!');
    document.location.href='lihat_user.php';
    </script> ";
}

else echo mysqli_error($conn);
}
?>

<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="text-dark mx-auto my-4">Tambah Pengguna</h2>
            <hr style="border-top: 1px solid grey;">
            <p class="ml-2">
                <a  href="dashboard_admin.php" style="text-decoration: none; color: black;">Home</a> / 
                <a href="pengguna.php" style="text-decoration: none; color: black;">Pengguna</a> / 
                <a href="#" style="text-decoration: none; color: black;">Tambah Pengguna</a>
            </p>
            <hr style="border-top: 1px solid grey;">
        </div>
    </div>

    <div class="row">
        <div class="card mx-auto my-2" style="width: 65rem;">
            <div class="card-header">
                Tambah Pengguna
            </div>
            <div class=" mx-2 row">
                <form action="" method="POST" style="width: 97%;"
                    class="my-login-validation mt-3 ml-3" enctype="multipart/form-data">
                    <div class="form-group my-3">
                        <label class="mt-2" for="username">Username</label>
                        <input id="username" type="text" class="form-control" name="username" required autofocus>
                        <div class="invalid-feedback">
                            Silahkan isi username pengguna!
                        </div>
                    </div>

                    <div class="form-group my-3">
                        <label class="mt-2" for="nama">Nama</label>
                        <input id="nama" type="text" class="form-control" name="nama" required autofocus>
                        <div class="invalid-feedback">
                            Silahkan isi nama pengguna!
                        </div>
                    </div>

                    <div class="form-group my-3">
                        <label for="email">Alamat E-Mail </label>
                        <input id="email" type="email" class="form-control" name="email" required>
                        <div class="invalid-feedback">
                            Email tidak valid!
                        </div>
                    </div>

                    <div class="form-group my-3">
                        <label for="password">Password</label>
                        <input id="password" type="password" class="form-control" name="password" required data-eye>
                        <div class="invalid-feedback">
                            Password dibutuhkan!
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="level">Status:</label>
                        <select name='level' required id='level'>
                            <option value=1>Pengguna</option>
                            <option value=2>Admin</option>
                        </select>
                        <div class="invalid-feedback">
                            Tentukan status pengguna!
                        </div>
                    </div>
                    <div class="from-group">  <br><br><br>     </div>
                    <div class="form-group m-0">
                        <button type="submit" name="btn_tambah" class="btn btn-primary btn-block">
                            Tambah Pengguna
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    </body>

    </html>