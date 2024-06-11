<div style="border:0; padding:10px; width:924px; height:auto;">
    <center><font color="orange" size="2"><b>Simpanan Anda</b></font></center><br />
    <table width="860" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr bgcolor="#FF6600">
            <th width="5%">No</th>
            <th width="15%" height="42">USERNAME</th>
            <th width="50%">NAMA</th>
            <th width="30%">TOTAL SIMPANAN</th>
        </tr>
        <?php
        include "koneksi.php";
        if (isset($_GET['username'])) {
            $username = $_GET['username'];
        } else {
            die("Error. No ID Selected!");
        }
        $query = "SELECT * FROM anggota WHERE username='$username'";
        $result = mysqli_query($koneksi, $query);
        if (!$result) {
            die("Query failed: " . mysqli_error($koneksi));
        }
        $nomer = 0;
        while ($row = mysqli_fetch_array($result)) {
            $nomer++;
            $username = stripslashes($row['username']);
            $nama = stripslashes($row['nama']);
            $simpanan = stripslashes($row['simpanan']);
        ?>
            <tr align="center" bgcolor="#DFE6EF">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr align="center">
                <td height="32"><?= $nomer ?><div align="center"></div></td>
                <td><?= $username ?><div align="center"></div></td>
                <td><?= $nama ?><div align="center"></div></td>
                <td><?= $simpanan ?><div align="center"></div></td>
            </tr>
            <tr align="center" bgcolor="#DFE6EF">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
        <?php
        }
        // tutup koneksi engine MySQL
        mysqli_close($koneksi);
        ?>
    </table>
</div>
