<?php
$Toan = $Ly = $Hoa = $Tong = $tongDiem = '';
$diemChuan=20;
$ketQua='';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Toan = isset($_POST['toan']) ? floatval($_POST['toan']) : 0;
    $Ly = isset($_POST['ly']) ? floatval($_POST['ly']) : 0;
    $Hoa = isset($_POST['hoa']) ? floatval($_POST['hoa']) : 0;
   
    
    $tongDiem = $Toan+$Ly+$Hoa;
    $ketQua = ($tongDiem >= $diemChuan) ? "Đậu" : "Trượt";
 
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết Quả Thi Đại Học</title>
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
        .result {
            background-color: #FFFFE0;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #E6DB55;
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
        <h2>KẾT QUẢ THI ĐẠI HỌC</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="toan">Toán:</label>
                <input type="number" id="toan" name="toan" step="0.1" value="<?php echo $Toan; ?>" required>
            </div>
            <div class="form-group">
                <label for="ly">Lý:</label>
                <input type="number" id="ly" name="ly" step="0.1" value="<?php echo $Ly; ?>" required>
            </div>
            <div class="form-group">
                <label for="hoa">Hóa:</label>
                <input type="number" id="hoa" name="hoa" value="<?php echo $Hoa; ?>" required>
            </div>
            <div class="form-group">
                <label for="diemchuan">Điểm chuẩn:</label>
                <input type="number" id="diemchuan" name="diemchuan" value="<?php echo $diemChuan; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="tongdiem">Tổng điểm:</label>
                <input type="number" id="tongdiem" name="tongdiem" value="<?php echo $tongDiem; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="ketquathi">Kết quả thi:</label>
                <input type="text" id="ketquathi" name="ketquathi" value="<?php echo $ketQua; ?>" readonly>
            </div>
            <input type="submit" value="Xem kết quả">
        </form>
    </div>
</body>
</html>