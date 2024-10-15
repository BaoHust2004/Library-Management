	<?php
		session_start();
		$idnhanvien = $_SESSION['s1'] ?? '';
		$tennhanvien = $_SESSION['s2'] ?? '';
		$chucvu = $_SESSION['s3'] ?? '';
		$sodienthoainhanvien = $_SESSION['s4'] ?? '';
	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Staff Profile</title>
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

			.info-box {
				background: #A8C7D8;
				padding: 20px;
				margin-bottom: 20px;
				border-radius: 5px;
				display: flex;
				justify-content: space-between;
				align-items: center;
			}

			.info-box span {
				font-size: 24px;
				color: #44576D;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="header">
				<h1>STAFF DETAILS</h1>
			</div>
			<div class="content">
				<div class="sidebar">
					<h2>PROFILE</h2>
					<a href="customer.php">CUSTOMER</a>
					<a href="report.php">REPORT</a>
					<a href="book.php">BOOK</a>
					<a href="loanstaff.php">LOAN SLIP</a>
				</div>
				<div class="main">
					<div class="info-box">
						<span>STAFF ID:</span>
						<span><?php echo $idnhanvien ?></span>
					</div>
					<div class="info-box">
						<span>FULL NAME:</span>
						<span><?php echo $tennhanvien ?></span>
					</div>
					<div class="info-box">
						<span>POSITION:</span>
						<span><?php echo $chucvu ?></span>
					</div>
					<div class="info-box">
						<span>PHONE NUMBER:</span>
						<span><?php echo $sodienthoainhanvien ?></span>
					</div>
				</div>
			</div>
		</div>
	</body>
	</html>
