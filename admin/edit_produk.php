<?php include 'navbar_admin.php'; ?>
<?php include '../koneksi.php'; ?>
<?php include '../fungsi.php'; ?>
<?php

$id_produk = $_POST["id_produk"];

// Mengambil prroduk berdasarkan ID
$data = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE id_produk = $id_produk");
$produk = mysqli_fetch_assoc($data);


$kategori="SELECT * FROM tb_kategori ORDER BY kategori";
$result = mysqli_query($koneksi, $kategori);

if(isset($_POST['btn_edit'])){
    $id = $_POST["id_produk"];
    $nama = ($_POST["nama_produk"]);
    $harga_awal = ($_POST["harga_awal"]);
    $deskripsi = ($_POST["deskripsi_produk"]);
    $tgl_awal = ($_POST["tgl_awal_lelang"]);
    $tgl_akhir = ($_POST["tgl_akhir_lelang"]);
    $kategori = ($_POST["id_kategori"]);


    if ($koneksi){
         
    $query = "UPDATE tb_produk SET
    nama_produk = '$nama',
    harga_awal = '$harga_awal',
    id_kategori = $kategori,
    deskripsi_produk = '$deskripsi',
    tgl_awal_lelang = '$tgl_awal',
    tgl_akhir_lelang = '$tgl_akhir' WHERE id_produk = '$id'";



        if($koneksi->query($query)===TRUE){
            echo"<script>
            alert('Produk telah berhasil diedit!');
            document.location.href='produk.php';
            </script> ";;
        }
        else{
            echo "Terjadi kesalahan".$sql."<br>".$koneksi->error;
        }
    } 
    else {
        echo"<script>
        alert('Produk gagal berhasil diedit!'); 
        </script>";
    }
}

 ?>


<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="text-dark mx-auto my-4">Edit Produk</h2>
            <hr style="border-top: 1px solid grey;">
            <p class="ml-2">
                <a href="dashboard_admin.php" style="text-decoration: none; color: black;">Home</a> / 
                <a href="produk.php" style="text-decoration: none; color: black;">Produk</a> / <a
                    href="#" style="text-decoration: none; color: black;">Edit Produk</a>
            </p>
            <hr style="border-top: 1px solid grey;">
        </div>
    </div>

    <div class="row">
        <div class="card mx-auto my-3" style="width: 65rem;">
            <div class="card-header">
                Edit Data Produk
            </div>
            <div class=" mx-2 my-2 row">

                <form action="" method="POST" class="my-login-validation mt-3 ml-3" >

                    <div class="form-group my-3">
                        <input type="hidden" name="id_produk" value="<?=$produk['id_produk']?>">
                        <label for="nama_produk">Nama Produk:</label>
                        <input id="nama_produk" type="text" value="<?=$produk['nama_produk']?>" class="form-control" name="nama_produk"  required
                        autofocus>
                        <div class="invalid-feedback">
                            Silakan isi nama produk!
                        </div>
                    </div>

                    <div class="form-group my-3">
                        <label for="harga_awal">Harga Awal Produk:</label>
                        <input  id="harga_awal" type="number"  class="form-control" name="harga_awal" value="<?=$produk['harga_awal']?>" required>
                        <div class="invalid-feedback">
                        Silahkan isi harga awal produk!
                        </div>
                    </div>
                    
                    <div class="form-group my-3">
                        <label class="mb-3" for="deskripsi_produk">Deskripsi Produk:</label>
                        <textarea class="form-control input-sm" name="deskripsi_produk" id="deskripsi_produk"
                          rows="12" ><?=$produk['deskripsi_produk']?></textarea>
                    </div>

                    </div>

                    <div class="form-group mt-3">
                        <label for="id_kategori">Kategori Produk:</label>
                        <select class="form-control input-sm mt-3" name="id_kategori" value="<?=$produk['id_kategori']?>">
                            <?php while($kategori = mysqli_fetch_assoc($result)){
                                echo" <option value=$kategori[id_kategori]>$kategori[kategori]</option>";
                            }?>
                        </select>
                    </div>

                    <div class="form-group my-3">
                        <label for="tgl_awal_lelang">Tanggal Mulai Lelang:</label>
                        <input type="date" class="form-control input-sm" name="tgl_awal_lelang"
                            value="<?=$produk['tgl_awal_lelang']?>" required >
                    </div>

                    <div class="form-group my-3">
                        <label for="tgl_akhir_lelang">Tanggal Lelang Berakhir:</label>
                        <input type="date" class="form-control input-sm" name="tgl_akhir_lelang"
                            value="<?=$produk['tgl_akhir_lelang']?>" required >
                    </div>

                    <div class="form-group m-0">
                        <button type="submit" name="btn_edit" class="btn btn-primary btn-block">
                            Edit Produk
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
            CKEDITOR.replace('deskripsi_produk');
    </script>

    </body>

    </html>