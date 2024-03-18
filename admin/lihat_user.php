<?php include 'navbar_admin.php';


?>

<?php include '../fungsi.php'; ?>
<?php 

    $hasil = query("SELECT * FROM users");

?>

        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="text-dark mx-auto my-4">Daftar Pengguna</h2>
                    <hr style="border-top: 1px solid grey;">
                        <p class="ml-2">
                            <a href="index.php" style="text-decoration: none; color: black;">Home</a> / 
                            <a href="#" style="text-decoration: none; color: black;">Pengguna</a>
                        </p>
                    <hr style="border-top: 1px solid grey;">
                </div>
            </div>
            <div class="card  mx-auto" style="width: 65rem;">
                <div class="card-header">
                    Tabel Daftar Pengguna
                </div>
                <div class= "mx-2 my-2">
                    <div class="col my-2 ml-4">
                            <a href="tambah_user.php" type="button" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-person-plus-fill mb-1" viewBox="0 0 16 16">
                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                            </svg>
                                Tambah Pengguna
                            </a>
                    </div>
                        
                </div>

                <ul class="list-group list-group-flush">
                <div class=" mx-3 my-3">

                    <table class="table table-bordered">
                        <thead>
                          <tr style="background-color: white;">
                            <th class="text-center" scope="col">No</th>
                            <th class="text-center" scope="col">Username</th>
                            <th class="text-center" scope="col">Nama</th>
                            <th class="text-center" scope="col">Email</th>
                            <th class="text-center" scope="col">Level</th>
                            <th class="text-center" scope="col" colspan="2">Tindakan</th>
                          </tr>
                        </thead>
                        <?php $i=1;?>
                        <?php  foreach ($hasil as $data) {
                            
                    ?>
                        <tbody>
                          <tr>
                            <th scope="row"><?=$i?></th>
                            <td ><?=$data['username']?></td>
                            <td><?=$data['nama']?></td>
                            <td><?=$data['email']?></td>
                            <td><?=$data['level']?></td>
                            
                            
                            <!---TOMBOL EDIT--->

                          <td class="text-center">
                            <form method = 'POST' action='edit_user.php'>
                            <input type = 'text' hidden  name = 'id_user' value= '<?=$data['id_user']?>'>
                            <button type = 'submit' class='btn btn-success' name='btnedit'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>Edit Akun
                            </button>
                            </form>
                          </td>
                        
                           
                            <!---TOMBOL HAPUS--->

                            <td class="text-center">
                                <form onsubmit="return confirm('Anda yakin mau menghapus data pengguna?')" action="hapus_pengguna.php" method="POST">
                                <input type = 'text' hidden name ='id_user' id="id_user" value= <?=$data['id_user']?>>
                                <button type = 'submit' class='btn btn-danger' name='btnhapus'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                    </svg>Hapus Akun</button>
                                </form>
                            </td>
                          </tr>
                        </tbody>
                        <?php $i++;  }?>
                    </table>
                </div>
                </ul>
            </div>




        <script src="../js/jquery-3.6.0.min.js"></script>
        <script src="../js/bootstrap.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.2.1/sweetalert2.min.js"></script>
    </body>

    
</html>