<?php
require_once 'koneksi.php';




							$username = $_POST['username'];
							$pass = $_POST['password'];
							$nama = $_POST['nama'];
							$email = $_POST['email'];
            				$level = 1;
							$password = password_hash($pass,PASSWORD_DEFAULT);

							// cek username sudah ada atau belum
							$result = mysqli_query($koneksi, "SELECT username FROM users WHERE username='$username'");
							if (mysqli_fetch_assoc($result)) {
								echo "<script>
									alert('Username tersebut sudah ada! Silahkan pilih username lain');
									document.location.href='index.php';
									</script>";
								exit;
					
							}

							// cek nama sudah ada atau belum
							$cek_nama = mysqli_query($koneksi, "SELECT nama FROM users WHERE nama='$nama'");
							if (mysqli_fetch_assoc($cek_nama)) {
								echo "<script>
									alert('Nama tersebut sudah ada! Silahkan pilih nama lain');
									document.location.href='index.php';
									</script>";
								exit;
					
							}

							$sql = "INSERT INTO users(username,password,nama,email,level) VALUES('$username','$password','$nama','$email','$level')";
							
							if($koneksi->query($sql)===TRUE){ ?>

								<script>alert('Pendaftaran Berhasil. Silakan login ke akun anda');
								document.location.href='index.php';
								</script>
							
							<?php								
							}
							else{
								echo "Terjadi kesalahan".$sql."<br>".$koneksi->error;
							}
?>







