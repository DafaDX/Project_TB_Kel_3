<?php
include "koneksi.php";
if (isset($_GET['username'])) {
    $username = $_GET['username'];
    //membaca nama file yang akan dihapus
    $query = "SELECT * FROM anggota WHERE username='$username'";
    $hasil = mysqli_query($koneksi, $query); // Menggunakan mysqli_query dan parameter koneksi
    $data  = mysqli_fetch_array($hasil); // Menggunakan mysqli_fetch_array
} else {
    die("Error. Tidak ada USERNAME yang dipilih Silahkan cek kembali!");
}

// proses delete data
if (!empty($username) && $username != "") {
    $hapus = "DELETE FROM anggota WHERE username= '$username'";
    $sql = mysqli_query($koneksi, $hapus); // Menggunakan mysqli_query dan parameter koneksi
    if ($sql) {
?>
        <script language="JavaScript">
            alert('Username <?= $username ?> Berhasil dihapus!');
            document.location = 'home-admin.php?page=form-view-anggota';
        </script>
    <?php
    } else {
        echo "<h2><font color=red><center>Data gagal dihapus!</center></font></h2>";
    }
}
mysqli_close($koneksi); // Menggunakan mysqli_close
?>
