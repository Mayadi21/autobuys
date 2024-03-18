<?php


	require '../koneksi.php';
    include 'navbar_admin.php';
    include '../fungsi.php';

    if ($_SESSION['level'] != 2) {
        header('Location: ../denied.php');
      exit;
    }

    $kategori="SELECT *FROM tb_kategori ORDER BY kategori";
    $result = mysqli_query($koneksi, $kategori);

    if (isset($_POST["btn_tambah_produk"])) {
        $tambahproduk = tambah_produk($_POST);
        if ($tambahproduk > 0) {
            echo "<script>
            alert('Produk berhasil ditambahkan!');
            document.location.href='produk.php';
            </script>";
        } 
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>AutoBuys</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../dist/css/admin.css">
    <script src="../assets/bootstrap/js/jquery-3.7.1.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
        <div class="col">
                    <h2 class="text-dark mx-auto my-4">Tambah Produk</h2>
                    <hr style="border-top: 1px solid grey;">
                        <p class="ml-2">
                            <a href="index.php" style="text-decoration: none; color: black;">Home</a> / 
                            <a href="produk.php" style="text-decoration: none; color: black;">Produk</a> /
                            <a href="#" style="text-decoration: none; color: black;">Tambah Produk</a>
                        </p>
                    <hr style="border-top: 1px solid grey;">
                </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-50 main-content">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-20">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="col-sm-15">
                                        <div class="form-group my-5">
                                            <label for="nama_produk">Nama Produk:</label>
                                            <input type="text" class="form-control" name="nama_produk"
                                                placeholder="Masukkan nama produk" value="" required>
                                        </div>

                                        <div class="form-group my-5">
                                            <label for="nama_produk">Harga Awal Produk:  </label>
                                            <input type="number" class="form-control" name="harga_produk"
                                                placeholder="Tentukan harga produk! (Tidak menggunakan '.' contoh: 12000)" value="" required>
                                        </div>

                                        
                                    </div>
                                    <div class="col-sm-10 mt-3">
                                        <div class="form-group">
                                            <label for="gambar_produk">Gambar Produk:</label>
                                            <input type="file"  name="gambar_produk" id="gambar_produk">
                                            <label class="text-muted">Ukuran gambar maks 2 MB</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group my-3">
                                            <label for="tgl_awal_lelang">Tanggal Mulai Lelang:</label>
                                            <input type="date" class="form-control input-sm" name="tgl_awal_lelang"
                                                value="<?php  echo date("Y-m-d"); ?>" required >
                                        </div>

                                        <div class="form-group my-3">
                                        <label for="tgl_akhir_lelang">Tanggal Lelang Berakhir:</label>
                                            <input type="date" class="form-control input-sm" name="tgl_akhir_lelang" required >
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label>Kategori Produk:</label>
                                        <select class="form-control input-sm mt-3" name="id_kategori">
                                            <?php while($panggil = mysqli_fetch_assoc($result)){
                                                echo" <option value=$panggil[id_kategori]>$panggil[kategori]</option>";
                                            }?>
                                        </select>
                                    </div>
                                    <div class="form-group my-5">
                                        <label for="deskripsi_produk">Deskripsi Produk:</label>
                                        <textarea class="form-control ckeditor input-sm" name="deskripsi_produk" id="deskripsi_produk"
                                        placeholder="Jelaskan produk di sini!" rows="10" ></textarea>
                                    
                                    </div>
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-primary mt-3 mb-5 btn-block" type="submit"
                                            name="btn_tambah_produk">
                                            Tambah Produk
                                        </button>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
            CKEDITOR.replace('deskripsi_produk');
    </script>

</body>

</html>