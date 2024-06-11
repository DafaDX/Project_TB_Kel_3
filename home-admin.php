<?php
session_start();

$hak_akses = $_SESSION['hak_akses'] ?? '';
if (!isset($_SESSION['username']) || $hak_akses !== "admin") {
    echo "<script language='JavaScript'>
            alert('Anda bukan admin. Silahkan Login Kembali!');
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
    <title>Koperasi Simpan Pinjam Online | Admin</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8ff;
        }
        .header {
            width: 964px;
            height: 130px;
            background-color: #B0C4DE;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
        }
        .header h1 {
            font-size: 36px;
            color: #000;
            margin: 0;
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
    </style>
</head>
<body>
    <div class="header">
        <h1>Koperasi Simpan Pinjam</h1>
    </div>

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
                        <li><a href="home-admin.php?page=form-view-anggota" title="Anggota">Anggota</a></li>
                        <li><a href="home-admin.php?page=list-pinjaman" title="Pinjaman">Pinjaman</a></li>
                        <li><a href="home-admin.php?page=list-simpanan" title="Simpanan">Simpanan</a></li>
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
                    <tr>
                        <td width="938" valign="top">
                            <?php
                            $page = $_GET['page'] ?? "main";
                            switch ($page) {
                                case 'form-input-anggota':
                                    include "form-input-anggota.php";
                                    break;
                                case 'form-view-anggota':
                                    include "form-view-anggota.php";
                                    break;
                                case 'form-edit-anggota':
                                    include "form-edit-anggota.php";
                                    break;
                                case 'hapus-anggota':
                                    include "hapus-anggota.php";
                                    break;
                                case 'list-pinjaman':
                                    include "list-pinjaman.php";
                                    break;
                                case 'list-simpanan':
                                    include "list-simpanan.php";
                                    break;
                                case 'form-input-pinjaman':
                                    include "form-input-pinjaman.php";
                                    break;
                                case 'form-input-bayar':
                                    include "form-input-bayar.php";
                                    break;
                                case 'form-input-simpanan':
                                    include "form-input-simpanan.php";
                                    break;
                                case 'input-bayar':
                                    include "input-bayar.php";
                                    break;
                                case 'input-anggota':
                                    include "input-anggota.php";
                                    break;
                                case 'input-pinjaman':
                                    include "input-pinjaman.php";
                                    break;
                                case 'input-simpanan':
                                    include "input-simpanan.php";
                                    break;
                                case 'edit-anggota' :
                                    include "edit-anggota.php";
                                    break;
                                case 'view-detail-anggota':
                                    include "view-detail-anggota.php";
                                    break;
                                case 'form-ambil-simpanan':
                                    include "form-ambil-simpanan.php";
                                    break;
                                case 'ambil-simpanan':
                                    include "ambil-simpanan.php";
                                    break;
                                case 'pro-version':
                                    include "pro-version.php";
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
            <td height="36" colspan="5" bgcolor="#B0C4DE">
                <div align="right" style="margin:0 12px 0 0;">
                    <font color="#000">Copyright &copy; 2024, By Kelompok 3</font>
                </div>
            </td>
        </tr>
    </table>

    <div align="center"></div>
</body>
</html>
