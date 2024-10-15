<?php
include "connect.php";

// Kiểm tra nếu form được gửi với button "button-edit"
if (isset($_POST['button-edit'])) {
    $id = $_POST['ID'];

    // Truy vấn thông tin độc giả theo id
    $sql = "SELECT * FROM phieumuon WHERE idphieumuon = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
}

// Kiểm tra nếu form được submit để cập nhật thông tin
if (isset($_POST['submit'])) {
    $id = $_POST['ID'];
    $LoanDay = $_POST['LoanDay'];
    $ExpiredDay = $_POST['ExpiredDay'];
    $BookID = $_POST['BookID'];

    // Cập nhật thông tin độc giả trong cơ sở dữ liệu
    $sql1 = "UPDATE phieumuon SET ngaymuon = ?, ngaydenhan = ?, idsach = ? WHERE idphieumuon = ?";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->bind_param("ssii", $LoanDay, $ExpiredDay, $BookID, $id);
    if ($stmt1->execute()) {
        echo "Cập nhật thông tin thành công.";
    } else {
        echo "Lỗi: " . $stmt1->error;
    }
    
    // Điều hướng lại về trang danh sách độc giả hoặc trang khác nếu cần
    header("Location: loanstaff.php");
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa thông tin phiếu mượn</title>
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
        <h1>Chỉnh sửa thông tin phiếu mượn</h1>
        <?php if (isset($row)): ?>
            <form action="editloan.php" method="post">
                <input type="hidden" name="ID" value="<?php echo $row['idphieumuon']; ?>">
                <label for="LoanDay">LOAN DAY:</label>
                <input type="text" id="LoanDay" name="LoanDay" value="<?php echo $row['ngaymuon']; ?>" required><br>
                <label for="ExpiredDay">EXPIRED DAY:</label>
                <input type="text" id="ExpiredDay" name="ExpiredDay" value="<?php echo $row['ngaydenhan']; ?>" required><br>
                <label for="BookID">BOOK ID:</label>
                <input type="text" id="BookID" name="BookID" value="<?php echo $row['idsach']; ?>" required><br>
                <button type="submit" name="submit">Cập nhật</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
