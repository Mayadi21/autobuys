<?php include '../fungsi.php'; 
include 'navbar_admin.php';
include '../koneksi.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoBuys</title>
    
    <style>
    .gambar-preview {
        display: none;
    }
</style>

</head>
<body>
<?php 

    $hasil = query("SELECT * FROM tb_produk, tb_kategori
    WHERE tb_produk.id_kategori = tb_kategori.id_kategori Order by id_produk desc");

?>

        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="text-dark mx-auto my-4">Daftar Produk</h2>
                    <hr style="border-top: 1px solid grey;">
                        <p class="ml-2">
                            <a href="index.php" style="text-decoration: none; color: black;">Home</a> / 
                            <a href="#" style="text-decoration: none; color: black;">Produk</a>
                        </p>
                    <hr style="border-top: 1px solid grey;">
                </div>
            </div>
            <div class="card  mx-auto" >
                <div class="card-header">
                    Tabel Daftar Produk
                </div>
                <div class= "mx-2 my-2">
                <div class="row">
                    <div class="col my-2 ml-4">
                        <a href="tambah_produk.php" type="button" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" height="14" width="12.25" viewBox="0 0 448 512">
                            <path fill="#ffffff" d="M246.6 9.4c-12.5-12.5-32.8-12.5-45.3 0l-128 128c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 109.3V320c0 17.7 14.3 32 32 32s32-14.3 32-32V109.3l73.4 73.4c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-128-128zM64 352c0-17.7-14.3-32-32-32s-32 14.3-32 32v64c0 53 43 96 96 96H352c53 0 96-43 96-96V352c0-17.7-14.3-32-32-32s-32 14.3-32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V352z"/>
                        </svg> Tambah Produk
                        </a>
                    </div>
				</div>

                <ul class="list-group list-group-flush">
                <div class=" mx-3 my-3">

                    <table class="table table-bordered">
                        <thead>
                          <tr style="background-color: white;">
                            <th class="text-center" scope="col">No</th>
                            <th class="text-center" scope="col">Nama Produk</th>
                            <th class="text-center" scope="col">Harga Awal</th>
                            <th class="text-center" scope="col">Harga Lelang</th>
                            <th class="text-center" scope="col">Kategori</th>
                            <th class="text-center" scope="col">Tanggal Mulai lelang</th>
                            <th class="text-center" scope="col">Tanggal Akhir lelang</th>
                            <th class="text-center" scope="col">Status Lelang</th>
                            <th class="text-center" scope="col">Foto Produk</th>
                            <th class="text-center" scope="col">Deskripsi Produk</th>
                            <th class="text-center" scope="col" colspan="2">Tindakan</th>
                          </tr>
                        </thead>
                        <?php $i=1;?>
                        <?php  foreach ($hasil as $data) {

                        $tgl_awal_lelang = date('d-m-Y', strtotime($data['tgl_awal_lelang']));
                        $tgl_akhir_lelang = date('d-m-Y', strtotime($data['tgl_akhir_lelang']));
                        $deskripsi = htmlspecialchars_decode($data['deskripsi_produk']);

                        ?>
                        <tbody>
                          <tr>
                            <th scope="row"><?=$i?></th>
                            <td ><?=$data['nama_produk']?></td>
                            <td><?=$data['harga_awal']?></td>
                            <td><?=$data['harga_lelang']?></td>
                            <td><?=$data['kategori']?></td>
                            <td><?=$tgl_awal_lelang?></td>
                            <td><?=$tgl_akhir_lelang?></td>
                            <td><span class="text-danger fw-bolder"><?=$data['status_lelang']?></span></td>
                            <td>
                                <img src="../assets/img/<?=$data['gambar_produk']?>" alt="gambar_produk" class="gambar-preview" width="200px">
                                <button class="lihat-gambar btn-warning btn" data-gambar="<?=$data['gambar_produk']?>" onclick="sembunyiElemen(this, 'gambar')">Lihat Gambar</button>
                            </td>
                            <td>
                                <div class="deskripsi-preview" style="display: none;"><?=$deskripsi?></div>
                                <button class="lihat-deskripsi btn-warning btn" data-deskripsi="<?=$deskripsi?>" onclick="sembunyiElemen(this, 'deskripsi')">Lihat Deskripsi</button>
                            </td>



                            
                            
                            <!---TOMBOL EDIT--->

                          <td class="text-center">
                            <form method = 'POST' action='edit_produk.php'>
                            <input type = 'text' hidden  name = 'id_produk' value= '<?=$data['id_produk']?>'>
                            <button type = 'submit' class='btn btn-success' name='btnedit'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>Edit<br>Produk
                            </button>
                            </form>
                          </td>
                        
                           
                            <!---TOMBOL HAPUS--->

                            <td class="text-center">
                                <form onsubmit="return confirm('Anda yakin mau menghapus produk?')" action="hapus_produk.php" method="POST">
                                <input type = 'text' hidden name ='id_produk' id="id_produk" value= <?=$data['id_produk']?>>
                                <button type = 'submit' class='btn btn-danger' name='btnhapus'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                    </svg>Hapus Produk</button>
                                </form>
                                
                                
                          </td>
                          </tr>
                        </tbody>
                        <?php $i++;  }?>
                    </table>
                </div>
                </ul>
            </div>

        <!-- <script src="../js/jquery-3.6.0.min.js"></script>
        <script src="../js/bootstrap.js"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.2.1/sweetalert2.min.js"></script>

        
        <script>
    function sembunyiElemen(button, jenis) {
        var elemenContainer = button.parentNode; // Ambil elemen container (td) dari tombol
        var elemenPreview;

        if (jenis === 'gambar') {
            elemenPreview = elemenContainer.querySelector('.gambar-preview'); // Ambil elemen gambar dalam container
        } else if (jenis === 'deskripsi') {
            elemenPreview = elemenContainer.querySelector('.deskripsi-preview'); // Ambil elemen deskripsi dalam container
        }

        if (elemenPreview.style.display === 'none' || elemenPreview.style.display === '') {
            elemenPreview.style.display = 'block'; // Tampilkan elemen
            button.innerText = 'Sembunyikan ' + (jenis === 'gambar' ? 'Gambar' : 'Deskripsi'); // Ganti teks tombol

        } else {
            elemenPreview.style.display = 'none'; // Sembunyikan elemen
            button.innerText = 'Lihat ' + (jenis === 'gambar' ? 'Gambar' : 'Deskripsi'); // Ganti teks tombol
        }
    }
</script>




    </body>
</html>