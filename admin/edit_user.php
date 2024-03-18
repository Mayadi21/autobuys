<?php include 'navbar_admin.php'; ?>
<?php include '../koneksi.php'; ?>
<?php include '../fungsi.php'; ?>
<?php



$id = $_POST["id_user"];

$data = query("SELECT * FROM users WHERE id_user='$id'")[0];


if(isset($_POST['btn_edit'])){
    $id = $_POST['id_user'];
    $username = $_POST['username'];
    $level = $_POST['level'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = password_hash($password,PASSWORD_DEFAULT);


    if ($koneksi){
        $sql = "UPDATE users SET username='$username',level='$level',nama='$nama',email='$email', password = '$password' WHERE id_user=$id";
        mysqli_query($koneksi,$sql);
        echo"<script>
        alert('Akun telah berhasil diedit!'); 
        document.location.href='lihat_user.php';
        </script> ";      
    } 
}

?>


<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="text-dark mx-auto my-4">Edit Pengguna</h2>
            <hr style="border-top: 1px solid grey;">
            <p class="ml-2">
                <a href="dashboard_admin.php" style="text-decoration: none; color: black;">Home</a> / 
                <a href="pengguna.php" style="text-decoration: none; color: black;">Pengguna</a> / <a
                    href="pengguna.php" style="text-decoration: none; color: black;">Edit Pengguna</a>
            </p>
            <hr style="border-top: 1px solid grey;">
        </div>
    </div>

    <div class="row">
        <div class="card mx-auto my-3" style="width: 65rem;">
            <div class="card-header">
                Edit Data Akun
            </div>
            <div class=" mx-2 my-2 row">

                <form action="" method="POST" class="my-login-validation mt-3 ml-3" enctype="multipart/form-data" novalidate="">

                    <div class="form-group my-3">
                        <input type="hidden" name="id_user" value="<?=$data['id_user']?>">
                        <label for="username">Username</label>
                        <input id="username" type="text" class="form-control" name="username" value="<?=$data['username']?>" required
                        autofocus>
                        <div class="invalid-feedback">
                            Silahkan isi username anda
                        </div>
                    </div>

                    <div class="form-group my-3">
                        <label for="nama">Nama</label>
                        <input  id="nama" type="text" class="form-control" name="nama" value="<?=$data['nama']?>" required>
                        <div class="invalid-feedback">
                        Silahkan isi nama anda                        
                        </div>
                    </div>
                    
                    <div class="form-group my-3">
                        <label for="email">E-Mail Address</label>
                        <input id="email" type="email" class="form-control" name="email" value="<?=$data['email']?>" required>
                        <div class="invalid-feedback">
                            Email anda invalid
                        </div>
                    </div>

                    <div class="form-group my-3">
                                <label for="level">Status</label>
                                <select name='level' required id ='level' value = "<?=$data['level']?>">
                                <?php
                                if ($data['level'] == '1'){
                                    $option_1= "selected";
                                    $option_2 = "";
                                }
                                else
                                if ($data['level'] == '2'){
                                    $option_1 = "";
                                    $option_2 = "selected";                                  
                                }
                                ?>
                                <option value='1' <?=$option_1?>>Pengguna</option>
                                <option value='2' <?=$option_2?>>Admin</option>
                                </select>
                                <div class="invalid-feedback">
                                    Ketik User yang anda inginkan
                                </div>
                            </div>


                    <div class="form-group m-0">
                        <button type="submit" name="btn_edit" class="btn btn-primary btn-block">
                            Edit Akun
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    

    </body>

    </html>