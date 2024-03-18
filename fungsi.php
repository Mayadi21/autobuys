<?php

include 'koneksi.php';

function tambah_produk($produk)
{
    global $koneksi;
    $nama_produk = $_POST['nama_produk'];
    $id_kategori = $_POST['id_kategori'];
    $deskripsi_produk = htmlspecialchars($produk["deskripsi_produk"]);
    $harga_produk = htmlspecialchars($produk["harga_produk"]);
    $tgl_awal_lelang = $_POST['tgl_awal_lelang'];
    $tgl_akhir_lelang = $_POST['tgl_akhir_lelang'];
    $gambar = upload_gambar();

    // Validasi tanggal
    $validationMessage = validasiTanggal($nama_produk, $harga_produk, $deskripsi_produk, $tgl_awal_lelang, $tgl_akhir_lelang, $id_kategori);

    // Jika ada pesan validasi, tampilkan pesan tersebut dan hentikan proses
    if (!empty($validationMessage)) {
        echo "<script>
        alert('$validationMessage');
        </script>";
        return false;
    }

    // Dapatkan tanggal saat ini
    $tanggal_sekarang = date('Y-m-d');

    if (!$gambar) {
        return false;
    }

    if ($tanggal_sekarang == $tgl_awal_lelang){
        $insert = "INSERT INTO tb_produk (nama_produk, id_kategori, deskripsi_produk, harga_awal, harga_lelang, gambar_produk, tgl_awal_lelang, tgl_akhir_lelang, status_lelang)
        VALUES ('$nama_produk', '$id_kategori', '$deskripsi_produk',$harga_produk, $harga_produk, '$gambar', '$tgl_awal_lelang','$tgl_akhir_lelang', '')";
        mysqli_query($koneksi, $insert);
    }

    else{
        $insert = "INSERT INTO tb_produk (nama_produk, id_kategori, deskripsi_produk, harga_awal, harga_lelang, gambar_produk, tgl_awal_lelang, tgl_akhir_lelang, status_lelang)
        VALUES ('$nama_produk', '$id_kategori', '$deskripsi_produk',$harga_produk, $harga_produk, '$gambar', '$tgl_awal_lelang','$tgl_akhir_lelang', 'BELUM DIMULAI')";
        mysqli_query($koneksi, $insert);
    }

    return mysqli_affected_rows($koneksi);
}

// Fungsi untuk memeriksa apakah tanggal_akhir lebih dari seminggu setelah tanggal_awal
function isTanggalValid($tanggal_awal, $tanggal_akhir) {
    $tgl_awal = new DateTime($tanggal_awal);
    
    $tgl_akhir_lelang = new DateTime($tanggal_akhir);
    $selisih = $tgl_awal->diff($tgl_akhir_lelang)->days;

    return $selisih >= 7;
}

// Fungsi untuk memeriksa apakah tanggal_awal tidak kurang dari tanggal hari ini
function isTanggalAwalValid($tgl_awal_lelang) {
    $tgl_hari_ini = new DateTime();
    $tgl_awal_lelang = new DateTime($tgl_awal_lelang);
    $tgl_awal_lelang->modify('+1 day');


    return $tgl_awal_lelang >= $tgl_hari_ini;
}

// Fungsi untuk melakukan validasi form
function validasiTanggal($nama_produk, $harga_produk, $deskripsi_produk, $tgl_awal_lelang, $tgl_akhir_lelang, $id_kategori) {
    // Lakukan validasi tanggal
    if (!isTanggalAwalValid($tgl_awal_lelang)) {
        return "Tanggal dimulainya Lelang harus minimal hari ini!.";
    } elseif (!isTanggalValid($tgl_awal_lelang, $tgl_akhir_lelang)) {
        return "Tanggal Akhir Lelang harus minimal seminggu setelah Tanggal Mulai Lelang.";
    }

    // Jika semua validasi berhasil, kembalikan string kosong
    return "";
}

