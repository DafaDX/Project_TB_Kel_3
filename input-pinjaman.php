<body bgcolor="#EEF2F7">
<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $NIK = $_POST['NIK'];
    $nama = $_POST['nama'];
    $tgl_pinjaman = $_POST['thn_pinjaman'] . "-" . $_POST['bln_pinjaman'] . "-" . $_POST['tgl_pinjaman'];
    $jumlah_pinjaman = $_POST['jumlah_pinjaman'];

    //validasi data jika data kosong
    if (empty($jumlah_pinjaman)) {
        ?>
        <script language="JavaScript">
            alert('Masukkan Jumlah Transaksi!');
            document.location = 'home-admin.php?page=list-pinjaman';
        </script>
        <?php
    } else {
        //masukkan data ke tabel pinjaman
        $input = "INSERT INTO pinjaman (username, NIK, nama, tgl_pinjaman, jumlah_pinjaman) VALUES 
        ('$username ', '$NIK', '$nama', '$tgl_pinjaman', '$jumlah_pinjaman')";
        $query_input = mysqli_query($koneksi, $input);

        //update pinjaman di tabel member
        $update = "UPDATE anggota SET pinjaman = pinjaman + $jumlah_pinjaman WHERE username = '$username'";
        $query_update = mysqli_query($koneksi, $update);

        if ($query_update) {
            // jika sukses
            ?>
            <script language="JavaScript">
                alert('Data Pinjaman Berhasil Diinput!');
                document.location = 'home-admin.php?page=list-pinjaman';
            </script>
            <?php
        } else {
            //jika gagal
            echo "Pinjaman gagal diinput, silahkan diulangi!";
        }
    }
    // tutup koneksi engine MySQL
    mysqli_close($koneksi);
}
?>
</body>
