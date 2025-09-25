<?php
/**
 * BARIS UNTUK MENAMPILKAN ERROR (HANYA UNTUK DEVELOPMENT)
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 1. Sertakan file koneksi ke database
include_once('db_connection.php');

// 2. Periksa apakah form benar-benar disubmit
if (isset($_POST['submit'])) {

    // 3. Mengambil semua data dari form (sesuai dengan name di index.php)
    $nama_alat = $_POST['nama_alat'] ?? '';
    $merk = $_POST['merk'] ?? '';
    $kategori = $_POST['kategori'] ?? '';
    $sub_kategori = $_POST['sub_kategori'] ?? '';
    $kondisi = $_POST['kondisi'] ?? '';
    $harga_per_hari = $_POST['harga_per_hari'] ?? 0;
    $harga_per_minggu = $_POST['harga_per_minggu'] ?? 0;
    $harga_per_bulan = $_POST['harga_per_bulan'] ?? 0;
    $deposit = $_POST['deposit'] ?? 0;
    
    // Mengubah array dari checkbox menjadi satu string yang dipisahkan koma
    $kelengkapan = isset($_POST['kelengkapan']) ? implode(', ', $_POST['kelengkapan']) : '';
    
    $spesifikasi = $_POST['spesifikasi'] ?? '';
    $deskripsi = $_POST['deskripsi'] ?? '';
    $ketersediaan = $_POST['ketersediaan'] ?? '';
    $lokasi = $_POST['lokasi'] ?? '';
    $minimal_sewa = $_POST['minimal_sewa'] ?? '';
    
    // Mengubah array dari checkbox menjadi satu string yang dipisahkan koma
    $syarat_khusus = isset($_POST['syarat_khusus']) ? implode(', ', $_POST['syarat_khusus']) : '';


    // 4. Query dengan prepared statement untuk keamanan (menghindari SQL injection)
    // Pastikan nama tabel (alat_musik) dan kolomnya sudah sesuai dengan database
    $sql = $conn->prepare(
        "INSERT INTO alat_musik (
            nama_alat, merk, kategori, sub_kategori, kondisi, 
            harga_per_hari, harga_per_minggu, harga_per_bulan, deposit, 
            kelengkapan, spesifikasi, deskripsi, ketersediaan, lokasi, 
            minimal_sewa, syarat_khusus
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
    );

    // 5. Bind parameter ke query
    // 's' untuk string, 'd' untuk double (angka desimal)
    $sql->bind_param(
        "sssssddddsssssss",
        $nama_alat, $merk, $kategori, $sub_kategori, $kondisi,
        $harga_per_hari, $harga_per_minggu, $harga_per_bulan, $deposit,
        $kelengkapan, $spesifikasi, $deskripsi, $ketersediaan, $lokasi,
        $minimal_sewa, $syarat_khusus
    );

    // 6. Eksekusi query dan berikan pesan
    if ($sql->execute()) {
        echo "<h1>Sukses!</h1>";
        echo "Data alat musik baru berhasil disimpan ke database.";
        echo "<br><a href='index.php'>Kembali ke Form</a>";
    } else {
        echo "<h1>Error!</h1>";
        echo "Terjadi kesalahan saat menyimpan data: " . $sql->error;
    }

    // Tutup statement
    $sql->close();

} else {
    // Jika halaman diakses tanpa submit form, kembalikan ke halaman utama
    header('Location: index.php');
    exit();
}

// Tutup koneksi
$conn->close();
?>