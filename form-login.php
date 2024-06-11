<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f8ff;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .login-container {
            width: 300px;
            padding: 20px;
            background-color: white;
            box-shadow: 0px 5px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .login-container h2 {
            margin-bottom: 20px;
        }
        .login-container input[type="text"], .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .login-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #7b42f6;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        .login-container input[type="submit"]:hover {
            background-color: #5f32c9;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login<br>Aplikasi Koperasi</h2>
        <form action="login/login.php" method="POST">
            <input type="text" name="username" placeholder="Username" required autofocus maxlength="50"><br>
            <input type="password" name="password" placeholder="Password" required maxlength="20"><br>
            <input type="submit" value="Login">
        </form>
    </div>
    <div class="footer">
    Copyright &copy; 2024, By Kelompok 3
    </div>
</body>
</html>
