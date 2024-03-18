<?php
include '../koneksi.php';

    $id = $_POST['id_produk'];
    $sql= "DELETE FROM tb_produk WHERE id_produk='$id'";
    
        if($koneksi->query($sql)===TRUE){
            echo"<script>
            alert('Produk telah berhasil dihapus!');
            document.location.href='produk.php';
            </script> ";
        }
        else{
            echo "Terjadi kesalahan".$sql."<br>".$koneksi->error;
        }
            ?>