<?php

$koneksi = new mysqli("localhost", "root", "", "koperasi");

// Memeriksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi ke database gagal: " . $koneksi->connect_error);
}

?>
