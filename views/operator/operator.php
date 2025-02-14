<?php
include '../..//koneksi/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $nama = $_POST['nama'];
    $nip = $_POST['nip'];
    $jabatan = $_POST['jabatan'];
    $alamat = $_POST['alamat'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $foto = "default.jpg"; // Default foto jika tidak diupload

    // Cek apakah username sudah ada
    $cek_sql = "SELECT username FROM user WHERE username = ?";
    $stmt = $conn->prepare($cek_sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $error = "Username sudah digunakan!";
    } else {
        // Insert ke database
        $sql = "INSERT INTO user (username, password, nama, nip, jabatan, alamat, nomor_telepon, foto, role) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'operator')";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssss", $username, $password, $nama, $nip, $jabatan, $alamat, $nomor_telepon, $foto);
        
        if ($stmt->execute()) {
            $success = "operator baru berhasil ditambahkan!";
        } else {
            $error = "Gagal menambahkan operator.";
        }
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah operator</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin: 50px; }
        .container { width: 400px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; }
        input, button { width: 100%; padding: 10px; margin: 10px 0; }
        button { background-color: blue; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tambah operator</h2>
        <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
        <?php if (isset($success)) { echo "<p style='color:green;'>$success</p>"; } ?>
        
        <form method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="text" name="nama" placeholder="Nama Lengkap" required>
            <input type="text" name="nip" placeholder="NIP" required>
            <input type="text" name="jabatan" placeholder="Jabatan" required>
            <input type="text" name="alamat" placeholder="Alamat" required>
            <input type="text" name="nomor_telepon" placeholder="Nomor Telepon" required>
            <button type="submit">Tambah operator</button>
        </form>
        
        <a href="index.php">Kembali ke Beranda</a>
    </div>
</body>
</html>
