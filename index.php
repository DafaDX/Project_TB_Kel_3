<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koperasi Simpan Pinjam</title>
    <style type="text/css">
        .nav{
            width: 100px;
            padding: 0.5rem;
            background:#794ddf;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 1rem;
            cursor: pointer;
            text-align : center;
            
        }
    </style>
</head>
<body>
   <br> <br>
    
    <table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr bgcolor="#F8F8FF" height="32">
            <td width="10">&nbsp;</td>
            <td width="944">
                <div class="nav">
                    
                        <a href="form-login.php" title="Login"><u>L</u>ogin</a>
                    
                </div>
            </td>
            <td width="10">&nbsp;</td>
        </tr>
    </table>
    
    <table width="964" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr bgcolor="#F8F8FF">
            <td width="10">&nbsp;</td>
            <td rowspan="4" valign="top">
                <table width="938" height="auto" bgcolor="white" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="938" valign="top">
                            <?php
                            $page = $_GET['page'] ?? "main";
                            switch ($page) {
                                case 'form-login':
                                    include "form-login.php";
                                    break;
                                case 'login':
                                    include "login.php";
                                    break;
                                case 'main':
                                default:
                                    include 'home.php';
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
                    <font color="#000">Copyright &copy; 2024. By Kelompok 3</font><br>
                </div>
            </td>
        </tr>
    </table>
    
    <div align="center"></div>
</body>
</html>
