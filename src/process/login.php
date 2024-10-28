<?php
session_start();
require '../../config/config.php'; // file koneksi database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Query untuk mendapatkan data admin
    $stmt = $pdo->prepare('SELECT * FROM admin WHERE username = ?');
    $stmt->execute([$username]);
    $admin = $stmt->fetch();
    
    // Verifikasi password
    if ($admin && password_verify($password, $admin['password'])) {
        // Jika berhasil login
        $_SESSION['admin_id'] = $admin['id'];
        header('Location: ../../dashboard.php');
        exit();
    } else {
        $_SESSION['error'] = 'Username atau password salah';
        header('Location: ../../index.php');
    }
}
