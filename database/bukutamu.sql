-- Membuat database bukutamu jika belum ada
CREATE DATABASE IF NOT EXISTS bukutamu;
USE bukutamu;

-- Membuat tabel user
CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    nama VARCHAR(100) NOT NULL,
    nip VARCHAR(50) NOT NULL UNIQUE,
    jabatan VARCHAR(100) NOT NULL,
    alamat TEXT NOT NULL,
    nomor_telepon VARCHAR(15) NOT NULL,
    foto VARCHAR(255) DEFAULT NULL,
    role ENUM('admin', 'operator') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Menambahkan akun admin dengan password yang sudah di-hash
INSERT INTO user (username, password, nama, nip, jabatan, alamat, nomor_telepon, foto, role) 
VALUES 
('admin', 
 '$2y$10$TKh8H1.Pz6e.Zs.YfLzJve7RvCpD1zZ2LQ6XHkj.zQ7aU8ZJaX0yG', 
 'Administrator', 
 '12345678', 
 'Administrator', 
 'Jl. Admin No.1', 
 '081234567890', 
 'admin.jpg', 
 'admin');
