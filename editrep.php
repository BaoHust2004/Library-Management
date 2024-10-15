<?php
include "connect.php";

// Kiểm tra nếu form được gửi với button "button-edit"
if (isset($_POST['button-edit'])) {
    $id = $_POST['ID'];

    // Truy vấn thông tin độc giả theo id
    $sql = "SELECT * FROM baocaothang WHERE thoigian like '%$id%'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}

// Kiểm tra nếu form được submit để cập nhật thông tin
if (isset($_POST['submit'])) {
    $Time = $_POST['Time'];
    $Income = $_POST['Income'];
    $Expense = $_POST['Expense'];
    $Quantity = $_POST['Quantity'];
    $Staff = $_POST['Staff'];

    // Cập nhật thông tin độc giả trong cơ sở dữ liệu
    $sql1 = "UPDATE baocaothang SET thu = '$Income', chi = '$Expense', soluongsachchuatra = '$Quantity', idnhanvien = '$Staff' WHERE thoigian LIKE '%$Time%'";
    if (mysqli_query($conn, $sql1)) {
        echo "Cập nhật thông tin thành công.";
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
    
    // Điều hướng lại về trang danh sách độc giả hoặc trang khác nếu cần
    header("Location: report.php");
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa thông tin báo cáo tháng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            padding: 8px 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Chỉnh sửa thông tin báo cáo tháng</h1>
        <?php if (isset($row)): ?>
            <form action="editrep.php" method="post">
                <input type="hidden" name="Time" value="<?php echo $row['thoigian']; ?>">
                <label for="Income">INCOME:</label>
                <input type="text" id="Income" name="Income" value="<?php echo $row['thu']; ?>" required><br>
                <label for="Expense">EXPENSE:</label>
                <input type="text" id="name" name="Expense" value="<?php echo $row['chi']; ?>" required><br>
                <label for="Quantity">QUANTITY:</label>
                <input type="text" id="Quantity" name="Quantity" value="<?php echo $row['soluongsachchuatra']; ?>" required><br>
                <label for="Staff">STAFF ID:</label>
                <input type="text" id="Staff" name="Staff" value="<?php echo $row['idnhanvien']; ?>" required><br>
                <button type="submit" name="submit">Cập nhật</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
