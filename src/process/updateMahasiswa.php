<?php 
require '../../config/config.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $nomor_wa = $_POST['nomor_wa'];
    $program_studi = $_POST['program_studi'];
    $tanggal_lahir = $_POST['tanggal_lahir'];

    $stmt = $pdo->prepare('UPDATE mahasiswa SET nama = :nama, alamat = :alamat, nomor_wa = :nomor_wa, program_studi = :program_studi, tanggal_lahir = :tanggal_lahir WHERE nim = :nim');
    $stmt->bindParam(':nim', $nim);
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':alamat', $alamat);
    $stmt->bindParam(':nomor_wa', $nomor_wa);
    $stmt->bindParam(':program_studi', $program_studi);
    $stmt->bindParam(':tanggal_lahir', $tanggal_lahir);

try {
    if ($stmt->execute()) {
        header('Location: ../../mahasiswa.php');
        exit();
    } else {
        $error = 'Gagal mengupdate data mahasiswa.';
    }
} catch (PDOException $e) {
    $error = 'Error: ' . $e->getMessage();
}
}