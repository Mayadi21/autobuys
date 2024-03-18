<?php
require '../koneksi.php';
include 'navbar_user_page.php';




$id_produk = $_GET['id_produk'];
$id_user = $_SESSION['id_user'];

// Mengambil prroduk berdasarkan ID
$produk = mysqli_query($koneksi, "SELECT * FROM tb_produk
JOIN tb_kategori ON tb_produk.id_kategori = tb_kategori.id_kategori
WHERE tb_produk.id_produk = $id_produk  GROUP BY tb_produk.id_produk");

$daftarlelang = mysqli_query($koneksi, "SELECT tb_pelelangan.id_lelang, users.nama, tb_pelelangan.harga_lelang, 
tb_pelelangan.tgl_melelang FROM tb_pelelangan 
JOIN users ON tb_pelelangan.id_user = users.id_user 
JOIN tb_produk ON tb_pelelangan.id_produk = tb_produk.id_produk WHERE tb_pelelangan.id_produk = '$id_produk'
ORDER BY tb_pelelangan.id_lelang DESC");

// Memeriksa apakah terdapat produk
if (mysqli_num_rows($produk) > 0) {
    $produk = mysqli_fetch_assoc($produk);
    $deskripsi = htmlspecialchars_decode($produk['deskripsi_produk']);

    $sql = "SELECT pengunjung FROM tb_produk WHERE id_produk = '$id_produk'";
    $hasil = mysqli_query($koneksi,$sql);
    
    if ($hasil->num_rows > 0) {
        while ($row = $hasil->fetch_assoc()) {
            $visits = $row["pengunjung"];
            $sql = "UPDATE tb_produk SET pengunjung = $visits+1 WHERE id_produk ='$id_produk'";
            mysqli_query($koneksi,$sql);
        }
    } else {
        echo"<script>
        alert('NO RESULT');
        </script> ";
    }
?>

<body>
    <div class="container content" >
        <div class="row">
            <div class="col">
                <div class=" mx-3" style="background-color: #9CD98E;">
                        <div class="row">
                            <div class=" product">
                                <img class=" product-img" src="../assets/img/<?=$produk['gambar_produk']?>"
                                    alt="gambar">
                            </div>
                            <div class="col mx-4 mx-4 my-4">
                                <span class="detail-produk"><?=$produk['nama_produk']?></span>
                                <div class="border-bottom mb-3"></div>
                                <div class="d-flex align-items-center">
                                    <span style="font-size: 23px;">Harga Awal : Rp.<?=$produk['harga_awal']?></span>
                                </div>
                                <div class="border-bottom mb-3"></div>
                                    <span style="font-size: 23px;">Harga Lelang: Rp.<?=$produk['harga_lelang']?></span>
                                <?php 
                                $tgl_awal_lelang = date('d-m-Y', strtotime($produk['tgl_awal_lelang']));
                                $tgl_akhir_lelang = date('d-m-Y', strtotime($produk['tgl_akhir_lelang']));?>

                                <div class="border-bottom mb-3"></div>
                                <div class="d-flex align-items-center">
                                    <span style="font-size: 23px;">Tanggal mulai lelang: <?=$tgl_awal_lelang?></span>
                                </div>
                                <div class="border-bottom mb-3"></div>
                                <span style="font-size: 23px;">Tanggal penutupan lelang: <?=$tgl_akhir_lelang?></span>

                                <div class="border-bottom mb-3"></div>
                                <span style="font-size: 23px;">Kategori: <?=$produk['kategori']?></span>

                                <div class="border-bottom mb-3"></div>
                                <div class="btn-group p-4 m-3" style="display: flex; flex-wrap: wrap;">
                                    <button type="button" class="btn btn-success py-3 ikutlelang" onclick="cekBolehLelang()">
                                        <span class="fw-bold" style="font-family:Verdana; font-size: 16px;">Ikut Lelang</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                            <ul class="list-group list-group-flush">
                            <div class=" mx-3 my-3">
                            <h2 class="text-center mx-auto my-4">Peringkat Lelang</h2>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr style="background-color: white;">
                                        <th class="text-center" scope="col">No</th>
                                        <th class="text-center" scope="col">Pelelang</th>
                                        <th class="text-center" scope="col">Harga Lelang</th>
                                        <th class="text-center" scope="col">Tanggal Lelang</th>
                                    </tr>
                                    </thead>
                                    <?php $i=1;?>
                                    <?php  foreach ($daftarlelang as $lelang) {
                                            
                                ?>
                                    <tbody>
                                    <tr>
                                        <th scope="row"><?=$i?></th>
                                        <td ><?=$lelang['nama']?></td>
                                        <td><?=$lelang['harga_lelang']?></td>
                                        <td><?=$lelang['tgl_melelang']?></td>    
                
                                    </tr>
                                    </tbody>
                                    <?php $i++;  }?>
                                </table>
                            </div>
                            </ul>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <br>
                                <div class="mb-5"><h2>Deskripsi Produk:</h2></div>
                                <div style="font-size: 21px;"><?php echo $deskripsi; ?></div>
                                <?php } ?>
                            </div>
                        </div>
                        <hr>
                       
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <br>
                <h5 class="text-center mt-3">Komentar</h5>
                <?php
                    $ambilkomentar = mysqli_query($koneksi, "SELECT * FROM tb_komentar WHERE id_produk = $id_produk");

                    while ($komentar = mysqli_fetch_array($ambilkomentar)) {
                        $user = $komentar['id_user'];
                        $user = mysqli_query($koneksi, "SELECT nama FROM users WHERE id_user = $user");
                        $user = mysqli_fetch_assoc($user);
                        $tgl_komentar = date('d-m-Y', strtotime($komentar['tgl_komentar']));

                ?>
                <div class="card mx-3 mb-3" style="background-color: #92d585;">
                    <div class="card-body ">
                        <div class="d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-person-fill me-1" viewBox="0 0 16 16">
                                <path
                                    d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            </svg>
                            <span class="ms-1"><?=$user['nama']?></span>
                        </div>
                        <p class="mt-2"><?=$komentar['komentar']?></p>
                        <span class="ms-1"><?=$tgl_komentar?></span>
                    </div>
                </div>
                <?php } ?>
                <?php include 'komentar.php'; ?>
            </div>
        </div>

    </div>

    <?php include '../footer.php';?>


    



<!-- Modal Lelang -->
<div class="modal fade" id="modalLelang" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1  class="modal-title fs-5" id="judulModal">Lelang Barang yang Anda Minati!</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="proses_lelang.php" method="POST">
      <div class="modal-body">
        <div class="form-group mb-3">
          <label for="harga_lelang" class=" col-form-label">Tentukan harga lelang anda</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" hidden name="id_user" value="<?=$id_user?>" required>
            <input type="number" class="form-control" hidden  name="id_produk" value="<?=$id_produk?>" required>
            <input type="number" class="form-control" hidden name="harga_sebelumnya" value="<?=$produk['harga_lelang']?>" required>
            <input type="number" class="form-control" id="harga_lelang" name="harga_lelang" value="<?=$produk['harga_lelang']?>" required>
          </div>
        </div>
      </div> 
      <div class="modal-footer">
        <button name="btn_lelang" class="btn btn-success">Lelang Barang</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
      </div>
      </form>
    </div>
  </div>
</div>
  <!-- End Modal Lelang -->  

<script>
function cekBolehLelang() {
    var tglAwal = new Date('<?=$produk['tgl_awal_lelang']?>');
    var tglAkhir = new Date('<?=$produk['tgl_akhir_lelang']?>');
    var tglSekarang = new Date();

    if (tglSekarang < tglAwal) {
        alert('Lelang belum dimulai. Anda tidak dapat melelang saat ini.');
    } else if (tglSekarang > tglAkhir) {
        alert('Maaf, lelang ini sudah ditutup. Anda tidak dapat melelang lagi.');
    } else {
        // Buka modal lelang jika kondisi memungkinkan
        $('#modalLelang').modal('show');
    
    }
}
</script>

    <script src="../assets/bootstrap/js/jquery-3.7.1.min.js"></script>

</body>

</html>