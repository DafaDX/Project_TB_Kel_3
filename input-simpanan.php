<body bgcolor="#EEF2F7">
<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $NIK = $_POST['NIK'];
    $nama = $_POST['nama'];
    $tgl_simpanan = $_POST['thn_pinjaman'] . "-" . $_POST['bln_pinjaman'] . "-" . $_POST['tgl_simpanan'];
    $jumlah_simpanan = $_POST['jumlah_simpanan'];

    //validasi data jika data kosong
    if (empty($jumlah_simpanan)) {
        ?>
        <script language="JavaScript">
            alert('Masukkan Jumlah Tabungan!');
            document.location = 'home-admin.php?page=list-simpanan';
        </script>
        <?php
    } else {
        //masukkan data ke tabel simpanan
        $input = "INSERT INTO simpanan (username, NIK, nama, tgl_simpanan, jumlah_simpanan) VALUES 
        ('$username', '$NIK', '$nama', '$tgl_simpanan', '$jumlah_simpanan')";
        $query_input = mysqli_query($koneksi, $input);

        //update simpanan di tabel member
        $update = "UPDATE anggota SET simpanan = simpanan + $jumlah_simpanan WHERE username = '$username'";
        $query_update = mysqli_query($koneksi, $update);

        if ($query_update) {
            // jika sukses
            ?>
            <script language="JavaScript">
                alert('Data Simpanan Berhasil Diinput!');
                document.location = 'home-admin.php?page=list-simpanan';
            </script>
            <?php
        } else {
            //jika gagal 
            echo "Simpanan gagal diinput, silahkan diulangi!";
        }
    }
    // tutup koneksi engine MySQL
    mysqli_close($koneksi);
}
?>
</body>
