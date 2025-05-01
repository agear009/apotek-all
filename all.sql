-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Des 2024 pada 23.55
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `all`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aset_kantors`
--

CREATE TABLE `aset_kantors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `pemilik` varchar(255) NOT NULL,
  `harga` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `beritas`
--

CREATE TABLE `beritas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `source` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `beritas`
--

INSERT INTO `beritas` (`id`, `category`, `image`, `title`, `content`, `author`, `source`, `created_at`, `updated_at`) VALUES
(2, 'Kesehatan', 'lYezyA4ctZx5ZiADoOZZFCJSc8MEsY4pN7W5okvD.jpg', 'kesehatan penting', '<article class=\"w-full scroll-mb-[var(--thread-trailing-height,150px)] text-token-text-primary focus-visible:outline-2 focus-visible:outline-offset-[-4px]\" dir=\"auto\" data-testid=\"conversation-turn-5\" data-scroll-anchor=\"false\">\r\n<div class=\"m-auto text-base py-[18px] px-3 md:px-4 w-full md:px-5 lg:px-4 xl:px-5\">\r\n<div class=\"mx-auto flex flex-1 gap-4 text-base md:gap-5 lg:gap-6 md:max-w-3xl\">\r\n<div class=\"group/conversation-turn relative flex w-full min-w-0 flex-col agent-turn\">\r\n<div class=\"flex-col gap-1 md:gap-3\">\r\n<div class=\"flex max-w-full flex-col flex-grow\">\r\n<div class=\"min-h-8 text-message flex w-full flex-col items-end gap-2 whitespace-normal break-words text-start [.text-message+&amp;]:mt-5\" dir=\"auto\" data-message-author-role=\"assistant\" data-message-id=\"8f28c67a-c488-4660-b9f4-9dd3def7413a\" data-message-model-slug=\"gpt-4o-mini\">\r\n<div class=\"flex w-full flex-col gap-1 empty:hidden first:pt-[3px]\">\r\n<div class=\"markdown prose w-full break-words dark:prose-invert dark\">\r\n<p>Untuk mengganti kode KBLI (Klasifikasi Baku Lapangan Usaha Indonesia) di sistem OSS (Online Single Submission), Anda perlu mengikuti langkah-langkah berikut:</p>\r\n<h3>1. <strong>Login ke Akun OSS</strong></h3>\r\n<ul>\r\n<li>Kunjungi situs OSS di <a target=\"_new\" rel=\"noopener\">https://oss.go.id/</a>.</li>\r\n<li>Login menggunakan akun yang sudah terdaftar (Username dan Password atau menggunakan tanda tangan elektronik).</li>\r\n</ul>\r\n<h3>2. <strong>Masuk ke Dashboard</strong></h3>\r\n<p>Setelah login, Anda akan diarahkan ke <strong>dashboard</strong> yang berisi informasi terkait izin usaha yang terdaftar.</p>\r\n<h3>3. <strong>Pilih Izin Usaha yang Ingin Diubah</strong></h3>\r\n<ul>\r\n<li>Pada dashboard, pilih <strong>Izin Usaha</strong> yang ingin Anda ubah kode KBLI-nya.</li>\r\n<li>Klik pada izin yang dimaksud untuk membuka rincian dan pengaturan izin usaha.</li>\r\n</ul>\r\n<h3>4. <strong>Edit Data Izin Usaha</strong></h3>\r\n<ul>\r\n<li>Di halaman rincian izin usaha, cari dan klik opsi untuk <strong>mengedit</strong> atau <strong>memperbarui</strong> data izin usaha.</li>\r\n<li>Biasanya terdapat tombol atau menu yang memungkinkan Anda mengubah informasi terkait KBLI atau jenis usaha.</li>\r\n</ul>\r\n<h3>5. <strong>Ganti Kode KBLI</strong></h3>\r\n<ul>\r\n<li>Setelah masuk ke halaman pengeditan, cari kolom yang mencantumkan <strong>kode KBLI</strong>.</li>\r\n<li>Pilih atau masukkan kode KBLI yang baru sesuai dengan jenis usaha Anda, misalnya untuk jasa pembuatan website, pilih <strong>62010</strong> atau kode KBLI yang relevan dengan usaha Anda.</li>\r\n</ul>\r\n<h3>6. <strong>Simpan Perubahan</strong></h3>\r\n<ul>\r\n<li>Setelah mengganti kode KBLI, pastikan untuk <strong>menyimpan</strong> atau <strong>mengupdate</strong> data yang telah diperbarui.</li>\r\n<li>Beberapa perubahan mungkin membutuhkan <strong>verifikasi atau persetujuan</strong> dari instansi terkait, jadi pastikan informasi yang dimasukkan sudah benar.</li>\r\n</ul>\r\n<h3>7. <strong>Cetak Izin Usaha yang Diperbarui</strong></h3>\r\n<ul>\r\n<li>Setelah perubahan disetujui (jika ada), Anda bisa mencetak dokumen <strong>izin usaha</strong> yang telah diperbarui dengan kode KBLI yang baru.</li>\r\n</ul>\r\n<h3>8. <strong>Konsultasikan ke Petugas OSS (Jika Diperlukan)</strong></h3>\r\n<p>Jika Anda mengalami kesulitan atau perlu klarifikasi lebih lanjut, Anda dapat menghubungi petugas OSS atau mendatangi kantor DPMPTSP setempat untuk mendapatkan panduan lebih lanjut.</p>\r\n<p>Dengan mengikuti langkah-langkah di atas, Anda dapat mengganti kode KBLI di sistem OSS dengan mudah. Pastikan bahwa perubahan kode KBLI sesuai dengan jenis usaha yang dijalankan.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"mb-2 flex gap-3 empty:hidden -ml-2\">\r\n<div class=\"items-center justify-start rounded-xl p-1 z-10 -mt-1 bg-token-main-surface-primary md:absolute md:sr-only\">\r\n<div class=\"flex items-center\">&nbsp;</div>\r\n</div>\r\n</div>\r\n<div class=\"pr-2 lg:pr-0\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</article>\r\n<article class=\"w-full scroll-mb-[var(--thread-trailing-height,150px)] text-token-text-primary focus-visible:outline-2 focus-visible:outline-offset-[-4px]\" dir=\"auto\" data-testid=\"conversation-turn-6\" data-scroll-anchor=\"false\">\r\n<h5 class=\"sr-only\">Anda bilang:</h5>\r\n<div class=\"m-auto text-base py-[18px] px-3 md:px-4 w-full md:px-5 lg:px-4 xl:px-5\">\r\n<div class=\"mx-auto flex flex-1 gap-4 text-base md:gap-5 lg:gap-6 md:max-w-3xl\">\r\n<div class=\"group/conversation-turn relative flex w-full min-w-0 flex-col\">\r\n<div class=\"flex-col gap-1 md:gap-3\">\r\n<div class=\"flex max-w-full flex-col flex-grow\">\r\n<div class=\"min-h-8 text-message flex w-full flex-col items-end gap-2 whitespace-normal break-words text-start [.text-message+&amp;]:mt-5\" dir=\"auto\" data-message-author-role=\"user\" data-message-id=\"aaa2f823-903a-400c-87d2-a5c8ba00df4f\">\r\n<div class=\"flex w-full flex-col gap-1 empty:hidden items-end rtl:items-start\">\r\n<div class=\"relative max-w-[var(--user-chat-width,70%)] rounded-3xl bg-token-message-surface px-5 py-2.5\">\r\n<div class=\"whitespace-pre-wrap\">artikel kesehatan</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</article>\r\n<article class=\"w-full scroll-mb-[var(--thread-trailing-height,150px)] text-token-text-primary focus-visible:outline-2 focus-visible:outline-offset-[-4px]\" dir=\"auto\" data-testid=\"conversation-turn-7\" data-scroll-anchor=\"true\">\r\n<h6 class=\"sr-only\">ChatGPT bilang:</h6>\r\n<div class=\"m-auto text-base py-[18px] px-3 md:px-4 w-full md:px-5 lg:px-4 xl:px-5\">\r\n<div class=\"mx-auto flex flex-1 gap-4 text-base md:gap-5 lg:gap-6 md:max-w-3xl\">\r\n<div class=\"flex-shrink-0 flex flex-col relative items-end\">\r\n<div>\r\n<div class=\"pt-0\">\r\n<div class=\"gizmo-bot-avatar flex h-8 w-8 items-center justify-center overflow-hidden rounded-full\">\r\n<div class=\"relative p-1 rounded-sm flex items-center justify-center bg-token-main-surface-primary text-token-text-primary h-8 w-8\">ChatGPT</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"group/conversation-turn relative flex w-full min-w-0 flex-col agent-turn\">\r\n<div class=\"flex-col gap-1 md:gap-3\">\r\n<div class=\"flex max-w-full flex-col flex-grow\">\r\n<div class=\"min-h-8 text-message flex w-full flex-col items-end gap-2 whitespace-normal break-words text-start [.text-message+&amp;]:mt-5\" dir=\"auto\" data-message-author-role=\"assistant\" data-message-id=\"984177ee-b267-45d5-96c4-a0d7212f7845\" data-message-model-slug=\"gpt-4o-mini\">\r\n<div class=\"flex w-full flex-col gap-1 empty:hidden first:pt-[3px]\">\r\n<div class=\"markdown prose w-full break-words dark:prose-invert dark\">\r\n<p>Berikut adalah contoh artikel kesehatan yang membahas tentang pentingnya menjaga pola makan yang sehat:</p>\r\n<hr>\r\n<h3><strong>Pentingnya Menjaga Pola Makan Sehat untuk Kesehatan Tubuh</strong></h3>\r\n<p>Kesehatan adalah salah satu aspek terpenting dalam kehidupan manusia. Untuk itu, menjaga pola makan sehat merupakan langkah awal yang sangat penting dalam mencapai dan mempertahankan kesehatan tubuh yang optimal. Pola makan yang baik tidak hanya mempengaruhi berat badan, tetapi juga berperan besar dalam mencegah berbagai penyakit, meningkatkan energi, dan memperpanjang usia.</p>\r\n<h4><strong>1. Pentingnya Nutrisi yang Seimbang</strong></h4>\r\n<p>Pola makan yang sehat mencakup asupan yang seimbang dari berbagai nutrisi penting, seperti karbohidrat, protein, lemak sehat, vitamin, dan mineral. Mengonsumsi berbagai jenis makanan dengan porsi yang tepat dapat membantu tubuh berfungsi secara maksimal.</p>\r\n<ul>\r\n<li><strong>Karbohidrat</strong> adalah sumber utama energi bagi tubuh, yang dapat ditemukan dalam sumber makanan seperti nasi, roti, dan kentang.</li>\r\n<li><strong>Protein</strong> diperlukan untuk memperbaiki dan membangun jaringan tubuh, termasuk otot dan sel-sel tubuh. Sumber protein yang baik meliputi daging tanpa lemak, ikan, telur, dan kacang-kacangan.</li>\r\n<li><strong>Lemak sehat</strong> berfungsi sebagai cadangan energi dan membantu penyerapan vitamin yang larut dalam lemak. Lemak sehat dapat ditemukan pada minyak zaitun, alpukat, dan kacang-kacangan.</li>\r\n<li><strong>Vitamin dan mineral</strong> sangat penting untuk mendukung berbagai fungsi tubuh, seperti sistem imun dan kesehatan tulang. Sayur dan buah adalah sumber terbaik dari nutrisi ini.</li>\r\n</ul>\r\n<h4><strong>2. Menghindari Makanan yang Tidak Sehat</strong></h4>\r\n<p>Selain mengonsumsi makanan bergizi, sangat penting untuk menghindari makanan yang dapat membahayakan kesehatan, seperti makanan tinggi gula, garam, dan lemak trans. Konsumsi makanan yang mengandung banyak bahan kimia tambahan atau pengawet juga harus dibatasi. Beberapa contoh makanan yang harus dihindari antara lain:</p>\r\n<ul>\r\n<li><strong>Makanan olahan</strong> yang kaya akan gula, lemak jenuh, dan garam, seperti makanan cepat saji.</li>\r\n<li><strong>Makanan manis berlebihan</strong>, seperti kue, permen, dan minuman manis yang dapat meningkatkan risiko diabetes dan obesitas.</li>\r\n<li><strong>Makanan tinggi lemak trans</strong>, yang sering ditemukan dalam makanan ringan kemasan atau makanan cepat saji, dapat meningkatkan risiko penyakit jantung.</li>\r\n</ul>\r\n<h4><strong>3. Manfaat Pola Makan Sehat untuk Kesehatan</strong></h4>\r\n<p>Menerapkan pola makan sehat memberikan banyak manfaat bagi tubuh, antara lain:</p>\r\n<ul>\r\n<li><strong>Menjaga berat badan yang sehat</strong>: Dengan mengatur jumlah kalori dan memilih makanan yang tepat, Anda dapat menghindari penambahan berat badan berlebih yang dapat menyebabkan obesitas.</li>\r\n<li><strong>Mencegah penyakit</strong>: Diet yang sehat dapat membantu mencegah penyakit kronis seperti diabetes tipe 2, hipertensi, dan penyakit jantung.</li>\r\n<li><strong>Meningkatkan energi</strong>: Nutrisi yang tepat membantu tubuh merasa lebih segar dan bertenaga sepanjang hari.</li>\r\n<li><strong>Meningkatkan kesehatan mental</strong>: Beberapa penelitian menunjukkan bahwa pola makan sehat juga berhubungan dengan peningkatan suasana hati dan kesehatan mental secara keseluruhan.</li>\r\n</ul>\r\n<h4><strong>4. Tips Memulai Pola Makan Sehat</strong></h4>\r\n<p>Memulai pola makan sehat tidak harus sulit. Berikut beberapa langkah sederhana yang dapat Anda lakukan:</p>\r\n<ul>\r\n<li><strong>Rencanakan menu makanan</strong> untuk seminggu penuh agar Anda bisa memilih makanan yang bergizi.</li>\r\n<li><strong>Kurangi makanan olahan</strong> dan lebih banyak mengonsumsi makanan segar, seperti buah, sayur, dan biji-bijian.</li>\r\n<li><strong>Perhatikan porsi makan</strong>: Jangan makan berlebihan, tetapi juga jangan terlalu sedikit. Makan dengan porsi seimbang penting untuk mendukung metabolisme tubuh.</li>\r\n<li><strong>Minum cukup air</strong>: Air putih sangat penting untuk hidrasi tubuh, membantu pencernaan, dan menjaga kulit tetap sehat.</li>\r\n</ul>\r\n<h4><strong>5. Kesimpulan</strong></h4>\r\n<p>Pola makan sehat adalah kunci utama untuk hidup sehat dan bugar. Dengan mengonsumsi makanan bergizi secara seimbang, menghindari makanan yang tidak sehat, dan menjaga pola makan teratur, Anda dapat meraih kualitas hidup yang lebih baik. Ingatlah bahwa perubahan kecil yang dilakukan secara konsisten akan memberikan dampak besar pada kesehatan Anda dalam jangka panjang.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</article>', 'Galih', 'gpt', '2024-12-15 03:08:04', '2024-12-15 03:08:04'),
(3, 'Edukasi', 'Oi7WsONjyn2spEBEoPjfUsMzX5dLWFhMCBN3iTLt.jpg', 'aaaaaaaaaaaaaa', '<p>aaaa</p>', 'aaaaaaaaa', 'aaaaaaaaaaaaa', '2024-12-15 05:32:13', '2024-12-15 05:32:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `deskripsi`, `created_at`, `updated_at`) VALUES
(3, 'b', 'd1RyeAayXG809Rg1GFgvpDe8ECQhqNB9UevuF058.jpg', '<p>aa</p>', '2024-12-14 21:22:19', '2024-12-14 21:22:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gudangs`
--

