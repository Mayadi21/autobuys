<?php
include '../koneksi.php';

    $id = $_POST['id_user'];
    $sql= "DELETE FROM users WHERE id_user='$id'";
    
        if($koneksi->query($sql)===TRUE){
            echo"<script>
            alert('Akun telah berhasil dihapus!');
            document.location.href='lihat_user.php';
            </script> ";;
        }
        else{
            echo "Terjadi kesalahan".$sql."<br>".$koneksi->error;
        }
            ?>