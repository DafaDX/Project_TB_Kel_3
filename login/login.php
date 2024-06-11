<?php

session_start();

$username = $_POST['username'];
$password = $_POST['password'];

// Membuat koneksi ke database menggunakan mysqli
$koneksi = new mysqli("localhost", "root", "", "koperasi");

// Memeriksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Mencegah SQL Injection
$username = $koneksi->real_escape_string($username);
$password = $koneksi->real_escape_string($password);

// Query untuk mendapatkan data pengguna
$query = "SELECT * FROM akses_login WHERE username = '$username'";
$hasil = $koneksi->query($query);

// Memeriksa hasil query
if ($hasil->num_rows > 0) {
    $data = $hasil->fetch_assoc();
    
    // Memeriksa kesesuaian username dan password
    if ($data['username'] && $password == $data['password']) {
        $_SESSION['username'] = $data['username'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['hak_akses'] = $data['hak_akses'];
        
        // Menentukan hak akses dan mengarahkan ke halaman yang sesuai
        if ($data['hak_akses'] == 'admin') {
            header("Location: ../home-admin.php");
        } else if ($data['hak_akses'] == 'anggota') {
            header("Location: ../home-anggota.php");
        }
    } else {
        // Jika username atau password salah
        echo "<script language='JavaScript'>
                alert('username atau password salah');
                document.location = '../index.php';
              </script>";
    }
} else {
    // Jika username tidak ditemukan
    echo "<script language='JavaScript'>
            alert('username atau password salah');
            document.location = '../index.php';
          </script>";
}

// Menutup koneksi
$koneksi->close();

?>
