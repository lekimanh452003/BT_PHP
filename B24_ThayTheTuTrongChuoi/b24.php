<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thay thế từ trong chuỗi</title>
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
            background-color: #fbc1be;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 450px;
        }
        h2 {
            color: white;
            text-align: center;
            background-color: #ff6600;;
            padding: 10px;
            margin: -20px -20px 20px -20px;
            border-radius: 8px 8px 0 0;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"] {
            width: 100%;
            padding: 5px;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: orange;
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
            background-color: #f0f0f0;
            border: 1px solid #ddd; 
            background-color: #FFFFE0;

        }
    </style>
</head>
<body>
    <div class="container">
    <h2>Thay thế từ trong chuỗi</h2>
    <form method="post">
        <div class="form-group">
            <label for="chuoi">Chuỗi:</label>
            <input type="text" id="chuoi" name="chuoi" required>
        </div>
        <div class="form-group">
            <label for="tu_goc">Từ gốc:</label>
            <input type="text" id="tu_goc" name="tu_goc" required>
        </div>
        <div class="form-group">
            <label for="tu_thay">Từ thay thế:</label>
            <input type="text" id="tu_thay" name="tu_thay" required>
        </div>
        <input type="submit" value="Thay thế">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $chuoi = $_POST["chuoi"];
        $tu_goc = $_POST["tu_goc"];
        $tu_thay = $_POST["tu_thay"];

        $chuoi_kq = str_replace($tu_goc, $tu_thay, $chuoi);

        echo "<div class='result'>";
        echo "<strong></strong>" . htmlspecialchars($chuoi_kq);
        echo "</div>";
    }
    ?>
    </div>
</body>
</html>