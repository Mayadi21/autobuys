<?php include '../koneksi.php'; ?>
<?php include 'navbar_admin.php'; ?>
<?php include '../fungsi.php'; ?>

<?php
$id = $_SESSION["id_user"];



$akun = mysqli_query($koneksi, "SELECT * FROM users WHERE id_user='$id'");
$data = mysqli_fetch_assoc($akun);

?>


<div class="container text-start">
    <div class="row">
        <div class="col-sm-8 mt-5 mb-5 pt-5">
            <h1>Selamat datang di <i>AutoBuys</i>, <?=$data['nama'];?></h1>
            <div class="text-center mt-5 pt-3">
                <div class="row row-cols-auto">
                </div>
                <hr>
                <div class="container text-start pt-2">
                    <div class="row">
                        <div class="col" >
                          <div><h3>Info Akun</h3></div>
                            <div>
                                <table class="table table-success table-striped">
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td><?= $data['nama'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td>:</td>
                                        <td><?= $data['username'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>:</td>
                                        <td><?= $data['email'] ?></td>
                                    </tr>
                                </table>

                            </div>
                        </div>
                    </div>
                    <hr>



</body>
</html>


