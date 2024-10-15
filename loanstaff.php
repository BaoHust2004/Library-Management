<?php
        include "connect.php";
        $limit = 15;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $limit;
        
        
        if (isset($_POST['button-add'])) {
            $id = $_POST['ID'];
            $LoanDay = $_POST['LoanDay'];
            $ExpiredDay = $_POST['ExpiredDay'];
            $BookID=$_POST['BookID'];
        
            $sql1 = "INSERT INTO phieumuon (idphieumuon, ngaymuon, ngaydenhan,idsach) VALUES ('$id', '$LoanDay', '$ExpiredDay','$BookID')";
            mysqli_query($conn, $sql1);
            $sql = "SELECT * FROM phieumuon LIMIT $start, $limit";
            $result = mysqli_query($conn, $sql);
            $total_records_query = "SELECT COUNT(*) FROM phieumuon";
            $total_records_result = mysqli_query($conn, $total_records_query);
            $total_records = mysqli_fetch_array($total_records_result)[0];
        
            $total_pages = ceil($total_records / $limit);
        }
        
        else if (isset($_POST['button-remove'])) {
            $id = $_POST['ID'];
        
            $sql1 = "DELETE FROM phieumuon WHERE idphieumuon = '$id'";
        
            mysqli_query($conn, $sql1);
            $sql = "SELECT * FROM phieumuon LIMIT $start, $limit";
            $result = mysqli_query($conn, $sql);
            $total_records_query = "SELECT COUNT(*) FROM phieumuon";
            $total_records_result = mysqli_query($conn, $total_records_query);
            $total_records = mysqli_fetch_array($total_records_result)[0];
        
            $total_pages = ceil($total_records / $limit);
        }
        
        if (isset($_POST['button-search'])) {
            $id = $_POST['ID'];
            $LoanDay = $_POST['LoanDay'];
            $ExpiredDay = $_POST['ExpiredDay'];
            $BookID=$_POST['BookID'];
        
            $condition = "1=1"; // Mặc định là true để xây dựng điều kiện WHERE
            if (!empty($id)) {
                $condition .= " AND idphieumuon = '$id'";
            }
            if (!empty($LoanDay)) {
                $condition .= " AND ngaymuon LIKE '%$LoanDay%'";
            }
            if (!empty($ExpiredDay)) {
                $condition .= " AND ngaydenhan LIKE '%$ExpiredDay%'";
            }
            if (!empty($BookID)) {
                $condition .= " AND idsach = '$BookID'";
            }
        
            $sql = "SELECT * FROM phieumuon WHERE $condition LIMIT $start, $limit";
            $result = mysqli_query($conn, $sql);
        
            // Đếm tổng số bản ghi theo điều kiện
            $total_records_query = "SELECT COUNT(*) FROM phieumuon WHERE $condition";
            $total_records_result = mysqli_query($conn, $total_records_query);
            $total_records = mysqli_fetch_array($total_records_result)[0];
            $total_pages = ceil($total_records / $limit);
        }
        else {
            $sql = "SELECT * FROM phieumuon LIMIT $start, $limit";
            $result = mysqli_query($conn, $sql);
            $total_records_query = "SELECT COUNT(*) FROM phieumuon";
            $total_records_result = mysqli_query($conn, $total_records_query);
            $total_records = mysqli_fetch_array($total_records_result)[0];
        
            $total_pages = ceil($total_records / $limit);
        }
?>
<html lang="en">
          <head>
            <meta charset="utf-8">
          
            <title>Html Generated</title>

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
    grid-template-columns: repeat(5, 1fr);
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
    max-width: 218px; /* Đã thay đổi từ 16% thành 200px */
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
				<h1>LOAN SLIP'S LIST</h1>
			</div>
			<div class="content">
				<div class="sidebar">
					<h2>LOAN SLIP</h2>
					<a href="staffinfo.php">PROFILE</a>
					<a href="customer.php">CUSTOMER</a>
					<a href="report.php">REPORT</a>
                    <a href="book.php">BOOK</a>
				</div>
				<div class="main">
                <div class="form-change">
				<form action="loanstaff.php" class="form-edit" method="post" enctype="multipart/form-data">
					<input type="text" class="form-container" placeholder="ID" name="ID">  
					<input type="text" class="form-container" placeholder="Loan Day" name="LoanDay">  
					<input type="text" class="form-container" placeholder="Expired Day" name="ExpiredDay"> 
                    <input type="text" class="form-container" placeholder="Book ID" name="BookID"> 
					<button class="bt" name="button-add">ADD</button>
					<button class="bt" name="button-search">SEARCH</button>
				</form>
				</div>
				<div class="table-container">
        <div class="grid-container">
            <div class="header1">LOAN SLIP ID</div>
            <div class="header1">LOAN DAY</div>
            <div class="header1">EXPIRED DAY</div>
            <div class="header1">BOOK ID</div>
            <div class="header1">ACTION</div>
            <?php
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div>" . $row['idphieumuon'] . "</div>";
                echo "<div>" . $row['ngaymuon'] . "</div>";
                echo "<div>" . $row['ngaydenhan'] . "</div>";
                echo "<div>" . $row['idsach'] . "</div>";
                echo "<div>";
                echo "<form action='loanstaff.php' method='post' style='display:inline;'>";
                echo "<input type='hidden' name='ID' value='" . $row['idphieumuon'] . "'>";
                echo "<button type='submit' name='button-remove'>Remove</button>";
                echo "</form>";
                echo "<form action='editloan.php' method='post' style='display:inline;'>";
                echo "<input type='hidden' name='ID' value='" . $row['idphieumuon'] . "'>";
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