function upload_gambar()
{
    $namaFile = $_FILES['gambar_produk']['name'];
    $ukuranFile = $_FILES['gambar_produk']['size'];
    $error = $_FILES['gambar_produk']['error'];
    $tmpName = $_FILES['gambar_produk']['tmp_name'];

    //cek apakah tidak ada gambar yang di upload
    if ($error===4) {
        echo "<script>
        alert('Pilih gambar terlebih dahulu!');
        </script>"; 

        return false;
    }


    //cek apakah yang di upload adalah gambar
    $ekstensiGambarValid = ['jpg','jpeg','png'];

    $ekstensiGambar = explode('.',$namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if ( !in_array($ekstensiGambar,$ekstensiGambarValid)) {
        
        echo "<script>
        alert('yang Anda upload bukan gambar!');
        </script>"; 

        return false;
    }

    if ($ukuranFile > 2000000) {
        echo "<script>
        alert('ukuran gambar terlalu besar!!');
        </script>"; 

        return false;
    }

    //lolos pengecekan , gambar siap di upload

    // generate nama baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName,'../assets/img/'.$namaFileBaru);

    return $namaFileBaru;

}

// Fungsi untuk menjalankan query
if (!function_exists('query')) {
    function query($data){
    
        global $koneksi ;
        
        $query = mysqli_query($koneksi,$data);
        
        $lingkup = [];
        while($ambil= mysqli_fetch_assoc($query))
        {
            $lingkup[] = $ambil;
        
        }
        return $lingkup;
        
        }
}




//tambah pengguna
function tambah_user($pengguna){
    global $koneksi;
    $nama=htmlspecialchars($pengguna["nama"]);
    $email=htmlspecialchars($pengguna["email"]);
    $password=htmlspecialchars($pengguna["password"]);
    $username=htmlspecialchars($pengguna["username"]);
    $level=$pengguna["level"];


    // cek username sudah ada atau belum
    $result = mysqli_query($koneksi, "SELECT username FROM users WHERE username='$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('username tersebut sudah ada! Silahkan pilih username lain');
        document.location.href='lihat_user.php';
        </script>"; 

        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    //TAMBAHKAN USER BARU KE DATABASE
    mysqli_query($koneksi,"INSERT INTO users VALUES('','$username','$nama','$email','$password','$level')");

    return mysqli_affected_rows($koneksi);
   
}


function edit($data)
{
    global $koneksi;


    $id = $data["id_user"];
    $username = htmlspecialchars($data["username"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $level = htmlspecialchars($data["level"]);


   
    
    $query = "UPDATE users SET
                username = '$username',
                nama = '$nama',
                email = '$email',
                level = '$level',
            WHERE id_user = '$id';
    ";

    mysqli_query($koneksi,$query);

    return mysqli_affected_rows($koneksi);
}



// function edit_komentar($data)
// {
//     global $koneksi;


//     $id_pengguna = $_SESSION['id_pengguna'];
//     $id_komentar = $data['id_komentar'];
//     $id_artikel = $data["id_artikel"];
//     $komentar = htmlspecialchars($data["komentar"]);
//     $tanggal = date("Y-m-d");
   

//     $query = "UPDATE tb_komentar SET
//                 komentar = '$komentar',
//                 tanggal = '$tanggal'
//             WHERE id_komentar = $id_komentar AND id_pengguna='$id_pengguna' AND id_artikel='$id_artikel'
//     ";

//     mysqli_query($koneksi,$query);

//     return mysqli_affected_rows($koneksi);
// }



function ubah_kategori($data)
{
    global $koneksi;


    $id = $data["id"];
    $tag = htmlspecialchars($data["tag"]);
    
    
    $query = "UPDATE tb_tag SET
                tag = '$tag'
            WHERE id_tag = $id;
    ";

    mysqli_query($koneksi,$query);

    return mysqli_affected_rows($koneksi);
}
function tambah_kategori($data)
{
    global $koneksi;

    $tag = htmlspecialchars($data["tag"]);
    
    
    mysqli_query($koneksi,"INSERT INTO tb_tag VALUES('','$tag')");

    return mysqli_affected_rows($koneksi);
}


function tambah_komentar($data)
{
    global $koneksi;
    $id_user = $data['id_user'];
    $tgl_komentar = date("Y-m-d");
    $isi_komentar = htmlspecialchars($data["isi_komentar"]);

    $query = "INSERT INTO tb_komentar (id_komentar, id_produk, id_user, tgl_komentar, komentar) 
    VALUES ('', '$_POST[id_produk]', '$id_user', '$tgl_komentar', '$isi_komentar')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}




// function cari($key)
// {
//     $que = "SELECT *
//     FROM tb_produk 
//     JOIN tb_kategori ON tb_produk.id_kategori = tb_kategori.id_kategori
//     WHERE 
//     tb_produk.nama_produk LIKE 'mobil' OR 
//     tb_produk.harga_lelang LIKE 'mobil' OR 
//     tb_kategori.kategori LIKE 'mobil'
//     ";

//     return query($que);
// }

// function query_cari($data){
    
//     global $koneksi ;
    
//     $query = mysqli_query($koneksi,$data);
    
//     $result = [];
//     while($ambil= mysqli_fetch_assoc($query))
//     {
//         $result[] = $ambil;
    
//     }
//     return $result;
    
//     }


function editProduk($data)
{
    global $koneksi;


    $id = $data["id_produk"];
    $nama = htmlspecialchars($data["nama_produk"]);
    $harga_awal = htmlspecialchars($data["harga_awal"]);
    $deskripsi = htmlspecialchars($data["deskripsi_produk"]);
    $tgl_awal = ($data["tgl_awal_lelang"]);
    $tgl_akhir = ($data["tgl_akhir_lelang"]);
    $kategori = ($data["id_kategori"]);




    
    $query = "UPDATE tb_produk SET
                nama_produk = '$nama',
                harga_awal = '$harga_awal',
                deskripsi_produk = '$deskripsi',
                tgl_awal_lelang = '$tgl_awal',
                tgl_akhir_lelang = '$tgl_akhir',
            WHERE id_produk = $id;
    ";

    mysqli_query($koneksi,$query);

    return mysqli_affected_rows($koneksi);
}
    ?>
