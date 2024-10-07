<?php
    $a = $b = $uscln = $bscnn = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $a = intval($_POST['a']);
        $b = intval($_POST['b']);

        // Hàm tính USCLN bằng vòng lặp do...while
        function tim_uscln($a, $b) {
            while ($b != 0) {
                $temp = $b;
                $b = $a % $b;
                $a = $temp;
            }
            return $a;
        }

        // Tìm USCLN
        $uscln = tim_uscln($a, $b);

        // Tính BSCNN theo công thức BSCNN = (A * B) / USCLN
        $bscnn = ($a * $b) / $uscln;
    }
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ước số chung lớn nhất và Bội số chung nhỏ nhất</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #f7e7a9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 350px;
        }
        h2 {
            color: #b34e00;
            text-align: center;
            background-color: #ffcd94;
            padding: 10px;
            margin: -20px -20px 20px -20px;
            border-radius: 8px 8px 0 0;
        }
        label {
            display: inline-block;
            margin-bottom: 10px;
            width:70px;
        }
        input[type="text"], input[type="number"] {
            width: 200px;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            margin-left: 50px;
            width: 200px;
            background-color: yellow;
            color: black;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #ff9933;
        }
        #result {
            background-color: #f5b7b1;
            padding: 10px;
            border-radius: 4px;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>ƯỚC SỐ CHUNG LỚN NHẤT<br>và BỘI SỐ CHUNG NHỎ NHẤT</h2>
        <form method="post" action="">
            <label>Số A:</label>
            <input type="number" name="a" value="<?php echo $a; ?>" required>
            <br></br>
            
            <label>Số B:</label>
            <input type="number" name="b" value="<?php echo $b; ?>" required>
            <br></br>
            
            <label>USCLN:</label>
            <input type="number" id="result" value="<?php echo $uscln; ?>" readonly>
            <br></br>
            
            <label>BSCNN:</label>
            <input type="number" id="result" value="<?php echo $bscnn; ?>" readonly>
            <br></br>
            
            <input type="submit" value="Tìm USCLN và BSCNN">
        </form>
    </div>
</body>
</html>
