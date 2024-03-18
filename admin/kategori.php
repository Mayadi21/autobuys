<?php include '../fungsi.php'; 
include 'navbar_admin.php';
include '../koneksi.php';
if(isset($_POST['btnTambah'])){
    $kategori = $_POST['kategori'];
    


    if ($koneksi){
        $sql = "INSERT INTO tb_kategori (kategori) VALUES ('$kategori')";
        mysqli_query($koneksi,$sql);
        echo"<script>
        alert('Kategori berhasil ditambahkan!'); 
        document.location.href='kategori.php';
        </script> ";      
    } 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoBuys</title>

</head>
<body>
<?php 

    $hasil = query("SELECT * FROM tb_kategori ORDER BY kategori");

?>

        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="text-dark mx-auto my-4">Daftar Kategori Produk</h2>
                    <hr style="border-top: 1px solid grey;">
                        <p class="ml-2">
                            <a href="index.php" style="text-decoration: none; color: black;">Home</a> / 
                            <a href="#" style="text-decoration: none; color: black;">Kategori Produk</a>
                        </p>
                    <hr style="border-top: 1px solid grey;">
                </div>
            </div>
            <div class="card  mx-auto" style="width: 40rem;" >
                <div class="card-header">
                    Tabel Daftar Kategori
                </div>
                <div class= "mx-2 my-2">
                    <div class="col my-2 mr-0">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalKategori">
                        Tambah Kategori
                    </button>
                    </div>
                        
                </div>
            
                <div class=" mx-3 my-3" >

                    <table class="table table-bordered">
                        <thead>
                          <tr style="background-color: white;">
                            <th class="text-center" scope="col">No</th>
                            <th class="text-center" scope="col">Kategori Produk</th>
                            <th class="text-center" scope="col">Tindakan</th>
                          </tr>
                        </thead>
                        <?php $i=1;?>
                        <?php  foreach ($hasil as $data) {
                                
                    ?>
                        <tbody>
                          <tr>
                            <th scope="row"><?=$i?></th>
                            <td class="text-center" ><?=$data['kategori']?></td>
                            <td class="text-center">
                                <form onsubmit="return confirm('Anda yakin mau menghapus kategori?')" action="hapus_kategori.php" method="POST">
                                <input type = 'text' hidden name ='id_kategori' id="id_user" value= <?=$data['id_kategori']?>>
                                <button type = 'submit' class='btn btn-danger' name='btnhapus'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                    </svg>Hapus Kategori</button>
                                </form>
                            </td>
                          </tr>
                        </tbody>
                        <?php $i++;  }?>
                    </table>
                </div>
            </div>


            <!-- Modal Tambah Kategori -->
<div class="modal fade" id="modalKategori" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1  class="modal-title fs-5" id="judulModal">Tambah Kategori Produk</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="POST">
      <div class="modal-body">
        <div class="form-group mb-3">
          <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="kategori" name="kategori" required>
          </div>
        </div>
      </div> 
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button name="btnTambah" class="btn btn-primary">Tambah</button>
      </div>
      </form>
    </div>
  </div>
</div>

</body>
</html>