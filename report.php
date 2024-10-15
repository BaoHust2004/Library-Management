<?php
include "connect.php";
$limit = 15;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

if (isset($_POST['button-add'])) {
    $Time = $_POST['Time'];
    $Income = $_POST['Income'];
    $Expense = $_POST['Expense'];
    $Quantity = $_POST['Quantity'];
    $Staffid = $_POST['StaffId'];

    $sql1 = "INSERT INTO baocaothang (thoigian, thu, chi, soluongsachchuatra, idnhanvien) VALUES ('$Time', '$Income', '$Expense', '$Quantity', '$Staffid')";
    mysqli_query($conn, $sql1);
	$sql = "SELECT * FROM baocaothang LIMIT $start, $limit";
    $result = mysqli_query($conn, $sql);
	$total_records_query = "SELECT COUNT(*) FROM baocaothang";
    $total_records_result = mysqli_query($conn, $total_records_query);
    $total_records = mysqli_fetch_array($total_records_result)[0];

    $total_pages = ceil($total_records / $limit);
}
else if (isset($_POST['button-remove'])) {
    $id = $_POST['ID'];

    $sql1 = "DELETE FROM baocaothang WHERE thoigian = '$id'";
    mysqli_query($conn, $sql1);
	$sql = "SELECT * FROM baocaothang LIMIT $start, $limit";
    $result = mysqli_query($conn, $sql);
	$total_records_query = "SELECT COUNT(*) FROM baocaothang";
    $total_records_result = mysqli_query($conn, $total_records_query);
    $total_records = mysqli_fetch_array($total_records_result)[0];

    $total_pages = ceil($total_records / $limit);
}

else if (isset($_POST['button-search'])) {
    $Time = $_POST['Time'];
    $Income = $_POST['Income'];
    $Expense = $_POST['Expense'];
    $Quantity = $_POST['Quantity'];
    $Staff = $_POST['StaffId'];

    $condition = "1=1"; // Mặc định là true để xây dựng điều kiện WHERE
    if (!empty($Time)) {
        $condition .= " AND thoigian LIKE '%$Time%'";
    }
    if (!empty($Income)) {
        $condition .= " AND thu LIKE '%$Income%'";
    }
    if (!empty($Expense)) {
        $condition .= " AND chi LIKE '%$Expense%'";
    }
    if (!empty($Quantity)) {
        $condition .= " AND soluongsachchuatra LIKE '%$Quantity%'";
    }
    if (!empty($Staff)) {
        $condition .= " AND idnhanvien LIKE '%$Staff%'";
    }

    $sql = "SELECT * FROM baocaothang WHERE $condition LIMIT $start, $limit";
    $result = mysqli_query($conn, $sql);

    // Đếm tổng số bản ghi theo điều kiện
    $total_records_query = "SELECT COUNT(*) FROM baocaothang WHERE $condition";
    $total_records_result = mysqli_query($conn, $total_records_query);
    $total_records = mysqli_fetch_array($total_records_result)[0];
    $total_pages = ceil($total_records / $limit);
}
else {
    $sql = "SELECT * FROM baocaothang LIMIT $start, $limit";
    $result = mysqli_query($conn, $sql);
	$total_records_query = "SELECT COUNT(*) FROM baocaothang";
    $total_records_result = mysqli_query($conn, $total_records_query);
    $total_records = mysqli_fetch_array($total_records_result)[0];

    $total_pages = ceil($total_records / $limit);
}
?>
<html lang="en">
          <head>
            <meta charset="utf-8">
          
            <title>Html Generated</title>
            <meta name="description" content="Figma htmlGenerator">
            <meta name="author" content="htmlGenerator">
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
    grid-template-columns: repeat(6, 1fr);
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
    max-width: 180px; /* Đã thay đổi từ 16% thành 200px */
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
				<h1>REPORT'S LIST</h1>
			</div>
			<div class="content">
				<div class="sidebar">
					<h2>REPORT</h2>
					<a href="staffinfo.php">PROFILE</a>
					<a href="customer.php">CUSTOMER</a>
					<a href="book.php">BOOK</a>
                    <a href="loanstaff.php">LOAN SLIP</a>
				</div>
				<div class="main">
				<div class="form-change">
				<form action="report.php" class="form-edit" method="post" enctype="multipart/form-data">
					<input type="text" class="form-container" placeholder="Time" name="Time"> 
					<input type="text" class="form-container" placeholder="Income" name="Income"> 
					<input type="text" class="form-container" placeholder="Expense" name="Expense"> 
					<input type="text" class="form-container" placeholder="Quantity" name="Quantity"> 
					<input type="text" class="form-container" placeholder="StaffId" name="StaffId"> 
					<button class="bt" name="button-add">ADD</button>
					<button class="bt" name="button-search">SEARCH</button>
				</form>
				</div>
                <div class="table-container">
        <div class="grid-container">
            <div class="header1">TIME</div>
            <div class="header1">INCOME</div>
            <div class="header1">EXPENSE</div>
            <div class="header1">QUANTITY</div>
            <div class="header1">STAFF ID</div>
			<div class="header1">ACTION</div>

            <?php
            include "connect.php";

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div>" . $row['thoigian'] . "</div>";
                    echo "<div>" . $row['thu'] . "</div>";
                    echo "<div>" . $row['chi'] . "</div>";
                    echo "<div>" . $row['soluongsachchuatra'] . "</div>";
                    echo "<div>" . $row['idnhanvien'] . "</div>";
					echo "<div>";
					echo "<form action='report.php' method='post' style='display:inline;'>";
					echo "<input type='hidden' name='ID' value='" . $row['thoigian'] . "'>";
					echo "<button type='submit' name='button-remove'>Remove</button>";
					echo "</form>";
					echo "<form action='editrep.php' method='post' style='display:inline;'>";
					echo "<input type='hidden' name='ID' value='" . $row['thoigian'] . "'>";
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