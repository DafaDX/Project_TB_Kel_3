<body bgcolor="#EEF2F7">
<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $no_pinjaman = $_POST['pinjaman'];
    $NIK = $_POST['NIK'];
    $nama = $_POST['nama'];
    $tgl_bayar = $_POST['thn_bayar'] . "-" . $_POST['bln_bayar'] . "-" . $_POST['tgl_bayar'];
    $jumlah_bayar = $_POST['jumlah_bayar'];

    //validasi data jika data kosong
    if (empty($jumlah_bayar)) {
        ?>
        <script language="JavaScript">
            alert('Masukkan jumlah bayar!');
            document.location = 'home-admin.php?page=list-pinjaman';
        </script>
        <?php
    } else {
        //masukkan data ke tabel bayar
        $input = "INSERT INTO pembayaran (username, NIK, no_pinjaman, nama, tgl_bayar, jumlah_bayar) VALUES ('$username','$NIK','$no_pinjaman','$nama','$tgl_bayar','$jumlah_bayar')";
        $query_input = mysqli_query($koneksi, $input);

        //update pinjaman di tabel member
        $update = "UPDATE anggota SET pinjaman = pinjaman - $jumlah_bayar WHERE username = '$username'";
        $query_update = mysqli_query($koneksi, $update);

        if ($query_update) {
            // jika sukses
            ?>
            <script language="JavaScript">
                alert('Data Bayar Berhasil Diinput!');
                document.location = 'home-admin.php?page=list-pinjaman';
            </script>
            <?php
        } else {
            //jika gagal
            echo "Pembayaran Gagal diinput, Silahkan diulangi!";
        }
    }
    // tutup koneksi engine MySQL
    mysqli_close($koneksi);
}
?>
</body>
