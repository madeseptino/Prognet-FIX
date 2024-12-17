<?php
// order_process.php

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
$address = $_POST['address'];
$phone = $_POST['phone'];
$quantityXL = $_POST['quantityXL'];
$quantityL = $_POST['quantityL'];
$quantityM = $_POST['quantityM'];
$quantityS = $_POST['quantityS'];
$message = $_POST['message'];

// Validasi input
if (empty($name) || empty($address) || empty($phone) || ($quantityXL + $quantityL + $quantityM + $quantityS == 0)) {
    echo "Harap isi semua field yang diperlukan!";
    exit;
}

// Simpan data ke database
$sql = "INSERT INTO orders (name, address, phone, quantityXL, quantityL, quantityM, quantityS, message)
        VALUES ('$name', '$address', '$phone', $quantityXL, $quantityL, $quantityM, $quantityS, '$message')";

if (mysqli_query($conn, $sql)) {
    echo "Order berhasil disimpan!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Tutup koneksi database
mysqli_close($conn);
?>
