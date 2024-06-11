<body bgcolor="#EEE2F7">
<?php
include "koneksi.php";
$username = $_POST['username'] ?? '';
$NIK        = $_POST['NIK'] ?? '';
$nama       = $_POST['nama'] ?? '';
$tgl_ambil  = $_POST['thn_ambil'] . "-" . $_POST['bln_ambil'] . "-" . $_POST['tgl_ambil'] ?? '';
$jumlah_ambil = $_POST['jumlah_ambil'] ?? '';
if (empty($jumlah_ambil)){
    ?>
    <script language="JavaScript">
        alert('Masukan Jumlah Pengambilan!');
        document.location='home-admin.php?page=list-simpanan';
    </script>
    <?php
} else {
    $input = "INSERT INTO ambil_simpanan (username, NIK, nama, tgl_ambil, jumlah_ambil) VALUES
    ('$username','$NIK','$nama', '$tgl_ambil','$jumlah_ambil')";
    $query_input = mysqli_query($koneksi, $input);
    $update = "UPDATE anggota SET simpanan=simpanan-$jumlah_ambil WHERE username='$username'";
    $query_update = mysqli_query($koneksi, $update);
    if ($query_update){
        ?>
        <script language="JavaScript">
            alert('Data Pengambilan Simpanan Berhasil Diinput');
            document.location='home-admin.php?page=list-simpanan';
        </script>
        <?php
    } else {
        echo "Pengambilan Gagal Diinput";
    }
}
mysqli_close($koneksi);
?>
</body>
