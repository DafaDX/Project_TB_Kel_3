<div style="border:0; padding:10px; width:924px; height:auto;">
<?php
include "koneksi.php";
if (isset($_GET['NIK'])) {
    $NIK = $_GET['NIK'];
}
else {
    die ("Error. No NIK selected!");
}
$query = "SELECT * FROM anggota WHERE NIK='$NIK'";
$sql = mysqli_query($koneksi, $query);
$hasil = mysqli_fetch_array($sql);
$username = $hasil['username'];
$NIK = $hasil['NIK'];
$nama = $hasil['nama'];
list($thn_lahir,$bln_lahir,$tgl_lahir)= explode ("-",$hasil['tgl_lahir']);
$jenis_kelamin = $hasil['jenis_kelamin'];
$alamat = $hasil['alamat'];
$no_hp = $hasil['no_hp'];
$simpanan = $hasil['simpanan'];
$pinjaman = $hasil['pinjaman'];
?>
<form action="#" method="POST" name="form-edit-profil-anggota" enctype="multipart/form-data">
    <input type="button" value="Kembali" onclick="location.href='home-admin.php?page=form-view-anggota'" title="Kembali">
    <table width="860" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr bgcolor="#DFE6EF" height="30">
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><b>Edit Data Anggota <u><i><?=$NIK?></i></u></b></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr height="46">
            <td>&nbsp;</td>
            <td>username</td>
            <td>:&nbsp;<?=$username?><input type="hidden" name="username" value="<?=$username?>"></td>
        </tr>
        <tr height="46">
            <td>&nbsp;</td>
            <td>NIK</td>
            <td>:&nbsp;<?=$NIK?><input type="text" name="NIK" value="<?=$NIK?>"></td>
        </tr>
        <tr height="46">
            <td>&nbsp;</td>
            <td>Nama Anggota</td>
            <td>:&nbsp;<input type="text" name="nama" size="50" value="<?=$nama?>"></td>
        </tr>
        <tr height="46">
            <td>&nbsp;</td>
            <td>Tanggal Lahir</td>
            <td>:&nbsp;<select name="tgl_lahir">
                <?php
                for ($i=1;$i<=31;$i++){
                    $tg = ($i<10) ? "0$i" : $i;
                    $sele = ($tg==$tgl_lahir)? "selected" : "";
                    echo "<option value='$tg' $sele>$tg</option>";
                }
                ?>
            </select>
        <select name="bln_lahir">
            <?php
            for ($i=1;$i<=12; $i++){
                $bl = ($i<10) ? "0$i" : $i;
                $sele = ($bl==$bln_lahir)? "selected" : "";
                echo "<option value='$bl' $sele>$bl</option>";
            }
            ?>
        </select>
        <select name="thn_lahir">
        <?php
            for ($i=1945;$i<=2030; $i++){
                $th = ($i<1945) ? "0000" : $i;
                $sele = ($th==$thn_lahir)? "selected" : "";
                echo "<option value='$th' $sele>$th</option>";
            }
            ?>
        </select>
        </td>
        </tr>
        <tr height="46">
            <td>&nbsp;</td>
            <td>Jenis Kelamin</td>
            <td>:&nbsp;<input type="radio" name="jenis_kelamin" value="L" <?php echo ($jenis_kelamin=='L')?
            "checked":"";?>>Laki-laki &nbsp;&nbsp;
            <input type="radio" name="jenis_kelamin" value="P" <?php echo ($jenis_kelamin=='P')?
            "checked":"";?>>Perempuan></td>
        </tr>
        <tr height="46">
            <td>&nbsp;</td>
            <td>Alamat</td>
            <td>:&nbsp;<input type="text" name="alamat" size="70" value="<?=$alamat?>"></td>
        </tr>
        <tr height="46">
            <td>&nbsp;</td>
            <td>Nomor HP</td>
            <td>:&nbsp;<input type="text" name="no_hp" size="25" value="<?=$no_hp?>"></td>
        </tr>
        <tr height="46">
            <td>&nbsp;</td>
            <td>Simpanan</td>
            <td>:&nbsp;<input type="text" name="simpanan" size="25" maxlength="20" value="<?=$simpanan?>"></td>
        </tr>
        <tr height="46">
            <td>&nbsp;</td>
            <td>Pinjaman</td>
            <td>:&nbsp;<input type="text" name="pinjaman" size="70" maxlength="35" value="<?=$pinjaman?>"></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td height="20">&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;&nbsp;Maaf bos</td>
        </tr>
        <tr>
            <td>&nbsp;</td
