<?php
include '../koneksi.php';

    $id = $_POST['id_kategori'];
    $sql= "DELETE FROM tb_kategori WHERE id_kategori='$id'";
    
        if($koneksi->query($sql)===TRUE){
            echo"<script>
            alert('Kategori telah berhasil dihapus!');
            document.location.href='kategori.php';
            </script> ";;
        }
        else{
            echo "Terjadi kesalahan".$sql."<br>".$koneksi->error;
        }
            ?>