<div style="border:0; padding:10px; width:924px; height:auto;"><br />
<center><font color="orange" size="2"><b>Pinjaman Anggota</b></font></center><br />
<table width="924" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr bgcolor="#FF6600">
        <th width="5%">No</th>
        <th width="15%" height="42">USERNAME</th>
        <th width="40%">NAMA</th>
        <th width="20%">TOTAL</th>
        <th width="20%">AKSI</th>
    </tr>
    <?php
    include "koneksi.php";
    $query = "SELECT * FROM anggota";
    $result = mysqli_query($koneksi, $query);
    $nomer = 0;
    while ($row = mysqli_fetch_array($result)) {
        $username = stripslashes($row['username']);
        $nama = stripslashes($row['nama']);
        $pinjaman = stripslashes($row['pinjaman']);
        {
            $nomer++;
            ?>
            <tr align="center" bgcolor="#DFE6EF">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr align="center">
                <td height="32"><?= $nomer ?><div align="center"></div></td>
                <td><?= $username ?><div align="center"></div></td>
                <td><?= $nama ?><div align="center"></div></td>
                <td><?= $pinjaman ?><div align="center"></div></td>
                <td bgcolor="#EEF2F7"><div align="center"><a href="home-admin.php?page=form-input-pinjaman&username=<?= $username ?>">Pinjam</a> | <a href="home-admin.php?page=form-input-bayar&username=<?= $username ?>">Bayar</a></div></td>
            </tr>
            <tr align="center" bgcolor="#DFE6EF">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
        <?php
        }
    }
    // tutup koneksi engine MySQL
    mysqli_close($koneksi);
    ?>
</table>
</div>
