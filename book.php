<?php
include "connect.php";
$limit = 15;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

$sort = isset($_GET['sort']) ? $_GET['sort'] : 'idsach';
$order = isset($_GET['order']) ? $_GET['order'] : 'ASC';

if (isset($_POST['button-add'])) {
    $Id = $_POST['idsach'];
    $Ten = $_POST['ten'];
    $Phanloai = $_POST['phanloai'];
    $Luotmuon = $_POST['luotmuon'];
    $Phimuon = $_POST['phimuon'];
    $Trangthai = $_POST['trangthai'];

    $sql1 = "INSERT INTO sach (idsach, ten, phanloai, luotmuon, phimuon, trangthai) VALUES ('$Id', '$Ten', '$Phanloai', '$Luotmuon', '$Phimuon', '$Trangthai')";
    mysqli_query($conn, $sql1);
}

if (isset($_POST['button-remove'])) {
    $id = $_POST['ID'];
    $sql1 = "DELETE FROM sach WHERE idsach = '$id'";
    mysqli_query($conn, $sql1);
}

if (isset($_POST['button-search'])) {
    $Id = $_POST['idsach'];
    $Ten = $_POST['ten'];
    $Phanloai = $_POST['phanloai'];
    $Luotmuon = $_POST['luotmuon'];
    $Phimuon = $_POST['phimuon'];
    $Trangthai = $_POST['trangthai'];

    $condition = "1=1"; // Mặc định là true để xây dựng điều kiện WHERE
    if (!empty($Id)) {
        $condition .= " AND idsach = '$Id'";
    }
    if (!empty($Ten)) {
        $condition .= " AND ten LIKE '%$Ten%'";
    }
    if (!empty($Phanloai)) {
        $condition .= " AND phanloai LIKE '%$Phanloai%'";
    }
    if (!empty($Luotmuon)) {
        $condition .= " AND luotmuon LIKE '%$Luotmuon%'";
    }
    if (!empty($Phimuon)) {
        $condition .= " AND phimuon LIKE '%$Phimuon%'";
    }
    if (!empty($Trangthai)) {
        $condition .= " AND trangthai LIKE '%$Trangthai%'";
    }

    $sql = "SELECT * FROM sach WHERE $condition ORDER BY $sort $order LIMIT $start, $limit";
} else {
    $sql = "SELECT * FROM sach ORDER BY $sort $order LIMIT $start, $limit";
}

$result = mysqli_query($conn, $sql);
$total_records_query = "SELECT COUNT(*) FROM sach";
$total_records_result = mysqli_query($conn, $total_records_query);
$total_records = mysqli_fetch_array($total_records_result)[0];
$total_pages = ceil($total_records / $limit);
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
			.grid-container {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 1px;
    width: 100%;
    margin: 20px auto;
}

.grid-container > div {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: center; /* Đã thay đổi từ left thành center */
}

.header1 {
    background-color: #f2f2f2;
    font-weight: bold;
    text-align: center; /* Đã thay đổi từ left thành center */
}

.table-container {
    position: relative; /* Đã thay đổi từ absolute thành relative */
    width: 100%;
    overflow-x: auto;
}

.pagination {
    display: flex;
    justify-content: center;
    margin-top: 20px; /* Đã thay đổi từ margin-bottom thành margin-top */
}

.pagination a {
    color: #333;
    padding: 3px 6px;
    text-decoration: none;
    border: 1px solid #ddd;
    margin: 0 2px;
}

.pagination a.active {
    background-color: #4CAF50;
    color: white;
    border: 1px solid #4CAF50;
}

.pagination a:hover:not(.active) {
    background-color: #ddd;
}

.form-container {
    width: 100%;
    max-width: 150px; /* Đã thay đổi từ 16% thành 200px */
    height: 30px;
    margin-bottom: 10px; /* Đã thay đổi từ 20px thành 10px */
}

