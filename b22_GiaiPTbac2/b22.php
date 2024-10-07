<?php
$a = isset($_POST['a']) ? $_POST['a'] : 1;
$b = isset($_POST['b']) ? $_POST['b'] : 2;
$c = isset($_POST['c']) ? $_POST['c'] : 1;
$x1 = $x2 = '';
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (is_numeric($a) && is_numeric($b) && is_numeric($c)) {
        if ($a != 0) {
            $delta = $b * $b - 4 * $a * $c;
            if ($delta > 0) {
                $x1 = (-$b + sqrt($delta)) / (2 * $a);
                $x2 = (-$b - sqrt($delta)) / (2 * $a);
            } elseif ($delta == 0) {
                $x1 = $x2 = -$b / (2 * $a);
            } else {
                $error = "Phương trình vô nghiệm.";
            }
        } else {
            $error = "Hệ số a không thể bằng 0 trong phương trình bậc hai.";
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
    <title>Giải Phương Trình Bậc Hai</title>
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
            background-color: #f9f0d5;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 450px;
        }
        h2 {
            color: #8B4513;
            text-align: center;
            background-color: #FFD700;
            padding: 10px;
            margin: -20px -20px 20px -20px;
            border-radius: 8px 8px 0 0;
        }
       
        label {
            display: inline-block;
            width: 120px;
        }
        input[type="number"] {
            width: 50px;
            padding: 5px;
            border: 1px solid #ccc;
            color: red;
        }
        .equation {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }
        .equation span {
            margin: 0 5px;
            margin-bottom: 15px;
        }
        .result {
            width: 250px;
            background-color: #FFFFE0;
            padding: 5px;
            margin-bottom: 15px;
            border: 1px solid #E6DB55;
            color:red;
        }
        .submit-btn {
            background-color: #a6dfa0;
            color: black;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 150px;
            width: 200px;
        }
        .submit-btn:hover {
            background-color: #a9a9a9;
        }
        .error {
            color: red;
            margin-bottom: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>GIẢI PHƯƠNG TRÌNH BẬC HAI</h2>
        <form method="post">
            <div class="form-group">
                <div class="equation">
                    <label>Phương trình:</label>
                    <input type="number" name="a" value="<?php echo $a; ?>" required>
                    <span>x² +</span>
                    <input type="number" name="b" value="<?php echo $b; ?>" required>
                    <span>x +</span>
                    <input type="number" name="c" value="<?php echo $c; ?>" required>
                    <span>= 0</span>
                </div>
            </div>

            <div class="equation">
                <label>Kết quả:</label>
                <?php if ($x1 !== '' && $x2 !== ''): ?>
                    <div class="result">
                        <?php if ($x1 == $x2): ?>
                            Nghiệm kép: x = <?php echo number_format($x1, 2); ?>
                        <?php else: ?>
                            2 nghiệm p/b: x1 = <?php echo number_format($x1, 2); ?> , 
                            x2 = <?php echo number_format($x2, 2); ?>
                        <?php endif; ?>
                    </div>
                <?php elseif ($error): ?>
                    <div class="error"><?php echo $error; ?></div>
                <?php endif; ?>
            </div>

            <input type="submit" value="Giải phương trình" class="submit-btn">
        </form>
    </div>
</body>
</html>
