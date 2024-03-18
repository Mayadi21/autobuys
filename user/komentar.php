<?php
require '../koneksi.php';
include '../fungsi.php';



// Mengambil ID pengguna yang sedang login
$id_user = $_SESSION['id_user'];

// Mendapatkan id produk yang sedang dilihat
$id_produk = $_GET['id_produk'];

$query_pengguna= mysqli_query($koneksi, "SELECT * FROM users WHERE id_user = $id_user");
$pengguna = mysqli_fetch_assoc($query_pengguna);

$query_komentar = mysqli_query($koneksi, "SELECT * FROM tb_komentar WHERE id_produk = $id_produk");

if (isset($_POST["tambah_komentar"])) {
    $create_comment = tambah_komentar($_POST);
    if ($create_comment > 0) {
        echo "<script>
            alert('Komentar berhasil ditambahkan!');
            window.location.href = '';
        </script>";
        exit;
    } else {
        echo "<script>
            alert('Komentar gagal ditambahkan');
            window.location.href = '';
        </script>";
        exit;
    }
}
?>
    <!-- Nama  Pengomentar -->
    <div style="display: flex; flex-direction: column;">
        <div style="display: flex; align-items: center;">
            <img src="../assets/logo/no-profile.png" alt="Foto Profil"
                style="width: 40px; height: 40px; border-radius: 50%; margin-right: 8px;">
            <div>
                <div style="font-weight: bold;"><?= $pengguna['nama']?></div>
            </div>
        </div>
        <div style="margin-left: 58px;">
            <!-- Kotak komentar -->
            <form method="POST" action="">
                <?php
                if (mysqli_num_rows($query_komentar) < 1) { ?>
                    <textarea name= "isi_komentar" placeholder="Jadilah yang pertama  berkomentar..." style="width: 100%; height: 100px; padding:5px;"></textarea>
                <?php
                }
                else {
                ?>
                    <textarea   name= "isi_komentar" placeholder="Tulis komentar..." rows="4" style="width: 100%; height: 100px; padding:5px;"></textarea>
                <?php
                }
                ?>
                <input  type="hidden" value="<?= $id_produk?>" name="id_produk">
                <input type="hidden" value="<?= $id_user; ?>" name="id_user">
                <div style="display: flex; margin-top: 8px;">
                    <button style="padding: 8px;  border: none; margin-right: 8px" class="btn btn-success px-5 mr-3" type="submit" name="tambah_komentar">Kirim</button>
                    <button style="padding: 8px; background-color: #ccc; color: #000; border: none;" class="btn px-5">Batal</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>