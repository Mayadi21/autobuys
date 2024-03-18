<?php

require_once '../koneksi.php';



    $id_user = $_POST['id_user'];
    $id_produk = $_POST['id_produk'];
    $harga_lelang = $_POST['harga_lelang'];
    $tgl_hari_ini = new DateTime();
    $tgl_hari_ini = $tgl_hari_ini->format('Y-m-d');
    $harga_awal = $_POST['harga_sebelumnya'];

    // Memastikan harga lelang lebih besar dari harga awal
    if ($harga_lelang > $harga_awal) {
        $sql1 = "INSERT INTO tb_pelelangan (id_lelang, id_user, id_produk, harga_lelang, tgl_melelang) 
        VALUES('', '$id_user', '$id_produk', '$harga_lelang', '$tgl_hari_ini')";
        $sql2 = "UPDATE tb_produk SET harga_lelang = '$harga_lelang' WHERE id_produk = '$id_produk'";

        if ($koneksi->query($sql1) === TRUE && $koneksi->query($sql2) === TRUE) {
            ?>
            <script>
                alert('Lelang Berhasil. Silakan lihat produk dan pengumuman secara berkala');
                window.history.back();

            </script>
            <?php
        } else {
            ?>
            <script>
                alert('Terjadi kesalahan: <?php echo $koneksi->error; ?>');
                
            </script>
            <?php
        }
        exit();
    } else {
        // Menampilkan pesan error jika harga lelang tidak memenuhi syarat
        echo "<script>
            alert('Harga Lelang harus lebih besar dari harga sebelumnya!!');
            window.history.back();
            </script>";
    }
