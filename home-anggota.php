<?php
session_start();

$hak_akses = $_SESSION['hak_akses'] ?? '';
if (!isset($_SESSION['username']) || $hak_akses != "anggota") {
    echo "<script>
        alert('Anda bukan anggota. Silahkan Login Kembali!');
        document.location='index.php';
    </script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koperasi Simpan Pinjam Online | Member</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8ff;
        }
        .nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #FF6600;
            border-radius: 8px;
        }
        .nav ul li {
            float: left;
        }
        .nav ul li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .nav ul li a:hover {
            background-color: orange;
        }
        .nav ul li a:focus {
            background-color: #555;
        }
        .nav ul li a:visited {
            color: white;
        }
        .header {
            text-align: center;
            padding: 20px;
            background-color: #B0C4DE;
        }
        .header h1 {
            margin: 0;
            color: #333;
        }
        .footer {
            text-align: right;
            padding: 10px;
            background-color: #B0C4DE;
            color: #000;
        }
    </style>
</head>
<body>
    <table width="964" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <td width="964" class="header">
                <h1>Koperasi Simpan Pinjam</h1>
            </td>
        </tr>
    </table>

    <table width="964" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <td><br></td>
        </tr>
    </table>

    <table width="964" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr bgcolor="#F8F8FF" height="32">
            <td width="10">&nbsp;</td>
            <td width="944">
                <div class="nav">
                    <ul>
                        <li><a href="home-anggota.php?page=lihat-pinjaman-anggota&username=<?= $_SESSION['username'] ?>" title="Pinjaman">Pinjaman</a></li>
                        <li><a href="home-anggota.php?page=lihat-simpanan-anggota&username=<?= $_SESSION['username'] ?>" title="Tabungan">Simpanan</a></li>
                        <li><a href="login/logout.php" title="Log Out">Log out</a></li>
                    </ul>
                </div>
            </td>
            <td width="10">&nbsp;</td>
        </tr>
    </table>

    <table width="964" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr bgcolor="#F8F8FF">
            <td width="10">&nbsp;</td>
            <td rowspan="4" valign="top">
                <table width="938" height="auto" bgcolor="white" border="0" cellspacing="0" cellpadding="0">
                    <tr height="36" width="938">
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;<strong><?php echo "Tanggal: " . date("d.M.y"); ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;Selamat Datang <u><strong><?= $_SESSION['nama'] ?></strong></u></td>
                    </tr>
                    <tr>
                        <td width="938" valign="top">
                            <?php
                            $page = $_GET['page'] ?? 'main';
                            switch ($page) {
                                case 'lihat-pinjaman-anggota':
                                    include "lihat-pinjaman-anggota.php";
                                    break;
                                case 'lihat-simpanan-anggota':
                                    include "lihat-simpanan-anggota.php";
                                    break;
                                case 'profil-anggota':
                                    include "profil-anggota.php";
                                    break;
                                case 'form-edit-profil-anggota':
                                    include "form-edit-profil-anggota.php";
                                    break;
                                case 'main':
                                default:
                                    include 'about-login.php';
                                    break;
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </td>
            <td width="10">&nbsp;</td>
        </tr>
    </table>

    <table width="964" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr bgcolor="#F8F8FF">
            <td>&nbsp;</td>
        </tr>
    </table>

    <table width="964" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr bgcolor="#B0C4DE">
            <td height="36" colspan="5" class="footer">
                Copyright &copy; 2024, By Kelompok 3
            </td>
        </tr>
    </table>

    <div align="center"></div>
</body>
</html>
