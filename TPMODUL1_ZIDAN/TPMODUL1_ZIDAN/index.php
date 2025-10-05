<?php
// Inisialisasi variabel
$nama = $email = $nim = $jurusan = $alasan = "";
$namaErr = $emailErr = $nimErr = $jurusanErr = $alasanErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //nama
    $nama = trim($_POST["nama"]);
    if (empty($nama)) {
        $namaErr = "Nama wajib diisi";
    }

    // 2.  email
    $email = trim($_POST["email"]);
    if (empty($email)) {
        $emailErr = "Email wajib diisi";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Format email tidak valid";
    }

    // 3. buat  NIM
    $nim = trim($_POST["nim"]);
    if (empty($nim)) {
        $nimErr = "NIM wajib diisi";
    } elseif (!ctype_digit($nim)) {
        $nimErr = "NIM hanya boleh angka";
    }

    // 4.untuk jurusan
    $jurusan = $_POST["jurusan"] ?? "";
    if (empty($jurusan)) {
        $jurusanErr = "Jurusan wajib dipilih";
    }

    // tuliskan alasan
    $alasan = trim($_POST["alasan"]);
    if (empty($alasan)) {
        $alasanErr = "Alasan wajib diisi";
    }
}

// validasi
$valid = empty($namaErr) && empty($emailErr) && empty($nimErr) && empty($jurusanErr) && empty($alasanErr);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Pendaftaran Keanggotaan Lab - EAD Laboratory</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="form-container">
    <img src="EAD.png" alt="Logo EAD" class="logo">
    <h2>Form Pendaftaran Keanggotaan Lab - EAD Laboratory</h2>
    
    <form method="post" action="">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($nama); ?>">
        <span class="error"><?php echo $namaErr; ?></span>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
        <span class="error"><?php echo $emailErr; ?></span>

        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" value="<?php echo htmlspecialchars($nim); ?>">
        <span class="error"><?php echo $nimErr; ?></span>

        <label for="jurusan">Jurusan:</label>
        <select id="jurusan" name="jurusan">
            <option value="" <?php if (empty($jurusan)) echo 'selected'; ?>>-- Pilih Jurusan --</option>
            <option value="Sistem Informasi" <?php if ($jurusan == 'Sistem Informasi') echo 'selected'; ?>>Sistem Informasi</option>
            <option value="Informatika" <?php if ($jurusan == 'Informatika') echo 'selected'; ?>>Informatika</option>
            <option value="Teknik Industri" <?php if ($jurusan == 'Teknik Industri') echo 'selected'; ?>>Teknik Industri</option>
        </select>
        <span class="error"><?php echo $jurusanErr; ?></span>

        <label for="alasan">Alasan Bergabung:</label>
        <textarea id="alasan" name="alasan"><?php echo htmlspecialchars($alasan); ?></textarea>
        <span class="error"><?php echo $alasanErr; ?></span>

        <button type="submit">Daftar</button>
    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST" && $valid) {
        // jika berhasil
        echo "<div class='success-message'>";
        echo "Data Pendaftaran Berhasil!!";
        echo "</div>";

        // Kotak hasil data
        echo "<div class='result-box'>";
        echo "<img src='EAD.png' alt='Logo' class='logo-result'>";
        echo "<h3>Data Pendaftaran Berhasil</h3>";
        
        echo "<table class='data-table'>";
        echo "<tr><td>Nama</td><td>:</td><td>$nama</td></tr>";
        echo "<tr><td>Email</td><td>:</td><td>$email</td></tr>";
        echo "<tr><td>NIM</td><td>:</td><td>$nim</td></tr>";
        echo "<tr><td>Jurusan</td><td>:</td><td>$jurusan</td></tr>";
        echo "<tr><td>Alasan Bergabung</td><td>:</td><td>$alasan</td></tr>";
        echo "</table>";
        echo "</div>";
    }
    ?>
</div>


</body>
</html>