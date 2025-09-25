<?php
/**
 * BARIS UNTUK MENAMPILKAN ERROR (HANYA UNTUK DEVELOPMENT)
 * Baris ini akan menampilkan pesan error jika ada masalah pada kode.
 * Hapus atau beri komentar pada baris ini jika website sudah online.
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/**
 * MEMASUKKAN FILE CLASS FORM
 * Menggunakan `include_once` lebih aman untuk mencegah error
 * jika file tidak sengaja dimasukkan lebih dari sekali.
 */
include_once('Form.php');

/**
 * MEMBUAT OBJEK FORM
 * Parameter pertama ('submit.php') adalah file tujuan data akan dikirim.
 * Parameter kedua adalah teks pada tombol submit.
 */
$form = new Form('submit.php', 'Tambah Alat Sewa Band');

// --- MENAMBAHKAN SEMUA FIELD YANG DIPERLUKAN KE DALAM FORM ---

// 1. Field untuk Nama Alat (Tipe: text)
$form->addField('nama_alat', 'Nama Alat', 'text');

// 2. Field untuk Merk/Brand (Tipe: text)
$form->addField('merk', 'Merk / Brand', 'text');

// 3. Field untuk Kategori Alat Musik (Tipe: dropdown/select)
$kategori_options = [
    'Gitar & Bass', 
    'Drum & Perkusi', 
    'Keyboard & Piano', 
    'Sound System', 
    'Microphone', 
    'Amplifier', 
    'Mixing Console',
    'Speaker & Monitor',
    'Efek & Processor',
    'Aksesoris'
];
$form->addField('kategori', 'Kategori Alat', 'select', $kategori_options);

// 4. Field untuk Sub-Kategori (Tipe: text)
$form->addField('sub_kategori', 'Sub Kategori (contoh: Gitar Elektrik, Snare Drum)', 'text');

// 5. Field untuk Kondisi Alat (Tipe: radio button)
$kondisi_options = ['Excellent', 'Very Good', 'Good', 'Fair', 'Need Repair'];
$form->addField('kondisi', 'Kondisi Alat', 'radio', $kondisi_options);

// 6. Field untuk Harga Sewa per Hari (Tipe: number)
$form->addField('harga_per_hari', 'Harga Sewa / Hari (Rp)', 'number');

// 7. Field untuk Harga Sewa per Minggu (Tipe: number)
$form->addField('harga_per_minggu', 'Harga Sewa / Minggu (Rp)', 'number');

// 8. Field untuk Harga Sewa per Bulan (Tipe: number)
$form->addField('harga_per_bulan', 'Harga Sewa / Bulan (Rp)', 'number');

// 9. Field untuk Deposit/Jaminan (Tipe: number)
$form->addField('deposit', 'Deposit / Jaminan (Rp)', 'number');

// 10. Field untuk Kelengkapan yang Disertakan (Tipe: checkbox)
$kelengkapan_options = [
    'Kabel Original', 
    'Hardcase/Softcase', 
    'Stand/Dudukan', 
    'Manual Book', 
    'Charger/Adaptor',
    'Spare Parts',
    'Cleaning Kit'
];
$form->addField('kelengkapan', 'Kelengkapan yang Disertakan', 'checkbox', $kelengkapan_options);

// 11. Field untuk Spesifikasi Teknis (Tipe: textarea)
$form->addField('spesifikasi', 'Spesifikasi Teknis (Watt, Impedansi, dll)', 'textarea');

// 12. Field untuk Deskripsi (Tipe: textarea)
$form->addField('deskripsi', 'Deskripsi & Catatan Khusus', 'textarea');

// 13. Field untuk Ketersediaan (Tipe: radio)
$ketersediaan_options = ['Tersedia', 'Disewa', 'Dalam Perbaikan', 'Tidak Tersedia'];
$form->addField('ketersediaan', 'Status Ketersediaan', 'radio', $ketersediaan_options);

// 14. Field untuk Lokasi Penyimpanan (Tipe: text)
$form->addField('lokasi', 'Lokasi Penyimpanan/Cabang', 'text');

// 15. Field untuk Minimal Sewa (Tipe: select)
$minimal_sewa_options = ['1 Hari', '3 Hari', '1 Minggu', '2 Minggu', '1 Bulan'];
$form->addField('minimal_sewa', 'Minimal Periode Sewa', 'select', $minimal_sewa_options);

// 16. Field untuk Syarat & Ketentuan Khusus (Tipe: checkbox)
$syarat_options = [
    'Wajib KTP/Identitas',
    'Pembayaran di Muka',
    'Asuransi Wajib',
    'Hanya untuk Indoor',
    'Perlu Teknisi',
    'Tidak Boleh Dipindahkan'
];
$form->addField('syarat_khusus', 'Syarat & Ketentuan Khusus', 'checkbox', $syarat_options);

/**
 * MENAMPILKAN FORM
 * Baris ini akan mencetak seluruh HTML form yang sudah kita definisikan di atas.
 */
$form->displayForm();
?>