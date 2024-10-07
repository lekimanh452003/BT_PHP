
<?php
    $so=$chu = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $so = $_POST['so']?? '';
    
    if (is_numeric($so) && $so >= 0 && $so <= 9) {
        // Dùng switch case để chuyển số thành chữ
        switch ($so) {
            case 0:
                $chu = "Không";
                break;
            case 1:
                $chu = "Một";
                break;
            case 2:
                $chu = "Hai";
                break;
            case 3:
                $chu = "Ba";
                break;
            case 4:
                $chu = "Bốn";
                break;
            case 5:
                $chu = "Năm";
                break;
            case 6:
                $chu = "Sáu";
                break;
            case 7:
                $chu = "Bảy";
                break;
            case 8:
                $chu = "Tám";
                break;
            case 9:
                $chu = "Chín";
                break;
            default:
                $chu = "Giá trị không hợp lệ!";
                break;
        }
    } else {
        $chu = "Nhập một số (0->9)";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đọc Số</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color:  #BBDEFB;
            width: 400px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            background-color: #0066cc;
            text-align: center;
            color: white;
            padding: 10px;
            margin: -20px -20px 20px -20px;
            border-radius: 8px 8px 0 0;
        }
        .input-group {
            display: flex;
            align-items: center;
            float:left;
            margin-bottom: 10px;
        }
        label {
            margin-right: 10px;
        }
        input[type="number"] {
            width: 100px;
            padding: 5px;
        }
        button {
            margin: 0 10px;
            padding: 5px 10px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            cursor: pointer;
        }
        input[type="text"] {
            background-color: #ffffd0;
            padding: 5px;
            border: 1px solid #e0e0e0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>ĐỌC SỐ</h1>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
            <div class="input-group">
                <label for="number-input">Nhập số (0-&gt;9)</label>
                &emsp;&emsp;&emsp;&emsp;&emsp;
            </div>

            <div class="input-group">
                <label>Bằng chữ</label>
            </div>

            <div class="input-group">
                <input type="number" name="so" id="so" min="0" max="9" value="<?php echo htmlspecialchars($so); ?>" required>
                &emsp;
                <button type="submit">=&gt;</button>&emsp;
                <input type="text" name="chu" value="<?php echo htmlspecialchars($chu); ?>" readonly>
                
            </div>
        </form>   
    </div>
</body>
</html>