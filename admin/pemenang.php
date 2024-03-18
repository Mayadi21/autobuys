<?php include '../fungsi.php'; 
include 'navbar_admin.php';
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
    $hasil = query("SELECT tb_pemenang.*, tb_produk.nama_produk, users.nama FROM tb_pemenang
    JOIN users ON tb_pemenang.id_user = users.id_user
    JOIN tb_produk ON tb_pemenang.id_produk = tb_produk.id_produk
    ORDER BY tb_pemenang.id_pemenang DESC");
?>

        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="text-dark mx-auto my-4">Daftar Pemenang Lelang</h2>
                    <hr style="border-top: 1px solid grey;">
                        <p class="ml-2">
                            <a href="index.php" style="text-decoration: none; color: black;">Home</a> / 
                            <a href="#" style="text-decoration: none; color: black;">Pemenang Lelang</a>
                        </p>
                    <hr style="border-top: 1px solid grey;">
                </div>
            </div>
            <div class="card  mx-auto" >
                <div class="card-header">
                    Tabel Daftar Pemenang Lelang
                </div>
                <div class= "mx-2 my-2">
            

                <ul class="list-group list-group-flush">
                <div class=" mx-3 my-3">

                    <table class="table table-bordered">
                        <thead>
                          <tr style="background-color: white;">
                            <th class="text-center" scope="col">No</th>
                            <th class="text-center" scope="col">Nama Produk</th>
                            <th class="text-center" scope="col">Pemenang Lelang</th>
                            <th class="text-center" scope="col">Harga Lelang</th>
                            <th class="text-center" scope="col">Status Pembayaran</th>
                          </tr>
                        </thead>
                        <?php $i=1;?>
                        <?php  foreach ($hasil as $data) {
                                
                    ?>
                        <tbody>
                          <tr>
                            <th class="text-center" scope="row"><?=$i?></th>
                            <td class="text-center"><?=$data['nama_produk']?></td>
                            <td class="fw-bold text-success text-center"><?=$data['nama']?></td>
                            <td class="text-center"><?=$data['harga_lelang']?></td>    
                            <td class="fw-bold text-success text-center"><?=$data['status_bayar']?></td>    
                          </tr>
                        </tbody>
                        <?php $i++;  }?>
                    </table>
                </div>
                </ul>
            </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.2.1/sweetalert2.min.js"></script>

</body>
</html>