<div style="border:0; padding:10px; width:924px; height:auto;"><br />
<?php
include "koneksi.php";
if(!isset($_GET['username'])) {
    $username = $_GET['username'];
}
else {
    die ("Error. No USERNAME selected!");
}
// Tampilkan data dari tabel anggota
$query = "SELECT * FROM anggota WHERE username='$username'";
$sql = mysqli_query($koneksi, $query);
$hasil = mysqli_fetch_array($sql);
$username = $hasil['username'];
$nama = $hasil['nama'];
$NIK = $hasil['NIK'];
list($thn_lahir, $bln_lahir) = explode("-", $hasil['tgl_lahir']);
$jenis_kelamin = $hasil['jenis_kelamin'];
$alamat = $hasil['alamat'];
$no_hp = $hasil['no_hp'];
$tabungan = $hasil['tabungan'];
$pinjaman = $hasil['pinjaman'];
?>
<form action="&" method="POST" name="profil-anggota" enctype="multipart/form-data">
    <input type="button" value="Kembali" onclick="location.href='home-anggota.php'" title="Kembali">&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="button" value="Edit" onclick="location.href='home-anggota.php?page=form-edit-profil-anggota&username=<?= $username ?>'" title="Edit">
    <table width="860" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr bgcolor="#DFE6EF" height="30">
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr height="46">
            <td>&nbsp;</td>
            <td>Username:</td>
            <td>&nbsp;<input type="text" name="username" size="40" value="<?= $username ?>" disabled="disabled"></td>
        </tr>
        <!-- Tambahkan bagian-bagian lain sesuai kebutuhan -->
    </table>
</form>
<?php
// Tutup koneksi engine MySQL
mysqli_close($koneksi);
?>
</div>
