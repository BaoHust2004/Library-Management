<?php
include "connect.php";
session_start();
$iddocgia=$_SESSION['f1'];
$sql = "SELECT COUNT(*) as count FROM phieumuon";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$count = $row['count'] + 1;
if(isset($_POST['book_id'])) {
$idbook=$_POST['book_id'];
$today=date("Y/m/d");
$nextMonth = date("Y/m/d", strtotime("+1 month"));
$sql="Select * from sach where idsach=$idbook";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_array($result);
$sql2="Insert Into phieumuon (ngaymuon,ngaydenhan,idphieumuon,iddocgia,idsach) VALUES('$today','$nextMonth','$count','$iddocgia','$idbook')";
mysqli_query($conn,$sql2);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Request Page</title>>
    <style>
        body {
				margin: 0;
				padding: 0;
				background: #FFFFFF; /* Màu nền trắng */
				font-family: 'Arial', sans-serif;
				overflow-x: hidden; /* Ngăn trượt ngang khi có scroll */
			}

			.container {
				display: flex;
				flex-direction: column;
				min-height: 100vh;
				max-width: 100vw; /* Sử dụng max-width của viewport */
				margin: 0 auto;
				padding: 20px;
				box-sizing: border-box; /* Box-sizing để padding không làm tăng kích thước */
			}

			.content {
				flex: 1;
				display: flex;
				flex-direction: row;
				background: #FFFFFF;
				border-radius: 10px;
				overflow: hidden;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Hiệu ứng bóng đổ */
			}

			.header {
				text-align: center;
				padding: 20px;
				background: #DFEBF6;
				border-radius: 10px;
				margin-bottom: 20px;
			}

			.sidebar {
				width: 270px; /* Đã thay đổi width */
				background: #29353C;
				color: #E6E6E6;
				padding: 20px;
				box-sizing: border-box;
				display: flex;
				flex-direction: column;
			}

			.sidebar h2 {
				margin-top: 0;
				margin-bottom: 20px;
				color: #FFFFFF;
			}

			.sidebar a {
				text-decoration: none;
				color: #E6E6E6;
				display: block;
				padding: 10px;
				margin-bottom: 10px;
				background: #A8C7D8;
				text-align: center;
				border-radius: 5px;
			}

			.sidebar a:hover {
				background: #44576D;
			}

			.main {
				flex: 1;
				padding: 40px;
				display: flex;
				flex-direction: column;
			}
        .request-form {
            position: absolute;
            left: 352px;
            top: 250px;
            width: 70%;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .request-form h2 {
            margin-top: 0;
        }
        .request-form label {
            display: block;
            margin: 10px 0 5px;
        }
        .request-form input, .request-form textarea {
            width: 95%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .request-form button {
            padding: 10px 20px;
            background-color: rgba(41, 53, 60, 1);
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .request-form button:hover {
            background-color: rgba(31, 43, 50, 1);
        }
    </style>
</head>
<body>

<div class="container">
		  <div class="header">
				<h1>LOAN SLIP'S LIST</h1>
			</div>
			<div class="content">
				<div class="sidebar">
					<h2>REQUEST</h2>
					<a href="reader.php">PROFILE</a>
					<a href="loan.php">LOAN SLIP</a>
					<a href="book2.php">BOOK</a>
				</div>
			<div class="main">
				
			</div>
		</div>
		</div>
		</div>

    <div class="request-form">
        <h2>Loan Request</h2>
        <form action="request.php" method="POST">
            <label for="book_id">Loan ID:</label>
            <div><?php echo $count ?></div>
            <label for="book_id">Book ID:</label>
            <input type="text" name="book_id" required>
            <label for="reason">Reason for Request:</label>
            <textarea  name="reason" rows="4" required></textarea>
            <button type="submit">Submit Request</button>
        </form>
    </div>
</div>
</body>
</html>
