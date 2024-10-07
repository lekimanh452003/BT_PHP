<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>In bảng cửu chương</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .container {
            background-color: #E6F3FF;
            padding: 10px;
            border-radius: 5px;
        }
        h1 {
            color: white;
            background-color: #0066CC;
            text-align: center;
            margin: 0;
            padding: 10px 0;
        }
        .input-group {
            margin-left: 250px;
            padding: 10px 0px;;
        }
        label {
            display: inline-block;
            width: 100px;
        }
        input[type="number"] {
            width: 150px;
            padding: 5px;
        }
        input[type="submit"] {
            background-color: #bebec0;
            color: black;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            display: block;
            margin: 10px auto;
        }
        .result {
            margin-top: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            vertical-align: top;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>IN BẢNG CỬU CHƯƠNG</h1>
        <form method="post">
            <div class="input-group">
                <label for="start">Bắt đầu từ:</label>
                <input type="number" id="start" name="start" min="1" max="10" required>
            </div>
            <div class="input-group">
                <label for="end">Kết thúc tại:</label>
                <input type="number" id="end" name="end" min="1" max="10" required>
            </div>
            <input type="submit" value="In bảng cửu chương">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $start = intval($_POST["start"]);
            $end = intval($_POST["end"]);
            
            if ($start <= $end && $start >= 1 && $end <= 10) {
                echo "<div class='result'>";
                echo "<table><tr>";
                
                for ($i = $start; $i <= $end; $i++) {
                    echo "<td>";
                    for ($j = 1; $j <= 10; $j++) {
                        $result = $i * $j;
                        echo "$i x $j = $result<br>";
                    }
                    echo "</td>";
                }
                
                echo "</tr></table>";
                echo "</div>";
            } else {
                echo "<p>Vui lòng nhập số bắt đầu và số kết thúc hợp lệ (từ 1 đến 10, và số bắt đầu không lớn hơn số kết thúc).</p>";
            }
        }
        ?>
    </div>
</body>
</html>