<?php
require '../../config/config.php'; // file koneksi database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $nomor_wa = $_POST['nomor_wa'];
    $program_studi = $_POST['program_studi'];
    $tanggal_lahir = $_POST['tanggal_lahir'];

    // Query untuk memasukkan data mahasiswa ke database
    $stmt = $pdo->prepare('INSERT INTO mahasiswa (nim, nama, alamat, nomor_wa, program_studi, tanggal_lahir) VALUES (?, ?, ?, ?, ?, ?)');

    try {
        if ($stmt->execute([$nim, $nama, $alamat, $nomor_wa, $program_studi, $tanggal_lahir])) {
            header('Location: ../../mahasiswa.php');
            exit();
        } else {
            $error = 'Gagal menambahkan data mahasiswa.';
        }
    } catch (PDOException $e) {
        $error = 'Error: ' . $e->getMessage();
    }

    if (isset($error)) {
        
        header('Location: ../../tambahMahasiswa.php?error=' . urlencode($error));
        exit();
    }
}
