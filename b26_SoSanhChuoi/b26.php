<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>So sánh chuỗi</title>
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
            color: white;
            text-align: center;
            background-color: #309d93;
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
            margin-left: 150px;
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
            color:red;
            border: 1px solid #ddd; 
            background-color: #FFFFE0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>So sánh chuỗi</h2>
        <form method="post">
            <div class="form-group">
                <label for="chuoi1">Chuỗi 1:</label>
                <input type="text" id="chuoi1" name="chuoi1" value="<?php echo isset($_POST['chuoi1']) ? htmlspecialchars($_POST['chuoi1']) : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="chuoi2">Chuỗi 2:</label>
                <input type="text" id="chuoi2" name="chuoi2" value="<?php echo isset($_POST['chuoi2']) ? htmlspecialchars($_POST['chuoi2']) : ''; ?>" required>
            </div>
            <input type="submit" value="So sánh">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $chuoi1 = $_POST["chuoi1"];
            $chuoi2 = $_POST["chuoi2"];

            $kq = strcasecmp($chuoi1, $chuoi2);

            echo "<div class='result'>";
            if ($kq == 0) {
                echo "Hai chuỗi giống nhau.";
            } elseif ($kq > 0) {
                echo "Chuỗi thứ nhất dài hơn chuỗi thứ hai.";
            } else {
                echo "Chuỗi thứ nhất ngắn hơn chuỗi thứ hai.";
            }
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
