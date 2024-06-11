<?php
if (isset($_POST['Submit'])) {
    include "koneksi.php";

    $username = $_POST['username'];
    $password = $_POST['password'];
    $NIK = $_POST['NIK'];
    $nama = $_POST['nama'];
    $tgl_lahir = $_POST['thn_lahir'].'-'.$_POST['bln_lahir'].'-'.$_POST['tgl_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];

    // Jika password tidak diisi, gunakan password lama
    if (empty($password)) {
        $query_update = "UPDATE anggota SET NIK='$NIK', nama='$nama', tgl_lahir='$tgl_lahir', jenis_kelamin='$jenis_kelamin', alamat='$alamat', no_hp='$no_hp' WHERE username='$username'";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query_update = "UPDATE anggota SET password='$hashed_password', NIK='$NIK', nama='$nama', tgl_lahir='$tgl_lahir', jenis_kelamin='$jenis_kelamin', alamat='$alamat', no_hp='$no_hp' WHERE username='$username'";
    }

    $result_update = mysqli_query($koneksi, $query_update);

    if ($result_update) {
        ?>
        <script language="JavaScript">
            alert('Update Data Anggota Berhasil!');
            document.location='home-admin.php?page=form-view-anggota';
        </script>
        <?php
    } else {
        echo "Update Gagal: " . mysqli_error($koneksi);
    }

    // Tutup koneksi
    mysqli_close($koneksi);
}
?>
