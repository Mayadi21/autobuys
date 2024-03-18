-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Des 2023 pada 14.26
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autobuys`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kategori`) VALUES
(2, 'Rumah'),
(3, 'Buku'),
(5, 'Tanah'),
(6, 'Transportasi'),
(10, 'Teknologi'),
(11, 'Alat Rumah tangga'),
(14, 'Perhiasan'),
(17, 'Pakaian'),
(18, 'Sepatu'),
(19, 'Barang Antik'),
(20, 'Karya Seni');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_komentar`
--

CREATE TABLE `tb_komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_komentar` date NOT NULL,
  `komentar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_komentar`
--

INSERT INTO `tb_komentar` (`id_komentar`, `id_produk`, `id_user`, `tgl_komentar`, `komentar`) VALUES
(2, 13, 28, '2023-12-19', 'Ini rumahnya ada basement gak?'),
(3, 18, 20, '2023-12-19', 'Bisa dipercepat gak ini lelangnya?!!'),
(4, 18, 6, '2023-12-19', 'Gilakkk... Kalung apaan 2 milyar harganya'),
(5, 27, 6, '2023-12-21', 'Gitar 1,4 milyar cuma untuk digenjreng :)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelelangan`
--

CREATE TABLE `tb_pelelangan` (
  `id_lelang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga_lelang` bigint(20) NOT NULL,
  `tgl_melelang` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pelelangan`
--

INSERT INTO `tb_pelelangan` (`id_lelang`, `id_user`, `id_produk`, `harga_lelang`, `tgl_melelang`) VALUES
(1, 5, 5, 85000, '2023-12-02'),
(3, 6, 5, 95000, '2023-12-04'),
(4, 5, 3, 120000000, '2023-12-05'),
(7, 8, 4, 220000, '2023-12-06'),
(11, 4, 12, 250000000, '2023-12-11'),
(17, 26, 4, 250000, '2023-12-12'),
(18, 8, 21, 280000000000, '2023-12-14'),
(19, 8, 23, 850000000, '2023-12-18'),
(20, 8, 27, 1700000000, '2023-12-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pemenang`
--

CREATE TABLE `tb_pemenang` (
  `id_pemenang` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `harga_lelang` bigint(20) NOT NULL,
  `tgl_melelang` date NOT NULL,
  `status_bayar` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pemenang`
--

INSERT INTO `tb_pemenang` (`id_pemenang`, `id_produk`, `id_user`, `harga_lelang`, `tgl_melelang`, `status_bayar`) VALUES
(1, 3, 5, 120000000, '2023-12-05', 'DIBAYAR'),
(2, 12, 4, 250000000, '2023-12-11', ''),
(3, 27, 8, 1700000000, '2023-12-21', 'DIBAYAR');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesan`
--

CREATE TABLE `tb_pesan` (
  `id_pesan` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `isi_pesan` varchar(255) NOT NULL,
  `status_pesan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pesan`
--

INSERT INTO `tb_pesan` (`id_pesan`, `username`, `tgl_pesan`, `isi_pesan`, `status_pesan`) VALUES
(3, 'michael15', '2023-12-07', 'Admin nya udah makan belum? jangan tubes teruss', 'SELESAI'),
(4, 'maharani', '2023-12-05', 'kenapa setiap login itu, aku mikirinnya kamu yaa?', 'SELESAI'),
(5, 'johndoe12', '2023-12-08', 'Tubesnya kenapa Gakk siap-siappp???', ''),
(6, 'ahmaddd', '2023-12-19', 'Orang pintar All-in Prabowooo', ''),
(7, 'budi123', '2023-12-21', 'front-end lelangnya jelek!!', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga_awal` bigint(20) NOT NULL,
  `harga_lelang` bigint(20) NOT NULL,
  `gambar_produk` varchar(255) NOT NULL,
  `deskripsi_produk` longtext DEFAULT NULL,
  `tgl_awal_lelang` date NOT NULL,
  `tgl_akhir_lelang` date NOT NULL,
  `status_lelang` varchar(14) DEFAULT NULL,
  `pengunjung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga_awal`, `harga_lelang`, `gambar_produk`, `deskripsi_produk`, `tgl_awal_lelang`, `tgl_akhir_lelang`, `status_lelang`, `pengunjung`) VALUES
(3, 6, 'Mobil Rubicon', 100000000, 120000000, '6567552431d79.png', '<p>Jeep Rubicon 4 door Mobil merupakan SUV terbaru dari Jeep, Wrangler, hadir dengan 5 varian. Varian tertinggi hadir dengan mesin Petrol 1998 cc, yang mampu menghasilkan tenaga hingga 269 hp dan torsi puncak 400 Nm. Wrangler Rubicon 4-Door berkapasitas 5-penupang dibekali juga dengan transmisi 8-Speed Automatic. Sistem keamanannya dibekali Central Locking &amp; Anti Theft Device. Jeep Wrangler tersedia dalam pilihan mesin Bensin di Indonesia SUV baru dari Jeep hadir dalam 10 varian. Bicara soal spesifikasi mesin Jeep Wrangler, ini ditenagai dua pilihan mesin Bensin berkapasitas 1998 cc. Wrangler tersedia dengan transmisi Otomatis tergantung variannya. Wrangler adalah SUV 4 dan 5 seater dengan panjang 4785 mm, lebar 1874 mm, wheelbase 3007 mm.</p>\r\n', '2023-12-01', '2023-12-05', 'BERAKHIR', 3),
(4, 11, 'Kambrook Hand Blender New', 200000, 250000, '6567573b667fc.png', 'Authentic Kambrook hand blender impor Australia.\r\nSticknya dari stainless steel ya Guys, gak khawatir buat ngeblend hidangan yg masih panas.\r\nWattage nya jg gak gede ya, cuma 250 watt.\r\nBox nya udah gak sesempurna baru ya, sudah terkena dampak ekspedisi cargo. Tapi isinya dijamin baru.\r\nDapat attachments sesuai di foto ya.', '2023-12-02', '2024-04-05', '', 18),
(5, 3, 'Buku Atomic Habits By James Clear', 80000, 95000, '656758f8c9660.png', '<p>Original, Baru Dan Segel Sebuah sistem revolusioner untuk menjadi 1 persen lebih baik setiap hari. Orang mengira ketika Anda ingin mengubah hidup, Anda perlu memikirkan hal-hal besar. Namun pakar kebiasaan terkenal kelas dunia James Clear telah menemukan sebuah cara lain. Ia tahu bahwa perubahan nyata berasal dari efek gabungan ratusan keputusan kecil&mdash;dari mengerjakan dua push-up sehari, bangun lima menit lebih awal, sampai menahan sebentar hasrat untuk menelepon. Ia menyebut semua tadi atomic habits. Dalam buku terobosan ini, Clear pada hakikatnya mengungkapkan bagaimana perubahanperubahan sangat remeh ini dapat tumbuh menjadi hasil-hasil yang sangat mengubah hidup. Ia menyingkap beberapa trik sederhana dalam hidup kita (seni Menumpuk Kebiasaan yang terlupakan, kekuatan tak terduga Aturan Dua Menit, atau trik untuk masuk ke dalam Zona Goldilocks), dan menggali ke dalam teori psikologi dan neurosains paling baru untuk menerangkan mengapa semua itu penting. Dalam rangka itu, ia menceritakan kisah-kisah inspiratif para peraih medali emas Olimpiade, para CEO terkemuka, dan ilmuwan-ilmuwan istimewa yang telah menggunakan sains tentang kebiasaan-kebiasaan kecil untuk tetap produktif, tetap termotivasi, dan bahagia. Perubahan-perubahan kecil ini akan mendatangkan pengaruh revolusioner pada karier Anda, hubungan pribadi Anda, dan hidup Anda.</p>\r\n', '2023-11-30', '2023-12-31', '', 10),
(12, 2, 'Rumah Lantai 2', 200000000, 250000000, '657552fc8d5f8.jpeg', '<p>Lelang rumah ukuran 55m x 70m.</p>\r\n\r\n<p>Lantai 2, kamar 4, kamar mandi 4, garansi mobil muat 3 mobil</p>\r\n\r\n<p>Latai keramik, bersih, terawat..</p>\r\n', '2023-12-03', '2023-12-10', 'BERAKHIR', 1),
(13, 2, 'VICTORIA TOWN HOUSE', 800000000, 800000000, '6576d9465a70b.jpeg', '<p>KOMPLEK VICTORIA<br />\r\nLOKASI: TITI KUNING, MEDAN JOHOR DEKAT UNDER PASS<br />\r\nLOKASI KOMPLEK LEBIH TINGGI DARI ASPAL JALAN RAYA MASUK KOMPLEK<br />\r\nLOKASI ASRI, UDARA SEGAR, TENANG &amp; NYAMAN<br />\r\nPOSISI: HOOK<br />\r\nLT: 4X16,5<br />\r\nLB: 96M2<br />\r\nKT: 3<br />\r\nKM: 2<br />\r\nLISTRIK: 5500WATT<br />\r\nAIR: PDAM<br />\r\nHADAP: UTARA, TIMUR<br />\r\n<br />\r\nFASILITAS:<br />\r\n- ONE GATE SYSTEM<br />\r\n- SECURITY 24 JAM<br />\r\n- GARDEN KOMPLEK<br />\r\n- ROW JALAN LEBAR<br />\r\n- UDARA BERSIH, TENANG &amp; AMAN<br />\r\n- DEKAT KE KOTA<br />\r\n- 1 MENIT KE PASAR TIKUNG<br />\r\n- 2 MENIT KE SEKOLAH PRIME ONE SCHOOL<br />\r\n- 3 MENIT KE SWALAYAN MAJU BERSAMA<br />\r\n- 3 MENIT KE SEKOLAH HARAPAN MANDIRI<br />\r\n- 3 MENIT KE RS MITRA SEJATI<br />\r\n- 4 MENIT KE ASRAMA HAJI<br />\r\n- 4 MENIT KE SEKOLAH WR SUPRATMAN 2<br />\r\n- 5 MENIT KE SWALAYAN SUZUYA KP BARU<br />\r\n- 6 MENIT KE GERBANG TOL AMPLAS<br />\r\n<br />\r\nBONUS:<br />\r\n- CANOPY DEPAN LEBAR 6METER<br />\r\n- CARPORT FULL KERAMIK<br />\r\n- PINTU MASUK 2 LAPIS, PINTU BESI &amp; KAYU<br />\r\n- FREE GORDEN DI TIAP JENDELA<br />\r\n- FULL FURNITURE, PARTISI/ MEJA BAR, KITCHEN SET, MASTER ROOM FURNITURE, FULL CUSTOM<br />\r\n- PEGANGAN TANGGA<br />\r\n- KOMPOR TANAM<br />\r\n- SANITARY MERK TOTO<br />\r\n- WATER HEATER<br />\r\n- FULL KERANKENG BESI DI LT 2 DI LAUNDRY ROOM &amp; SPACIOUS ROOM<br />\r\n- SAMPING RUMAH SANGAT ASRI DENGAN TAMAN MINI<br />\r\n<br />\r\nPLUS TAMBAHAN BONUS:<br />\r\n- AC 1,5PK<br />\r\n- AC 1PK (2 PCS)<br />\r\n- AC 0,5PK<br />\r\n- SOFA MEWAH</p>\r\n', '2023-12-11', '2024-01-11', '', 30),
(15, 18, 'SEPATU LARI ADIDAS', 200000, 200000, '657851965bfef.jpeg', '<p>SEPATU YANG COCOK DPAKAI SAAT BERLARI.<br />\r\n<strong>NYAMAN DAN ANTI SELIP</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>HARGA LELANG DIBUKA DARI HARGA 200 RIBU RUPIAH</p>\r\n', '2023-12-12', '2024-01-12', '', 25),
(18, 11, 'Salib Kecubung Putri Diana', 1900000000, 1900000000, '658058c11082d.jpeg', '<p>Salib Attalah.</p>\r\n\r\n<p>Liontin tahun 1920-an yang unik nan indah.</p>\r\n\r\n<p>Dikenakan beberapa kali oleh Putri Diana dan dikatakan sebagai salah satu perhiasan favoritnya.</p>\r\n\r\n<p>Januari ini dengan perkiraan 120.000 Euro atau sekitar 2 Milyar Rupiah</p>\r\n', '2024-01-02', '2024-01-04', 'BELUM DIMULAI', 8),
(20, 6, 'Azimut 66 Flybridge', 20000000000, 20000000000, '6582ffbd16079.jpeg', '&lt;p&gt;Manjakan mata Anda dengan lambung Blue Steel-nya, yang mencerminkan perairan biru yang dirancang untuk dinavigasi. Naiklah ke dek jati berwarna madu yang menghiasi dan membimbing tamunya untuk menikmati semua yang ditawarkannya &amp;ndash; mulai dari tempat duduk di dek belakang dengan kursi santai tipe chaise, atau alas berjemur di dek depan yang besar dengan tempat duduk tertutup yang dioperasikan secara hidrolik, atau jembatan layang terbesar yang terlihat. di kapal pesiar mana pun sebesar ini, ada banyak area untuk menikmati perjalanan. &lt;/p&gt;\r\n\r\n&lt;p&gt;Tidak diragukan lagi, kapal pesiar Azimut yang menakjubkan ini membuka indra terhadap kemungkinan eksplorasi dan penemuan dalam kenyamanan mewah saat Anda berlayar ke pulau-pulau dan sekitarnya.&lt;/p&gt;\r\n\r\n&lt;p&gt;Dengan desain empat kabin dan tiga kepala ditambah kabin dan kepala kru, terdapat banyak akomodasi untuk menghabiskan waktu lama di pantai Bahama yang diterangi matahari. Dapur yang lengkap ditambah dengan pemanggang jembatan layang dan bar basah, memudahkan memberi makan keluarga yang lapar.&lt;/p&gt;\r\n', '2023-12-20', '2023-12-30', '', 7),
(21, 20, 'Lukisan Salvator Mundi', 250000000000, 280000000000, '658301f1edf41.jpg', '<p>Lukisan Salvator Mundi dibuat tahun pada tahun 1490 dan selesai tahun 1500 oleh pelukis terkenal yaitu Leonardo Da Vinci.</p>\r\n\r\n<p>Lukisan Salvator Mundi menggambarkan sosok Yesus mengenakan gaun renaisans biru anakronistik, membuat tanda salib dengan tangan kanannya. Sementara, tangan kirinya memegang bola kristal transparan tanpa pembiasan, mengisyaratkan perannya sebagai Salvator Mundi dan mewakili &ldquo;bola langit&rdquo; dari surga.</p>\r\n', '2023-12-02', '2023-12-23', '', 10),
(22, 10, 'LENOVO IdeaPad 5 Pro 14ITL6', 200000, 200000, '65830914e043f.jpg', '&lt;p&gt;Processor: Intel Core i7-1165G7&lt;br /&gt;\r\nRAM: 16GB Soldered DDR4, SSD: 1TB&lt;br /&gt;\r\nVGA: NVIDIA GeForce MX450 2GB GDDR6&lt;br /&gt;\r\nUkuran Layar: 14 Inch 2.2K (2240 x 1400) IPS Non-touch&lt;br /&gt;\r\nKonektivitas: Wifi + Bluetooth, Operasi: Windows 10 Home + Office Home and Student 2019&lt;br /&gt;\r\nUnit Utama&lt;/p&gt;\r\n', '2023-12-20', '2023-12-28', '', 4),
(23, 5, 'Satu Bidang Tanah Kota Medan', 800000000, 850000000, '658312a923215.jpg', '&lt;p&gt;Luas : 477 m&lt;sup&gt;2&lt;/sup&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;br /&gt;\r\nLokasi : Jalan Pleno sudut Jalan Komisi E Desa/ Kelurahan Pulo Brayan Bengkel Baru Kecamatan Medan Timur Kota Medan Provinsi Sumatera Utara&lt;/p&gt;\r\n', '2023-12-20', '2024-01-02', '', 4),
(25, 17, 'Gaun \"Happy Birthday\" Marilyn Monroe', 1200000000, 1200000000, '6583bcdb61983.jpg', '&lt;p&gt;Pada tanggal 19 Mei 1962, Marilyn Monroe mengenakan gaun yang kini menjadi legenda untuk menyanyikan lagu &amp;quot;Selamat Ulang Tahun&amp;quot; yang seksi di perayaan ulang tahun ke-45 Presiden John F. Kennedy di Madison Square Garden.&lt;/p&gt;\r\n\r\n&lt;p&gt;Selama penampilannya, Monroe melepaskan mantel cerpelai putihnya di hadapan 15.000 tamu untuk memperlihatkan gaun khas Jean Louis yang &amp;ldquo;barely There&amp;rdquo;.&lt;/p&gt;\r\n\r\n&lt;p&gt;Pakaian itu&amp;mdash;berwarna kulit, tanpa bagian belakang, dan ditutupi dengan 6.000 berlian imitasi yang dijahit tangan&amp;mdash;begitu&amp;nbsp;&lt;em&gt;memalukan&lt;/em&gt; hingga dia menyebutnya &amp;ldquo;kulit dan manik-manik&amp;rdquo;.&lt;/p&gt;\r\n\r\n&lt;p&gt;Harga awal dibuka sebesar 1,2 milyar rupiah&lt;/p&gt;\r\n', '2023-12-21', '2023-12-31', '', 9),
(27, 19, 'Kurt Cobain’s Martin D-18E', 1400000000, 1700000000, '6583c2d92af65.jpg', '<p>Gitar akustik dengan seri Martin D-18E 1959 dengan desain klasik itu dipakai oleh Kurt Cobain yang merupakan gitaris sekaligus vokalis dari grup band Nirvana.</p>\r\n', '2023-12-02', '2023-12-14', 'BERAKHIR', 19),
(28, 2, 'Rumah komplek JCity JElite Medan', 600000000, 600000000, '6583fc7e8173e.jpg', '&lt;p&gt;Bingung cari rumah murah ditengah kota Medan?&lt;/p&gt;\r\n\r\n&lt;p&gt;Muraah!! .. ada nih lokasi persis daerah Johor dan dekat ringroad ah nasution (asrama haji)&lt;/p&gt;\r\n\r\n&lt;p&gt;Di dalam Komplek JCITY Cluster J-ELITE&lt;br /&gt;\r\nJl Karya Wisata , Johor Kota Medan&lt;/p&gt;\r\n\r\n&lt;p&gt;1 unit saja&lt;br /&gt;\r\nRumah SIAP HUNI DAN CANTIK&lt;/p&gt;\r\n\r\n&lt;p&gt;Spesifikasi:&lt;br /&gt;\r\n- 2,5 lnt&lt;br /&gt;\r\n- 3 Kt + 2 KM&lt;br /&gt;\r\n- R tamu&lt;br /&gt;\r\n- Dapur&lt;br /&gt;\r\n- R Makan&lt;br /&gt;\r\n- Pagar dan gerbang&lt;br /&gt;\r\n-Teras full canopy&lt;br /&gt;\r\n- SHM, IMB&lt;br /&gt;\r\n- Dinding Wallpaper&lt;br /&gt;\r\n- Ruang cuci dan jemur di lantai atas&lt;br /&gt;\r\n- Listrik 2200 Watt&lt;br /&gt;\r\n- Air PDAM&lt;br /&gt;\r\n- ROW jalan lebar selisih 2 mobil&lt;/p&gt;\r\n\r\n&lt;p&gt;Plus beberapa perabot tinggal :&lt;br /&gt;\r\n- AC 2 unit&lt;br /&gt;\r\n- Kitchenset Dapur&lt;br /&gt;\r\n- Kompor Gas Tanam&lt;br /&gt;\r\n- Tong Air Pinguin 1000 liter&lt;br /&gt;\r\n- Water heater&lt;br /&gt;\r\n- Kipas angin cantik&lt;/p&gt;\r\n', '2023-12-24', '2024-02-29', 'BELUM DIMULAI', 0),
(30, 20, 'Lukisan The Scream', 4000000000, 4000000000, '658405bcf0c62.jpg', '', '2023-12-02', '2023-12-31', '', 0),
(31, 19, 'Perangko British Guiana 1c Magenta', 250000000, 250000000, '65840c5c32d71.jpeg', '&lt;p&gt;Prangko tersebut, dicetak di atas kertas magenta dan berukuran 29 x 26 mm, bergambar kapal bertiang tiga dan semboyan koloni, &amp;quot;Kami memberi dan mengharapkan imbalan&amp;quot;.&lt;/p&gt;\r\n\r\n&lt;p&gt;Perangko ini mulai beredar pada tahun 1856, ketika pengiriman prangko dari London tertunda dan kepala kantor pos koloni tersebut meminta percetakan untuk membuat tiga jenis prangko sementara sampai kiriman tiba.&lt;/p&gt;\r\n\r\n&lt;p&gt;Begitu tiba, kepala kantor pos memerintahkan agar prangko tersebut dikeluarkan dari peredaran - tetapi salah satu prangko seharga satu sen masih ada.&lt;/p&gt;\r\n\r\n&lt;p&gt;Ditemukan sekitar 20 tahun kemudian dan dikembalikan ke Inggris untuk waktu yang singkat, namun kemudian dikirim untuk koleksi ke luar negeri.&lt;/p&gt;\r\n\r\n&lt;p&gt;Setibanya di Bandara Heathrow, pesawat tersebut akan dijemput oleh truk lapis baja dan akan dipajang di toko Stanley Gibbons di London dalam rangka tanpa oksigen yang dipesan secara khusus.&lt;/p&gt;\r\n', '2023-12-24', '2024-01-23', 'BELUM DIMULAI', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(120) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `nama`, `email`, `password`, `level`) VALUES
(3, 'admin', '--Admin Web--', 'admin@gmail.com', '$2y$10$d2oSSahfBcYIB5vW7hxmqOGOaCU7iseNzrO.4PNreXY./mkESK1/y', 2),
(4, 'budi123', 'Budi Jaya', 'budi@gmail.com', '$2y$10$o7wTeMiINSrGHe.hBXZfyOMqqz5dlDV8FJH2bHTdnEoobteF8KCGa', 1),
(5, 'joygrace34', 'Joy Grace', 'joy@gmail.com', '$2y$10$Siv984R4Y5PAbHnODThZouA/jgxFrHXF0eCHp8slyFYOWiIY.tu0m', 1),
(6, 'ahmaddd', 'Ahmad Sutanto', 'ahmad@gmail.com', '$2y$10$ui6es6BHbE1kCHa8GeXrku4EX9ofV68Ejw6wiU/ydIVx0Adpv/jWu', 1),
(8, 'michael', 'Michael', 'michael@gmail.com', '$2y$10$UtEJmPw1B52KIXwKDAOU2e20a1GfOn.Z4pK3HhQvx2SZpUEjMxyF.', 1),
(19, 'rifkyyy', 'Rifky Ghofir', 'rifky@gmail.com', '$2y$10$4dm/UWgD2gVAOo4a2V1v2OTyQeGT0a7Tq3aAwGRPk4x/7t/tesuta', 1),
(20, 'maharani', 'Mila Rani ', 'mila@mail', '$2y$10$vREQqXFk8wUsqf3t.T0nDOtDVM6KlW0R4E72RGfWr3ISupBedcuqy', 1),
(22, 'zalfazhr', 'Zalfa Zahira', 'zahira@gmail.com', '$2y$10$Yzq7VuUSgHBv3.KkSVVaHOGK8S5KkgENSsgOmIDQfBQuRoIvvaamS', 1),
(26, 'euuu15', 'Euprasia Situmorang', 'euprac@gmail.com', '$2y$10$8xdQaULQxpjjfJdN/jC.Befk1PpjMDGz9H./ZHX5UVBPRQ25r63Gq', 1),
(27, 'adminmay', '--min Mayadi--', 'mayyy@gmail.com', '$2y$10$iTVWm3YZTA6sMpWnpautzuiEFilaqL3yxbGGnZwj6.b2tNlT0Gjm.', 2),
(28, 'jeremia', 'Jeremia Sitinjak', 'jeremia10@gmail.com', '$2y$10$YjyURIDVAcnYigZWA7QIReLs3AkRmVA1PDemHa0bgcmpb8hEmxFcO', 1),
(29, 'imbane', 'Brisbane', 'imbane@gmail.com', '$2y$10$H9i.324xlM21LWQr1uo0IeUxbxGk4n0jlWF9tSzSJOisb713LbGp6', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_pelelangan`
--
ALTER TABLE `tb_pelelangan`
  ADD PRIMARY KEY (`id_lelang`),
  ADD KEY `id_lelang` (`id_lelang`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_pemenang`
--
ALTER TABLE `tb_pemenang`
  ADD PRIMARY KEY (`id_pemenang`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_pesan`
--
ALTER TABLE `tb_pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indeks untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_komentar`
--
ALTER TABLE `tb_komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_pelelangan`
--
ALTER TABLE `tb_pelelangan`
  MODIFY `id_lelang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_pemenang`
--
ALTER TABLE `tb_pemenang`
  MODIFY `id_pemenang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_pesan`
--
ALTER TABLE `tb_pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD CONSTRAINT `tb_komentar_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_komentar_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pelelangan`
--
ALTER TABLE `tb_pelelangan`
  ADD CONSTRAINT `tb_pelelangan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pelelangan_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD CONSTRAINT `tb_produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
