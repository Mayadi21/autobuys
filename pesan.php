<?php
require_once 'koneksi.php';




							$username = $_POST['username'];
							$password = $_POST['password'];
							$pesan = $_POST['pesan'];
							$tglpesan = $_POST['tglpesan'];
            				

							$sql = "INSERT INTO tb_pesan(username,tgl_pesan,isi_pesan,status_pesan) VALUES('$username','$tglpesan','$pesan','')";
							
							if($koneksi->query($sql)===TRUE){ ?>

								<script>
                                    alert('Pengiriman Pesan Berhasil. Silakan login ke akun anda');
                                    document.location.href='index.php';
                                </script>";
							<?php
                            }
							else{
								echo "Terjadi kesalahan".$sql."<br>".$koneksi->error;
							}
                            ?>

