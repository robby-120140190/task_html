<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $fileUpload = $_FILES['fileUpload'];

    // Validasi input
    if (empty($name) || empty($email) || empty($age) || empty($phone) || empty($fileUpload['name'])) {
        die("Semua field harus diisi!");
    }

    // Validasi file
    $allowedTypes = ['text/plain'];
    if (!in_array($fileUpload['type'], $allowedTypes)) {
        die("Tipe file tidak valid! Hanya file teks yang diperbolehkan.");
    }

    if ($fileUpload['size'] > 2 * 1024 * 1024) {
        die("File terlalu besar! Maksimal 2MB.");
    }

    // Baca isi file
    $fileContent = file_get_contents($fileUpload['tmp_name']);
    $fileLines = explode("\n", $fileContent);

    // Simpan data ke sesi untuk ditampilkan di result.php
    session_start();
    $_SESSION['data'] = [
        'name' => $name,
        'email' => $email,
        'age' => $age,
        'phone' => $phone,
        'fileContent' => $fileLines,
        'server_info' => $_SERVER
    ];

    header("Location: result.php");
    exit();
}
?>