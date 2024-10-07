<?php
$so = $chu = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $so = $_POST['so'] ?? '';

    if (is_numeric($so) && $so >= 0 && $so <= 999) {
        // Chuyển số thành chữ
        $chu = docSo($so);
    } else {
        $chu = "Nhập một số (0->999)";
    }
}

function docSo($so) {
    $donVi = ["", "Một", "Hai", "Ba", "Bốn", "Năm", "Sáu", "Bảy", "Tám", "Chín"];
    $chuc = ["", "Mười", "Hai mươi", "Ba mươi", "Bốn mươi", "Năm mươi", "Sáu mươi", "Bảy mươi", "Tám mươi", "Chín mươi"];
    $tram = ["", "Một trăm", "Hai trăm", "Ba trăm", "Bốn trăm", "Năm trăm", "Sáu trăm", "Bảy trăm", "Tám trăm", "Chín trăm"];

    $hundreds = intval($so / 100);
    $tens = intval(($so % 100) / 10);
    $units = $so % 10;

    $result = "";

    if ($hundreds > 0) {
        $result .= $tram[$hundreds] . " ";
    }
    
    if ($tens > 0) {
        if ($tens == 1 && $units == 0) {
            $result .= $chuc[$tens]; // "Mười"
        } else {
            $result .= $chuc[$tens] . " ";
        }
    }
    
    if ($units > 0) {
        $result .= $donVi[$units];
    }

    return trim($result);
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
            background-color: #BBDEFB;
            width: 400px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
            margin-bottom: 10px;
        }
        label {
            margin-right: 10px;
            width:130px;
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
                <label for="number-input">Nhập số (0-&gt;999)</label>           
                <input type="number" name="so" id="so" min="0" max="999" value="<?php echo htmlspecialchars($so); ?>" required>
                <button type="submit">Đọc số</button>  
            </div>

            <div class="input-group">
                <label>Bằng chữ</label>
           
                <input type="text" name="chu" value="<?php echo htmlspecialchars($chu); ?>" readonly>
            </div>
        </form>   
    </div>
</body>
</html>
