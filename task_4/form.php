<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <link rel="stylesheet" href="style.css">
    <script>
		document.getElementById('registrationForm').addEventListener('submit', function (event) {
    const fileInput = document.getElementById('fileUpload');
    const file = fileInput.files[0];

    if (file) {
        const maxSize = 2 * 1024 * 1024; // 2 MB
        if (file.size > maxSize) {
            alert('File terlalu besar! Maksimal 2MB.');
            event.preventDefault();
        }
    }
});
	</script>
    <style>
		body {
			background-color: azure;
			align-items: center;
			font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
			justify-items: center;
		}

		.container {
			padding: 100px;
			margin: 7px;
			text-align: left;
			vertical-align: middle;
		}
	</style>
</head>
<body>
    <div class="container">
    <h1>Form Pendaftaran</h1>
    <form action="process.php" method="POST" enctype="multipart/form-data" id="registrationForm">
        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" required minlength="3"><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="age">Usia:</label>
        <input type="number" id="age" name="age" required min="1"><br>

        <label for="phone">Telepon:</label>
        <input type="tel" id="phone" name="phone" required pattern="[0-9]{10,15}"><br>

        <label for="fileUpload">Upload File (Teks):</label>
        <input type="file" id="fileUpload" name="fileUpload" accept=".txt" required><br>

        <input type="submit" value="Daftar">
    </form>
    </div>
</body>
</html>
