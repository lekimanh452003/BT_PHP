<?php
$chieuDai = $chieuRong = $dienTich = '';
$error = '';// Khởi tạo biến vs giá trị rỗng

if ($_SERVER["REQUEST_METHOD"] == "POST") {//Kiểm tra form đã đc gửi chưa vs phương thức request là Post
    $chieuDai = $_POST['chieu-dai'] ?? '';// lấy giá trị từ form sử dụng toán tử null
    $chieuRong = $_POST['chieu-rong'] ?? '';

    if (is_numeric($chieuDai) && is_numeric($chieuRong)) {// KT giá trị nhập vào có phải số không
        $dienTich = $chieuDai * $chieuRong;
    } else {//Hiển thị thông báo lỗi nếu không phải số
        $error = "Vui lòng nhập số hợp lệ cho chiều dài và chiều rộng.";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diện Tích Hình Chữ Nhật</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #ffd700;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 400px;
        }
        h1 {
            color: #8b4513;
            text-align: center;
            margin-top: 0;
            font-size: 1.5em;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input {
            width: 100%;
            padding: 5px;
            margin-top: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            display: block;
            width: 50%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 15px auto 0;
            font-weight: bold;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        #dien-tich {
            background-color: #ffb6c1;
        }
        .error {
            color: red;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>DIỆN TÍCH HÌNH CHỮ NHẬT</h1> 
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
            <label for="chieu-dai">Chiều dài:</label> 
            <input type="number" id="chieu-dai" name="chieu-dai" value="<?php echo htmlspecialchars($chieuDai); ?>" required>
            
            <label for="chieu-rong">Chiều rộng:</label>
            <input type="number" id="chieu-rong" name="chieu-rong" value="<?php echo htmlspecialchars($chieuRong); ?>" required>
            
            <label for="dien-tich">Diện tích:</label>
            <input type="number" id="dien-tich" value="<?php echo htmlspecialchars($dienTich); ?>" readonly> 
            
            <input type="submit" value="Tính">
        </form>
        
        <?php 
        if (!empty($error)) { 
            echo "<p class='error'>$error</p>"; // báo lỗi nếu có
        }
        ?>
    </div>
</body>
</html>