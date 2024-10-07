<?php
$a = isset($_POST['a']) ? $_POST['a'] : 2;
$b = isset($_POST['b']) ? $_POST['b'] : 1;
$x = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (is_numeric($a) && is_numeric($b)) {
        if ($a != 0) {
            $x = -$b / $a;
        } else {
            $error = "Hệ số a không thể bằng 0.";
        }
    } else {
        $error = "Vui lòng nhập số hợp lệ.";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giải Phương Trình Bậc Nhất</title>
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
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 400px;
        }
        h2 {
            color: #8B4513;
            text-align: center;
            background-color: #FFD700;
            padding: 10px;
            margin: -20px -20px 20px -20px;
            border-radius: 8px 8px 0 0;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: inline-block;
            width: 120px;
        }
        input[type="number"] {
            width: 50px;
            padding: 5px;
            border: 1px solid #ccc;
        }
        .equation {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }
        .equation span {
            margin: 0 5px;
        }
        .result {
            width: 180px;
            background-color: #FFFFE0;
            padding: 5px;
            margin-bottom: 15px;
            border: 1px solid #E6DB55;
        }
        .submit-btn {
            background-color: #c0c0c0;
            color: black;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>GIẢI PHƯƠNG TRÌNH BẬC NHẤT</h2>
        <form method="post">
            <div class="form-group">
                
                <div class="equation">
                <label>Phương trình:</label> <input type="number" name="a" value="<?php echo $a; ?>" required>
                    <span>x +</span>
                    <input type="number" name="b" value="<?php echo $b; ?>" required>
                    <span>= 0</span>
                </div>
            </div>
            <div class="equation"> 
                <label>Nghiệm:</label><?php if (isset($x) && $x !== ''): ?>
                <div class="result">  
                    x = <?php echo number_format($x, 2); ?>
                </div>
            <?php endif; ?>
            </div>
            
            <?php if (isset($error)): ?>
                <div class="error"><?php echo $error; ?></div>
            <?php endif; ?>
            <input type="submit" value="Giải phương trình" class="submit-btn">
        </form>
    </div>
</body>
</html>