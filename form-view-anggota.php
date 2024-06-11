<div style="border:0; padding:10px; width:924px; height:auto;">
    <center><font color="orange" size="2"><b>Anggota</b></font></center><br />
    <input type="button" bgcolor="orange" value="Tambah-anggota" onclick="location.href='home-admin.php?page=form-input-anggota'" title="Add Member"><br /><br />
    <table width="924" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr bgcolor="#FF6600">
            <th width="5%">No</th>
            <th width="15%" height="42">USERNAME</th>
            <th width="28%">NAMA</th>
            <th width="15%">NIK</th>
            <th width="17%">NO HP</th>
            <th width="20%">AKSI</th>
        </tr>
        <?php
        include "koneksi.php";
        $query = "SELECT * FROM anggota";
        $result = mysqli_query($koneksi, $query);
        if ($result) {
            $nomer = 0;
            while ($hasil = mysqli_fetch_assoc($result)) {
                $username = stripslashes($hasil['username']);
                $nama = stripslashes($hasil['nama']);
                $NIK = stripslashes($hasil['NIK']);
                $no_hp = stripslashes($hasil['no_hp']);
                $nomer++;
        ?>
                <tr align="center" bgcolor="#DFE6EF">
                    <td>&nbsp;</td>
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
                    <td><?= $NIK ?><div align="center"></div></td>
                    <td><?= $no_hp ?><div align="center"></div></td>
                    <td bigcolor="#EEF2F7"><div align="center"><a href="home-admin.php?page=view-detail-anggota&username=<?= $username ?>">Detail</a> | <a href="home-admin.php?page=form-edit-anggota&username=<?= $username ?>">Edit</a> | <a href="home-admin.php?page=hapus-anggota&username=<?= $username ?>">Hapus</a></div></td>
                </tr>
                <tr align="center" bgcolor="#DFE6EF">
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
        <?php
            }
        } else {
            echo "Error: " . mysqli_error($koneksi);
        }
        // tutup koneksi MySQL
        mysqli_close($koneksi);
        ?>
    </table>
</div>
