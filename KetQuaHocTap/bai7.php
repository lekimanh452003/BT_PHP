<?php
$diemHK1 = $diemHK2 = $diemTB = $ketQua = $xepLoai = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $diemHK1 = isset($_POST['diemHK1']) ? floatval($_POST['diemHK1']) : 0;
    $diemHK2 = isset($_POST['diemHK2']) ? floatval($_POST['diemHK2']) : 0;
    
    $diemTB = round(($diemHK1 + $diemHK2 * 2) / 3, 1);
    
    $ketQua = ($diemTB >= 5) ? "Được lên lớp" : "Ở lại lớp";
    
    if ($diemTB >= 8) {
        $xepLoai = "Giỏi";
    } elseif ($diemTB >= 7) {
        $xepLoai = "Khá";
    } elseif ($diemTB >= 5) {
        $xepLoai = "Trung bình";
    } else {
        $xepLoai = "Yếu";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết Quả Học Tập</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }
        .container {
            background-color: #f37cd6;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            background-color: #e91e63;
            color: white;
            padding: 10px;
            margin: -20px -20px 20px -20px;
            border-radius: 8px 8px 0 0;
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: inline-block;
            width: 150px;
        }
        input[type="text"], input[type="number"] {
            width: 200px;
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"] {
            display: block;
            width: 200px;
            padding: 5px;
            background-color: #c0c0c0;
            color: black;
            border: 1px solid #808080;
            border-radius: 3px;
            cursor: pointer;
            margin: 15px auto 0;
            font-weight: bold;
        }
        input[type="submit"]:hover {
            background-color: #a0a0a0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>KẾT QUẢ HỌC TẬP</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="diemHK1">Điểm HK1:</label>
                <input type="number" id="diemHK1" name="diemHK1" step="0.1" value="<?php echo $diemHK1; ?>" required>
            </div>
            <div class="form-group">
                <label for="diemHK2">Điểm HK2:</label>
                <input type="number" id="diemHK2" name="diemHK2" step="0.1" value="<?php echo $diemHK2; ?>" required>
            </div>
            <div class="form-group">
                <label for="diemTB">Điểm trung bình:</label>
                <input type="text" id="diemTB" name="diemTB" value="<?php echo $diemTB; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="ketQua">Kết quả:</label>
                <input type="text" id="ketQua" name="ketQua" value="<?php echo $ketQua; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="xepLoai">Xếp loại học lực:</label>
                <input type="text" id="xepLoai" name="xepLoai" value="<?php echo $xepLoai; ?>" readonly>
            </div>
            <input type="submit" value="Xem kết quả">
        </form>
    </div>
</body>
</html>