<div style="border:0; padding:10px; width:924px; height:auto;"><br />
<center><font color="orange" size="2"><b>Simpanan anggota</b></font></center><br />
<table width="924" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr bgcolor="#FF6600">
        <th width="5%">No</th>&nbsp;
        <th width="15%" height="42">USERNAME</th>&nbsp;
        <th width="40%">NAMA</th>&nbsp;
        <th width="20%">TOTAL</th>&nbsp;
        <th width="25%">AKSI</th>&nbsp;
    </tr>
    <?php
    include "koneksi.php";
    $query = "SELECT * FROM anggota";
    $result = mysqli_query($koneksi, $query);
    $nomer = 0;
    while ($hasil = mysqli_fetch_array($result)) {
        $username = stripslashes($hasil['username']);
        $nama = stripslashes($hasil['nama']);
        $simpanan = stripslashes($hasil['simpanan']);
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
                <td><?= $simpanan ?><div align="center"></div></td>
                <td bgcolor="#EEF2F7"><div align="center"><a href="home-admin.php?page=form-input-simpanan&username=<?= $username ?>">Simpan</a> | <a href="home-admin.php?page=form-ambil-simpanan&username=<?= $username ?>">Ambil</a></div></td>
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
