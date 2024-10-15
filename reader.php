<?php
			session_start();
			$iddocgia=$_SESSION['f1'];
			$taikhoandangnhap=$_SESSION['f2'];
			$tendocgia=$_SESSION['f3'];
			$sodienthoaidocgia=$_SESSION['f4'];
            $tuoi=$_SESSION['f5'];
			$diachi=$_SESSION['f6'];
			$times=$_SESSION['f7'];
?>
<?php
	include "connect.php";
?>
<html lang="en">
          <head>
            <meta charset="utf-8">
          
            <title>Html Generated</title>
            <meta name="description" content="Figma htmlGenerator">
            <meta name="author" content="htmlGenerator">
            <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Inria+Sans&display=swap" rel="stylesheet">

            
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
				<h1>READER DETAILS</h1>
			</div>
			<div class="content">
				<div class="sidebar">
					<h2>PROFILE</h2>
					<a href="loan.php">LOAN SLIP</a>
					<a href="request.php">REQUEST</a>
					<a href="book2.php">BOOK</a>
				</div>
				<div class="main">
					<div class="info-box">
						<span>USER ID:</span>
						<span><?php echo $iddocgia ?></span>
					</div>
					<div class="info-box">
						<span>USERNAME:</span>
						<span><?php echo $taikhoandangnhap ?></span>
					</div>
					<div class="info-box">
						<span>FULL NAME:</span>
						<span><?php echo $tendocgia ?></span>
					</div>
					<div class="info-box">
						<span>PHONE NUMBER:</span>
						<span><?php echo $sodienthoaidocgia ?></span>
					</div>
					<div class="info-box">
						<span>AGE:</span>
						<span><?php echo $tuoi ?></span>
					</div>
					<div class="info-box">
						<span>ADRESS:</span>
						<span><?php echo $diachi ?></span>
					</div>
					<div class="info-box">
						<span>TIME BORROWEDS:</span>
						<span><?php echo $times ?></span>
					</div>
				</div>
			</div>
		</div>
          </body>
          </html>