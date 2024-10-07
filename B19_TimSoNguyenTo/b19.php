<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm Số Nguyên Tố</title>
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
            
            background-color: #ebe491;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 450px;    
        }

        h2 {
            color: #6b4320;
            text-align: center;
            background-color: #f1a35f;
            padding: 10px;
            margin: -20px -20px 20px -20px;
            border-radius: 8px 8px 0 0;
        }
        .group {
            display: flex; 
            flex-direction: column;  
            justify-content: center; 
            align-items: center;    
            width: 100%;            
            }
        input[type="text"] {
            padding: 8px;
            font-size: 14px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #f39c12;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        .result {
            margin-top: 20px;
            background-color: #f5b7b1;
            padding: 10px;
            border-radius: 4px;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>TÌM SỐ NGUYÊN TỐ</h2>
        <form method="post" action="">
            <div class="group">
            <label for="n">Nhập N:</label>
            <input type="text" id="n" name="n" required>
            <br><br>
            <input type="submit" value="Các nguyên tố => N">
            </div>
        </form>

        <?php
        // Kiểm tra xem form đã được submit hay chưa
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $n = intval($_POST['n']);  // Lấy giá trị N từ form
            if ($n < 2) {
                echo "<div class='result'>Không có số nguyên tố nào nhỏ hơn hoặc bằng $n.</div>";
            } else {
                echo "<div class='result'>Các số nguyên tố <= $n là: " . findPrimeNumbers($n) . "</div>";
            }
        }

        // Hàm kiểm tra số nguyên tố
        function kt_snt($so) {
            if ($so < 2) {
                return 0;
            }
            for ($i = 2; $i <= sqrt($so); $i++) {
                if ($so % $i == 0) {
                    return 0;
                }
            }
            return 1;
        }

        // Hàm tìm các số nguyên tố <= N
        function findPrimeNumbers($n) {
            $primeNumbers = "2";
            for ($i = 3; $i <= $n; $i += 2) {
                if (kt_snt($i)) {
                    $primeNumbers .= " " . $i;
                }
            }
            return $primeNumbers;
        }
        ?>
    </div>
</body>
</html>
