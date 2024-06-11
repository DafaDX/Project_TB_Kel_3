<div style="border:0; padding:10px; width:924px; height:auto;">
<?php
include "koneksi.php";

if (isset($_GET['username'])) {
    $username = $_GET['username'];
    $query = "SELECT * FROM anggota WHERE username='$username'";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($koneksi));
    }

    $data = mysqli_fetch_array($result);
    $username = $data['username'];
    $nama = $data['nama'];
    $NIK = $data['NIK'];
} else {
    die("Error. Tidak ada username yang dipilih");
}
?>
    <form action="home-admin.php?page=input-bayar" method="POST" name="form-input-bayar">
        <table width="1100" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr height="46">
                <td width="10%">&nbsp;</td>
                <td width="25%">&nbsp;</td>
                <td width="65%"><font color="orange" size="2"><b>Form Input Pembayaran</b></font></td>
            </tr>
            <tr>
                <td width="10%">&nbsp;</td>
                <td width="25%"><input type="button" value="Batal" onclick="location.href='home-admin.php?page=list-pinjaman'" title="Cancel"><br/><br/></td>
                <td width="65%">&nbsp;</td>
            </tr>
            <tr height="46">
                <td>&nbsp;</td>
                <td>Username</td>
                <td><input name="username" type="text" size="25" value="<?= htmlspecialchars($username) ?>" disabled="disabled"/>
                <input name="username" type="hidden" size="25" value="<?= htmlspecialchars($username) ?>"/></td>
            </tr>
            <tr height="46">
                <td>&nbsp;</td>
                <td>NIK</td>
                <td><input name="NIK" type="number" size="25" value="<?= htmlspecialchars($NIK) ?>" disabled="disabled"/>
                <input name="NIK" type="hidden" size="25" value="<?= htmlspecialchars($NIK) ?>"/></td>
            </tr>
            <tr height="46">
                <td>&nbsp;</td>
                <td>Nama</td>
                <td><input name="nama" type="text" size="25" value="<?= htmlspecialchars($nama) ?>" disabled="disabled"/>
                <input name="nama" type="hidden" size="25" value="<?= htmlspecialchars($nama) ?>"/></td>
            </tr>
            <tr height="46">
                <td>&nbsp;</td>
                <td>Tanggal Bayar</td>
                <td>
                    <select name="tgl_bayar">
                        <?php
                        for ($i = 1; $i <= 31; $i++) {
                            $tg = ($i < 10) ? "0$i" : $i;
                            echo "<option value='$tg'>$tg</option>";
                        }
                        ?>
                    </select>
                    <select name="bln_bayar">
                        <?php
                        $nama_bln = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Des"];
                        for ($bln = 1; $bln <= 12; $bln++) {
                            echo "<option value='$bln'>{$nama_bln[$bln - 1]}</option>";
                        }
                        ?>
                    </select>
                    <select name="thn_bayar">
                        <?php
                        for ($i = 2000; $i <= 2030; $i++) {
                            echo "<option value='$i'>$i</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr height="46">
                <td>&nbsp;</td>
                <td>Jumlah Bayar</td>
                <td><input type="text" name="jumlah_bayar" size="25" maxlength="10"/></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr height="46">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><input type="submit" name="Submit" value="Bayar">&nbsp;&nbsp;&nbsp;
                <input type="reset" name="reset" value="Reset"></td>
            </tr>
            <tr height="46">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr height="46">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
        </table>
    </form>
</div>
