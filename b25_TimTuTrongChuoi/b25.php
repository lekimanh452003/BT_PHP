<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tìm từ trong chuỗi</title>
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
            background-color: #97f1da;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 450px;
        }
        h2 {
            color: red;
            text-align: center;
            background-color: pink;
            padding: 10px;
            margin: -20px -20px 20px -20px;
            border-radius: 8px 8px 0 0;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: inline-block;
            margin-bottom: 5px;
            width: 70px;
        }
        input[type="text"] {
            width: 300px;
            padding: 5px;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #309d93;
            margin-left: 100px;
            margin-top: 20px;
            color: black;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
        .result {
            margin-top: 20px;
            padding: 10px;
            background-color: #f0f0f0;
            border: 1px solid #ddd; 
            background-color: #FFFFE0;
        }
    </style>
</head>
<body>
    <div class="container">
    <h2>Tìm từ trong chuỗi</h2>
        <form method="post">
            <div class="form-group">
                <label for="chuoi">Chuỗi:</label>
                <input type="text" id="chuoi" name="chuoi" value="<?php echo isset($_POST['chuoi']) ? htmlspecialchars($_POST['chuoi']) : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="tu_tim">Từ cần tìm:</label>
                <input type="text" id="tu_tim" name="tu_tim" value="<?php echo isset($_POST['tu_tim']) ? htmlspecialchars($_POST['tu_tim']) : ''; ?>" required>
            </div>
            <input type="submit" value="Tìm kiếm">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $chuoi = $_POST["chuoi"];
            $tu_tim = $_POST["tu_tim"];

            $kq = strpos($chuoi, $tu_tim);

            echo "<div class='result'>";
            if ($kq !== false) {
                echo "Tìm thấy từ '<strong>" . htmlspecialchars($tu_tim) . "</strong>' trong chuỗi tại vị trí số <strong>" . $kq . "</strong>.";
            } else {
                echo "Không tìm thấy từ trong chuỗi.";
            }
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
