<?php
include "connect.php";

// Kiểm tra nếu form được gửi với button "button-edit"
if (isset($_POST['button-edit'])) {
    $id = $_POST['ID'];

    // Truy vấn thông tin độc giả theo id
    $sql = "SELECT * FROM sach WHERE idsach like '%$id%'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}

// Kiểm tra nếu form được submit để cập nhật thông tin
if (isset($_POST['submit'])) {
    $Id = $_POST['idsach'];
    $Ten = $_POST['ten'];
	$Phanloai=$_POST['phanloai'];
    $Luotmuon = $_POST['luotmuon'];
    $Phimuon = $_POST['phimuon'];
    $Trangthai = $_POST['trangthai'];

    // Cập nhật thông tin độc giả trong cơ sở dữ liệu
    $sql1 = "UPDATE sach SET ten = '$Ten', phanloai = '$Phanloai',luotmuon='$Luotmuon', phimuon = '$Phimuon', trangthai = '$Trangthai' WHERE idsach LIKE '%$Id%'";
    if (mysqli_query($conn, $sql1)) {
        echo "Cập nhật thông tin thành công.";
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
    
    // Điều hướng lại về trang danh sách độc giả hoặc trang khác nếu cần
    header("Location: book.php");
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
        <h1>Chỉnh sửa thông tin sách</h1>
        <?php if (isset($row)): ?>
            <form action="editbook.php" method="post">
                <input type="hidden" name="idsach" value="<?php echo $row['idsach']; ?>">
                <label for="ten">NAME:</label>
                <input type="text" id="ten" name="ten" value="<?php echo $row['ten']; ?>" required><br>
                <label for="phanloai">GENRE:</label>
                <input type="text" id="phanloai" name="phanloai" value="<?php echo $row['phanloai']; ?>" required><br>
                <label for="luotmuon">TIMES BORROWED:</label>
                <input type="text" id="luotmuon" name="luotmuon" value="<?php echo $row['luotmuon']; ?>" required><br>
                <label for="phimuon">PRICE:</label>
                <input type="text" id="phimuon" name="phimuon" value="<?php echo $row['phimuon']; ?>" required><br>
                <label for="trangthai">STATUS:</label>
                <input type="text" id="trangthai" name="trangthai" value="<?php echo $row['trangthai']; ?>" required><br>
                <button type="submit" name="submit">Cập nhật</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
