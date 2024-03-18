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

    $hasil = query("SELECT tb_komentar.*, users.nama, 
    tb_produk.nama_produk FROM tb_komentar 
    JOIN users ON tb_komentar.id_user = users.id_user 
    JOIN tb_produk ON tb_komentar.id_produk = tb_produk.id_produk
    ORDER BY tb_komentar.id_komentar DESC
    ");

    if(isset($_POST['btnhapus'])){ 
        
        
        $id = $_POST['id_komentar'];
        $sql= "DELETE FROM tb_komentar WHERE id_komentar=$id";
    
        if($koneksi->query($sql)===TRUE){
            echo"<script>
            alert('Komentar telah berhasil dihapus!');
            document.location.href='';
            </script> ";
        }
    }

?>

        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="text-dark mx-auto my-4">Daftar Komentar</h2>
                    <hr style="border-top: 1px solid grey;">
                        <p class="ml-2">
                            <a href="index.php" style="text-decoration: none; color: black;">Home</a> / 
                            <a href="#" style="text-decoration: none; color: black;">Daftar Komentar</a>
                        </p>
                    <hr style="border-top: 1px solid grey;">
                </div>
            </div>
            <div class="card  mx-auto" >
                <div class= "mx-2 my-2">
            

                <ul class="list-group list-group-flush">
                <div class=" mx-3 my-3">

                    <table class="table table-bordered">
                        <thead>
                          <tr style="background-color: white;">
                            <th class="text-center" scope="col">No</th>
                            <th class="text-center" scope="col">Nama Produk</th>
                            <th class="text-center" scope="col">Pengomentar</th>
                            <th class="text-center" scope="col">Tanggal Komentar</th>
                            <th class="text-center" scope="col">Isi Komentar</th>
                            <th class="text-center" scope="col">Tindakan</th>
                          </tr>
                        </thead>
                        <?php $i=1;?>
                        <?php  foreach ($hasil as $data) {
                            $tgl_komentar = date('d-m-Y', strtotime($data['tgl_komentar']));
                    ?>
                        <tbody>
                          <tr>
                            <th scope="row"><?=$i?></th>
                            <td ><?=$data['nama_produk']?></td>
                            <td><?=$data['nama']?></td>
                            <td><?=$tgl_komentar?></td>
                            <td><?=$data['komentar']?></td>    
                            <td class="text-center">
                                <form onsubmit="return confirm('Anda yakin mau menghapus data?')" action="" method="POST">
                                <input type = 'text' hidden name ='id_komentar' value= <?=$data['id_komentar']?>>
                                <button type = 'submit' class='btn btn-danger' name='btnhapus'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                    </svg>Hapus Komentar</button>
                                </form>
                            </td>
    
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