CREATE TABLE `gudangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `jumlah` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `logins`
--

CREATE TABLE `logins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_11_15_132043_create_posts_table', 1),
(5, '2024_11_24_115334_create_notifikasis_table', 1),
(6, '2024_12_01_010842_create_pages_table', 1),
(7, '2024_12_01_081356_create_logins_table', 1),
(8, '2024_12_01_112428_create_registers_table', 1),
(9, '2024_12_09_140116_create_produks_table', 1),
(10, '2024_12_14_034603_create_aset_kantors_table', 1),
(11, '2024_12_14_143652_create_beritas_table', 1),
(12, '2024_12_14_143719_create_categories_table', 1),
(13, '2024_12_14_143805_create_gudangs_table', 1),
(14, '2024_12_17_131349_create_orders_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasis`
--

CREATE TABLE `notifikasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `aksi` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `notifikasis`
--

INSERT INTO `notifikasis` (`id`, `id_user`, `aksi`, `date`, `created_at`, `updated_at`) VALUES
(1, 'Politik', 'Menambah Positingan', '2024-12-14 15:16:31', '2024-12-14 08:16:31', '2024-12-14 08:16:31'),
(2, 'Wisata', 'Menambah Positingan', '2024-12-14 15:20:57', '2024-12-14 08:20:57', '2024-12-14 08:20:57'),
(4, 'b', 'Menambah Kategori', '2024-12-15 04:23:04', '2024-12-14 21:23:04', '2024-12-14 21:23:04'),
(5, 'Aktiva_Bergerak', 'Menambah Positingan', '2024-12-15 04:45:38', '2024-12-14 21:45:38', '2024-12-14 21:45:38'),
(6, 'Kesehatan', 'Menambah Positingan', '2024-12-15 10:08:04', '2024-12-15 03:08:04', '2024-12-15 03:08:04'),
(7, 'Edukasi', 'Menambah Positingan', '2024-12-15 12:32:13', '2024-12-15 05:32:13', '2024-12-15 05:32:13'),
(8, 'b', 'Menambah Produk', '2024-12-20 14:16:31', '2024-12-20 07:16:31', '2024-12-20 07:16:31'),
(9, '1', 'Menambah order', '2024-12-20 15:45:35', '2024-12-20 08:45:35', '2024-12-20 08:45:35'),
(10, '1', 'Menambah order', '2024-12-20 22:49:19', '2024-12-20 15:49:19', '2024-12-20 15:49:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_produk` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `jumlah` text NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `id_produk`, `id_user`, `jumlah`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '111222', '<p>aa2222</p>', 'Diproses', '2024-12-20 08:45:35', '2024-12-20 08:55:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_category` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `source` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `posts`
--

INSERT INTO `posts` (`id`, `id_category`, `image`, `title`, `content`, `author`, `source`, `created_at`, `updated_at`) VALUES
(1, 'Politik', 'TxO3jky8OvbV0NnO4nKcz2wZwJX5SrN9d0Laiynw.jpg', 'a', '<p>a</p>', 'a', 'a', '2024-12-14 08:16:31', '2024-12-14 08:16:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produks`
--

CREATE TABLE `produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `stock` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produks`
--

INSERT INTO `produks` (`id`, `category`, `name`, `image`, `description`, `price`, `status`, `stock`, `created_at`, `updated_at`) VALUES
(1, 'b', 'a1', 'RqHnT3osAc9ExPAFt8cLrRME636IR2ksdYBegbeT.jpg', '<p>b</p>', 'b', 'aktif', 'b', '2024-12-20 07:16:31', '2024-12-20 07:16:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `registers`
--

CREATE TABLE `registers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('5eKdnKuQrNUevaPAUbWNWIwweny97gpmMOIfxTLH', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoic00zZzRPQ2lJeHBwaExuZk1nelF4QUR2M1IwSnl6UFU2S1QwWThlciI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9vcmRlcj9hY3RpdmU9VXNlciZ0aXRsZT1vcmRlciI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1734735008),
('biXihB4MGAZBEIbP7Yup0h60SUUCqlnru0eSKt9Y', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicUI1YWd6cXQ3d2JlM0NUOEVma3pWQXByNVkzeWZ3NGFtazhYam9UUiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9vcmRlciI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1734710117);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ktp` varchar(255) DEFAULT NULL,
  `nohp` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `id_transaksi` varchar(255) DEFAULT NULL,
  `norek` varchar(255) DEFAULT NULL,
  `saldo` varchar(255) DEFAULT NULL,
  `Bank` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `ktp`, `nohp`, `level`, `status`, `id_transaksi`, `norek`, `saldo`, `Bank`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'a', 'a1@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$aQQ9kG.wsQCMOYQhWVD3wup6MzGYsl01YcVNl6QNkcE8xjHF9pXgS', NULL, '2024-12-14 08:15:51', '2024-12-14 08:15:51');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aset_kantors`
--
ALTER TABLE `aset_kantors`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `beritas`
--
ALTER TABLE `beritas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `gudangs`
--
ALTER TABLE `gudangs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifikasis`
--
ALTER TABLE `notifikasis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `registers`
--
ALTER TABLE `registers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aset_kantors`
--
ALTER TABLE `aset_kantors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `beritas`
--
ALTER TABLE `beritas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `gudangs`
--
ALTER TABLE `gudangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `logins`
--
ALTER TABLE `logins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `notifikasis`
--
ALTER TABLE `notifikasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `registers`
--
ALTER TABLE `registers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