.form-change {
    margin-top: 20px; /* Đã thay đổi từ top: 220px thành margin-top: 20px */
    width: 100%; /* Đã thay đổi từ 1200px thành 100% */
    padding: 0 20px; /* Thêm padding */
    box-sizing: border-box; /* Box-sizing để padding không làm tăng kích thước */
}

.bt {
    height: 30px;
    background-color: grey;
    cursor: pointer;
    width: 70px;
    margin-right: 6px; /* Thêm margin-right để tạo khoảng cách giữa các button */
}
            </style>
          
          </head>
          
          <body>
		  <div class="container">
		  <div class="header">
				<h1>BOOK'S LIST</h1>
			</div>
			<div class="content">
				<div class="sidebar">
					<h2>BOOK</h2>
					<a href="staffinfo.php">PROFILE</a>
					<a href="customer.php">CUSTOMER</a>
					<a href="report.php">REPORT</a>
                    <a href="loanstaff.php">LOAN SLIP</a>
				</div>
				<div class="main">
				<div class="form-change">
				<form action="book.php" class="form-edit" method="post" enctype="multipart/form-data">
					<input type="text" class="form-container" placeholder="ID" name="idsach"> 
					<input type="text" class="form-container" placeholder="Name" name="ten"> 
					<input type="text" class="form-container" placeholder="Genre" name="phanloai"> 
					<input type="text" class="form-container" placeholder="Times Borrowed" name="luotmuon"> 
					<input type="text" class="form-container" placeholder="Price" name="phimuon"> 
					<input type="text" class="form-container" placeholder="Status" name="trangthai">
					<button class="bt" name="button-add">ADD</button>
					<button class="bt" name="button-search">SEARCH</button>
				</form>
                <form action="book.php" method="get">
        <select name="sort" class="form-container">
            <option value="idsach">ID</option>
            <option value="ten">Name</option>
            <option value="phanloai">Genre</option>
            <option value="luotmuon">Times Borrowed</option>
            <option value="phimuon">Price</option>
            <option value="trangthai">Status</option>
        </select>
        <select name="order" class="form-container">
            <option value="ASC">Ascending</option>
            <option value="DESC">Descending</option>
        </select>
        <button class="bt" type="submit">SORT</button>
    </form>
				</div>
				<div class="table-container">
        <div class="grid-container">
            <div class="header1">ID</div>
            <div class="header1">NAME</div>
            <div class="header1">GENRE</div>
            <div class="header1">TIMES BORROWED</div>
            <div class="header1">PRICE</div>
			<div class="header1">STATUS</div>
			<div class="header1">ACTION</div>

            <?php

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div>" . $row['idsach'] . "</div>";
                    echo "<div>" . $row['ten'] . "</div>";
                    echo "<div>" . $row['phanloai'] . "</div>";
                    echo "<div>" . $row['luotmuon'] . "</div>";
                    echo "<div>" . $row['phimuon'] . "</div>";
					echo "<div>" . $row['trangthai'] . "</div>";
					echo "<div>";
					echo "<form action='book.php' method='post' style='display:inline;'>";
					echo "<input type='hidden' name='ID' value='" . $row['idsach'] . "'>";
					echo "<button type='submit' name='button-remove'>Remove</button>";
					echo "</form>";
					echo "<form action='editbook.php' method='post' style='display:inline;'>";
					echo "<input type='hidden' name='ID' value='" . $row['idsach'] . "'>";
					echo "<button type='submit' name='button-edit'>Edit</button>";
					echo "</form>";
					echo "</div>";
                }
            }
            ?>
        </div>
    </div>
    <div class="pagination">
        <?php
        for ($i = 1; $i <= $total_pages; $i++) {
            echo "<a href='?page=" . $i . "'";
            if ($i == $page) echo " class='active'";
            echo ">" . $i . "</a>";
        }
        ?>
    </div>
				</div>
			</div>
		</div>
          </body>
          </html>