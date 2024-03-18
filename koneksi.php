<?php

if (!isset($_SESSION))
{
    session_start();
}

$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'autobuys';

$koneksi = mysqli_connect($host, $user, $pass, $database);

if ($koneksi->connect_error)
{
    die("Koneksi Gagal".$koneksi->connect_error);
}

// Dapatkan tanggal saat ini
$tanggal_sekarang = date('Y-m-d');

// Query untuk mengupdate nilai pada kolom status_lelang
$sql = "UPDATE tb_produk SET status_lelang = 
        CASE 
            WHEN tgl_awal_lelang > '$tanggal_sekarang' THEN 'BELUM DIMULAI'
            WHEN tgl_akhir_lelang < '$tanggal_sekarang' THEN 'BERAKHIR'
            WHEN tgl_akhir_lelang > '$tanggal_sekarang' AND tgl_awal_lelang < '$tanggal_sekarang' THEN ''
            ELSE status_lelang
        END";

$pemenang = "INSERT INTO tb_pemenang (id_produk, id_user, harga_lelang, tgl_melelang)
SELECT tb_produk.id_produk, users.id_user, tb_pelelangan.harga_lelang, tb_pelelangan.tgl_melelang
FROM tb_pelelangan
JOIN users ON tb_pelelangan.id_user = users.id_user
JOIN tb_produk ON tb_pelelangan.id_produk = tb_produk.id_produk
WHERE tb_produk.harga_lelang = tb_pelelangan.harga_lelang AND tb_produk.status_lelang = 'BERAKHIR'
AND NOT EXISTS (
    SELECT 1
    FROM tb_pemenang
    WHERE tb_pemenang.id_produk = tb_produk.id_produk
        AND tb_pemenang.id_user = users.id_user
        AND tb_pemenang.harga_lelang = tb_pelelangan.harga_lelang
      AND tb_pemenang.tgl_melelang = tb_pelelangan.tgl_melelang
  )";

if (mysqli_query($koneksi, $sql)) {
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
}

if (mysqli_query($koneksi, $pemenang)) {
} else {
    echo "Error: " . $pemenang . "<br>" . mysqli_error($koneksi);
}








?>