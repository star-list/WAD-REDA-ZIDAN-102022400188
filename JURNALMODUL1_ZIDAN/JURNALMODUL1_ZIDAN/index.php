<?php
// **********************  1  **************************
// Inisialisasi variabel
$nama = $email = $nomor = $film = $jumlah = "";
$namaErr = $emailErr = $nomorErr = $filmErr = $jumlahErr = "";
$isValid = false;

// **********************  2  **************************
// Jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // **********************  3  **************************
    // Ambil nilai Nama dari form
     // silakan taruh kode kalian di bawah
    //buatkan validasi yang sesuai
    if (empty($_POST["nama"])) {
        $namaErr = "Nama harus diisi";
    } else {
        $nama = test_input($_POST["nama"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $nama)) {
            $namaErr = "Hanya huruf dan spasi yang diperbolehkan";
        }
    }

    // **********************  4  **************************
    // Ambil nilai Email dari form
    // silakan taruh kode kalian di bawah
    // buatkan validasi yang sesuai
    if (empty($_POST["email"])) {
        $emailErr = "Email harus diisi";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Format email tidak valid";
        }
    }

    // **********************  5  **************************
    // Ambil nilai Nomor HP dari form
    // silakan taruh kode kalian di bawah
    // buatkan validasi yang sesuai

    if (empty($_POST["nomor"])) {
        $nomorErr = "Nomor HP harus diisi";
    } else {
        $nomor = test_input($_POST["nomor"]);
        if (!preg_match("/^[0-9]{10,15}$/", $nomor)) {
            $nomorErr = "Nomor HP harus berisi 10-15 digit angka";
        }
    }

    // **********************  6  **************************
    // Ambil nilai Film (dropdown)
    // silakan taruh kode kalian di bawah
    // buatkan validasi yang sesuai
    if (empty($_POST["film"])) {
        $filmErr = "Pilih film terlebih dahulu";
    } else {
        $film = test_input($_POST["film"]);
    }

    // **********************  7  **************************
    // Ambil nilai Jumlah Tiket dari form
 // silakan taruh kode kalian di bawah
    // buatkan validasi yang sesuai

    if (empty($_POST["jumlah"])) {
        $jumlahErr = "Jumlah tiket harus diisi";
    } else {
        $jumlah = test_input($_POST["jumlah"]);
        if (!is_numeric($jumlah) || $jumlah < 1) {
            $jumlahErr = "Jumlah tiket harus minimal 1";
        }
    }

    if (empty($namaErr) && empty($emailErr) && empty($nomorErr) && empty($filmErr) && empty($jumlahErr)) {
        $isValid = true;
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="id">
<head> <meta charset="UTF-8"> <title>Form Pemesanan Tiket Bioskop</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="form-container">


  <!-- **********************  8  ************************** -->
    <img src="EAD.png" alt="EAD.png" class="logo">
    
  <h2>Form Pemesanan Tiket Bioskop</h2>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    
 <!-- Isi atribut value untuk menampilkan nilai variabel di dalam (...)-->
<label>Nama:</label>
<input type="text" name="nama" value="<?php echo $nama; ?>">
 <span class="error"><?php echo $namaErr; ?></span>

    <!-- Isi atribut value untuk menampilkan nilai variabel di dalam (...)-->
    <label>Email:</label>
    <input type="text" name="email" value="<?php echo $email; ?>">
    <span class="error"><?php echo $emailErr; ?></span>

    <!-- Isi atribut value untuk menampilkan nilai variabel di dalam (...)-->
    <label>Nomor HP:</label>
    <input type="text" name="nomor" value="<?php echo $nomor; ?>">
    <span class="error"><?php echo $nomorErr; ?></span>

    <label>Pilih Film:</label>
    <select name="film">
      <option value="">-- Pilih Film --</option>
      <option value="Interstellar" <?php if($film == "Interstellar") echo "selected"; ?>>Interstellar</option>
      <option value="Inception" <?php if($film == "Inception") echo "selected"; ?>>Inception</option>
      <option value="Oppenheimer" <?php if($film == "Oppenheimer") echo "selected"; ?>>Oppenheimer</option>
      <option value="Avengers: Endgame" <?php if($film == "Avengers: Endgame") echo "selected"; ?>>Avengers: Endgame</option>
    </select>
    <span class="error"><?php echo $filmErr; ?></span>
        
    <!-- Isi atribut value untuk menampilkan nilai variabel di dalam (...)-->
<label>Jumlah Tiket:</label>
    <input type="text" name="jumlah" value="<?php echo $jumlah; ?>">
    <span class="error"><?php echo $jumlahErr; ?></span>

    <button type="submit">Pesan Tiket</button>
  </form>
  
  <!-- **********************  9  ************************** -->
  <!-- Tampilkan hasil input dalam tabel jika semua valid -->
  <!-- silakan taruh kode kalian di bawah -->
  <?php
  if ($isValid) {
      echo "<h3>Data Pemesanan:</h3>";
      echo "<table>";
      echo "<tr><th>Nama</th><th>Email</th><th>Nomor HP</th><th>Film</th><th>Jumlah Tiket</th></tr>";
      echo "<tr>";
      echo "<td>" . $nama . "</td>";
      echo "<td>" . $email . "</td>";
      echo "<td>" . $nomor . "</td>";
      echo "<td>" . $film . "</td>";
      echo "<td>" . $jumlah . "</td>";
      echo "</tr>";
      echo "</table>";
  }
  ?>
</div>
</body>
</html>