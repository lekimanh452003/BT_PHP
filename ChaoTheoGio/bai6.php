<?php
$gio = '';
$cauChao = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gio = $_POST['gio'] ?? '';
    if ($gio !== '') {
        if ($gio >= 0 && $gio < 13) {
            $cauChao = "Chào buổi sáng!";
        } elseif ($gio >= 13 && $gio < 19) {
            $cauChao = "Chào buổi chiều!";
        } elseif ($gio >= 19 && $gio <= 24) {
            $cauChao = "Chào buổi tối!";
        } else {
            $cauChao = "Giờ không hợp lệ. Vui lòng nhập lại!";
        }
    } else {
        $cauChao = "Vui lòng nhập giờ!";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chào theo giờ</title>
    <style>
        body {
            background-color: #E0F7FA;
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .container {
            background-color: #BBDEFB;
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px #888888;
        }
        h1 {
            color: blue;
            font-size: 24px;
            margin-bottom: 20px;
        }
        label, input, button {
            font-size: 18px;
            margin-bottom: 10px;
        }
        input {
            width: 50px;
            text-align: center;
        }
        #cauChao {
            margin-top: 20px;
            font-size: 20px;
            font-weight: bold;
        }
        button {
            padding: 5px 15px;
            background-color: #90CAF9;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #64B5F6;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>CHÀO THEO GIỜ</h1>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
            <label for="gio">Nhập giờ:</label>
            <input type="number" id="gio" name="gio" min="0" max="24" value="<?php echo htmlspecialchars($gio); ?>" required>
            <br>
            <label><?php echo htmlspecialchars($cauChao); ?></label>
            <br>
            <button type="submit">Chào</button>
        </form>
    </div>
</body>
</html>
