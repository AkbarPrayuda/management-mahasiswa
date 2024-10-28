<?php 

require '../../config/config.php';

$nim = $_GET['nim'];  // Pastikan ini diambil dengan cara aman (misalnya melalui GET atau POST)

// Cek apakah NIM ada di database
$query = "SELECT COUNT(*) FROM mahasiswa WHERE nim = :nim";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':nim', $nim, PDO::PARAM_STR);
$stmt->execute();
$nimExists = $stmt->fetchColumn();

if ($nimExists > 0) {
    // Jika NIM ditemukan, lakukan query DELETE
    $deleteQuery = "DELETE FROM mahasiswa WHERE nim = :nim";
    $stmt = $pdo->prepare($deleteQuery);
    $stmt->bindParam(':nim', $nim, PDO::PARAM_STR);

    if ($stmt->execute()) {
        header("Location: ../../mahasiswa.php");
    } else {
        echo "Gagal menghapus mahasiswa.";
    }
} else {
    echo "Mahasiswa dengan NIM $nim tidak ditemukan.";
}

?>