<?php
include "connect.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql1 = "SELECT * FROM nhanvien WHERE taikhoan='$username' AND matkhau='$password'";
    $result1 = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($result1) >= 1) {
        $row = mysqli_fetch_array($result1);
        $_SESSION['s1'] = $row['idnhanvien'];
        $_SESSION['s2'] = $row['ten'];
        $_SESSION['s3'] = $row['chucvu'];
        $_SESSION['s4'] = $row['sodienthoai'];
        header('Location: staffinfo.php');
        exit();
    } else {
        $sql2 = "SELECT * FROM docgia WHERE taikhoan='$username' AND matkhau='$password'";
        $result2 = mysqli_query($conn, $sql2);
        if (mysqli_num_rows($result2) >= 1) {
            $row = mysqli_fetch_array($result2);
            $_SESSION['f1'] = $row['iddocgia'];
            $_SESSION['f2'] = $row['taikhoan'];
            $_SESSION['f3'] = $row['ten'];
            $_SESSION['f4'] = $row['sodienthoai'];
            $_SESSION['f5'] = $row['tuoi'];
            $_SESSION['f6'] = $row['diachi'];
            $_SESSION['f7'] = $row['soluotmuon'];
            header('Location: reader.php');
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login Page</title>
    <meta name="description" content="Figma htmlGenerator">
    <meta name="author" content="htmlGenerator">
    <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background: #E5E5E5;
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #29353C;
            width: 90%;
            max-width: 400px;
            padding: 40px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.25);
            border-radius: 8px;
            text-align: center;
        }
        .container h1 {
            color: #E6E6E6;
            font-size: 32px;
            margin-bottom: 40px;
            letter-spacing: 1px;
        }
        .container label {
            color: #E6E6E6;
            display: block;
            font-size: 16px;
            margin-bottom: 10px;
            text-align: left;
        }
        .container input {
            background-color: #E6F7FF;
            width: 100%;
            height: 40px;
            margin-bottom: 20px;
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        .container input:focus {
            outline: none;
            box-shadow: 0 0 5px rgba(0, 150, 255, 0.5);
        }
        .container button {
            background-color: #66B3FF;
            color: #29353C;
            font-size: 16px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
        }
        .container button:hover {
            background-color: #0099FF;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>LOG IN</h1>c:\Users\Admin\Downloads\Tài liệu Hust\CSDL\GROUP13_FinalProject\Mã nguồn__ Nhóm 13_20225601-20225751-20225891\Create Database.sql
        <form method="POST" action="">
            <div class="input-container">
                <label for="username">USERNAME</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>
            <div class="input-container">
                <label for="password">PASSWORD</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <div class="input-container">
                <button type="submit">SUBMIT</button>
            </div>
        </form>
    </div>
</body>
</html>
