<div style="border:0; padding:10px; width:860px; height:400;">
<?php

include "koneksi.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST")  {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $NIK = $_POST['NIK'];
    $tgl_lahir = $_POST['thn_lahir'] . "-" . $_POST['bln_lahir'] . "-" . $_POST['tgl_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];

    // Validasi data kosong
    if (empty($username) || empty($password) || empty($nama) || empty($NIK)) {
        ?>
        <script language="JavaScript">
            alert('Data harap Dilengkapi!');
            document.location='home-admin.php?page=form-input-anggota';
        </script>
        <?php
    } else {
        include "koneksi.php";
        
        // Cek username di database
        $query_check = "SELECT username FROM anggota WHERE username = '$username'";
        $result_check = mysqli_query($koneksi, $query_check);
        $count = mysqli_num_rows($result_check);

        if ($count > 0) {
            ?>
            <script language="JavaScript">
                alert('Username sudah dipakai!, Silahkan ganti username yang lain');
                document.location='home-admin.php?page=form-input-anggota';
            </script>
            <?php
        } else {
            // Masukkan data ke tabel anggota
            $query_input1 = "INSERT INTO anggota (username, password, NIK, nama, tgl_lahir, jenis_kelamin, alamat, no_hp)
            VALUES('$username', '$password', '$NIK', '$nama', '$tgl_lahir', '$jenis_kelamin', '$alamat', '$no_hp')";
            $result_input1 = mysqli_query($koneksi, $query_input1);
            
            // Masukkan data ke tabel admin
            $query_input2 = "INSERT INTO akses_login (username, nama, password, hak_akses) 
            VALUES ('$username', '$nama', '$password', 'anggota')";
            $result_input2 = mysqli_query($koneksi, $query_input2);

            if ($result_input1 && $result_input2) {
                ?>
                <script language="JavaScript">
                    alert('Input Data Anggota Berhasil!');
                    document.location='home-admin.php?page=form-view-anggota';
                </script>
                <?php
            } else {
                echo "input Gagal!";
            }
        }

        // Tutup koneksi
        mysqli_close($koneksi);
    }
}
?>
</div>
