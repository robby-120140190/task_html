<?php
session_start();
if (!isset($_SESSION['data'])) {
    die("Tidak ada data yang ditemukan!");
}

$data = $_SESSION['data'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Hasil Pendaftaran</h1>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Usia</th>
            <th>Telepon</th>
        </tr>
        <tr>
            <td><?php echo htmlspecialchars($data['name']); ?></td>
			<td><?php echo htmlspecialchars($data['email']); ?></td>
            <td><?php echo htmlspecialchars($data['age']); ?></td>
            <td><?php echo htmlspecialchars($data['phone']); ?></td>
        </tr>
    </table>

    <h2>Isi File yang Diunggah</h2>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Isi</th>
        </tr>
        <?php
        foreach ($data['fileContent'] as $index => $line) {
            echo "<tr>";
            echo "<td>" . ($index + 1) . "</td>";
            echo "<td>" . htmlspecialchars($line) . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <h2>Informasi Server</h2>
    <table border="1">
        <tr>
            <th>Key</th>
            <th>Value</th>
        </tr>
        <?php
        foreach ($data['server_info'] as $key => $value) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($key) . "</td>";
            echo "<td>" . htmlspecialchars($value) . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <?php
    // Hapus data dari sesi setelah ditampilkan
    unset($_SESSION['data']);
    ?>
</body>
</html>