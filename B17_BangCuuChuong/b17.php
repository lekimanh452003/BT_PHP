<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bảng cửu chương</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
        }
        .container {
            background-color: #00CED1;
            padding: 10px;
            border-radius: 5px;
        }
        h1 {
            color: white;
            text-align: center;
            margin: 0;
            padding: 10px 0;
        }
        h2{
            text-align: center;
            background-color: #00CED1;
        }
        .input-group {
            background-color: #E0FFFF;
            padding: 10px;
            margin-bottom: 10px;
        }
        label {
            display: inline-block;
            width: 100px;
        }
        input[type="number"] {
            width: 50px;
            padding: 5px;
        }
        input[type="submit"] {
            background-color: #95dce0;
            color: black;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
        .result {
            background-color: #E0FFFF;
            color: white;
            padding: 10px;
        }
        .result h2 {
            margin: 0;
            padding: 5px 0;
        }
        .result-content {
            background-color: #E0FFFF;
            color: black;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>BẢNG CỬU CHƯƠNG</h1>
        <form method="post" class="input-group">
            <label for="number">Cửu chương:</label>
            <input type="number" id="number" name="number" min="1" max="10" required>
            <input type="submit" value="Thực hiện">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $number = intval($_POST["number"]);
            $chuoi = "";
            
            for ($i = 1; $i <= 10; $i++) {
                $result = $number * $i;
                $chuoi .= "$number x $i = $result<br>";
            }

            echo "<div class='result'>";
            echo "<h2>KẾT QUẢ</h2>";
            echo "<div class='result-content'>$chuoi</div>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>