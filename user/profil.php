<?php include '../koneksi.php'; ?>
<?php include 'navbar_user_page.php'; ?>
<?php include '../fungsi.php'; ?>

<?php
$id = $_SESSION["id_user"];



$akun = mysqli_query($koneksi, "SELECT * FROM users WHERE id_user='$id'");
$data = mysqli_fetch_assoc($akun);



$hasil = mysqli_query($koneksi, "SELECT tb_pelelangan.harga_lelang, tb_produk.nama_produk, tb_pelelangan.tgl_melelang
FROM tb_pelelangan
JOIN tb_produk ON tb_pelelangan.id_produk = tb_produk.id_produk 
WHERE id_user = $id ORDER BY tgl_melelang DESC");

?>



<?php

    if (isset($_POST['btn_edit'])){
        $username = $_POST['username'];
        $id_user = $_POST['id_user'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
    
        if ($koneksi){
            $sql = "UPDATE users SET username='$username',nama='$nama',email='$email' WHERE id_user=$id";
            mysqli_query($koneksi,$sql);
            echo"<script>
            alert('Akun telah berhasil diedit!'); 
            document.location.href='profil.php';
            </script> ";      
        } 
    }

?>

<div class="container text-start">
    <div class="row">
        <div class="col-sm-12 mt-5 mb-5 pt-5">
            <h1>Selamat datang di <i>AutoBuys</i>, <?=$data['nama'];?></h1>
            <div class="text-center mt-5 pt-3">
                <div class="row row-cols-auto">
                </div>
                <hr>
                <div class="container text-start pt-2">
                    <div class="row">
                        <div class="col" >
                          <div><h3>Info Akun</h3></div>
                            <div>
                                <table class="table table-success table-striped">
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td><?= $data['nama'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td>:</td>
                                        <td><?= $data['username'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>:</td>
                                        <td><?= $data['email'] ?></td>
                                    </tr>
                                </table>
                                <div class="btn-group" style="display: flex; flex-wrap: wrap;">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEdit">
                                        Edit Akun
                                    </button>                            
                                </div> 

                            </div>
                        </div>
                        <div class="col mx-4">
                          <div><h3>Daftar Pelelangan Saya</h3></div>
                            <table class="table table-success table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col">No</th>
                                        <th class="text-center" scope="col">Nama Produk</th>
                                        <th class="text-center" scope="col">Harga Lelang</th>
                                        <th class="text-center" scope="col">Tanggal Lelang</th>

                                    </tr>
                                    </thead>
                                    <?php $ii=1;?>
                                    <?php  foreach ($hasil as $lelang) {
                                    ?>
                                    <tbody>
                                    <tr>
                                        <th scope="row"><?=$ii?></th>
                                        <td><?=$lelang['nama_produk']?></td>
                                        <td><?=$lelang['harga_lelang']?></td>
                                        <td><?=$lelang['tgl_melelang']?></td>
                                    </tr>
                                    </tbody>
                                <?php $ii++;  }?>

                            </table>
                        </div>
                    </div>
                    <hr>




                    <!-- Modal Edit -->
<div class="modal fade" id="modalEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Akun</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="POST">
      <div class="modal-body">
        <div class="form-group mb-3">
          <label for="username" class="col-sm-2 col-form-label">Username</label>
          <div class="col-sm-10">
          <input type="text"  class="form-control" hidden  name="id_user" value="<?=$data['id_user']?>">
            <input type="text" class="form-control"  name="username" value="<?=$data['username']?>"  required>
          </div>
        </div>
        <div class="form-group mb-3">
          <label for="nama" class="col-sm-2 col-form-label">Nama</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="nama" value="<?=$data['nama']?>" required>
          </div>
        </div>
        <div class="form-group mb-3">
          <label for="email" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" name="email" value="<?=$data['email']?>" required>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
        <button type="submit" name="btn_edit" class="btn btn-primary" >Edit</button>
        
      </div>
      </form>
    </div>
  </div>
</div>
<!--End Modal Edit -->

</body>
</html>

