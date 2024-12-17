<?php
// contact_process.php

// Koneksi ke database
$host = "localhost";
$user = "root";
$password = "";
$dbname = "rusta_jersey";

$conn = mysqli_connect($host, $user, $password, $dbname);

// Cek koneksi
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Ambil data dari formulir
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// Validasi input
if (empty($name) || empty($email) || empty($phone) || empty($message)) {
    echo "Harap isi semua field!";
    exit;
}

// Simpan data ke database
$sql = "INSERT INTO contact (name, email, phone, message)
        VALUES ('$name', '$email', '$phone', '$message')";

if (mysqli_query($conn, $sql)) {
    echo "Pesan berhasil dikirim!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Tutup koneksi database
mysqli_close($conn);
?>
