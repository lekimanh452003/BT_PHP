<?php
$start_time = isset($_POST['start_time']) ? $_POST['start_time'] : '';
$end_time = isset($_POST['end_time']) ? $_POST['end_time'] : '';
$total = '';
$message = '';

function calculateBill($start, $end) {
    $hours = $end - $start;
    if ($start >= 17) {
        return $hours * 45000;
    } elseif ($end <= 17) {
        return $hours * 30000;
    } else {
        $before_17 = 17 - $start;
        $after_17 = $end - 17;
        return ($before_17 * 30000) + ($after_17 * 45000);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($start_time != '' && $end_time != '') {
        if ($end_time > $start_time) {
            if ($start_time >= 9 && $end_time <= 24) {
                $total = calculateBill($start_time, $end_time);
            } else {
                $message = "Giờ hoạt động từ 9h đến 24h.";
            }
        } else {
            $message = "Giờ kết thúc phải > giờ bắt đầu";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính Tiền Karaoke</title>
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
            background-color: #008080;
            padding: 20px;
            border-radius: 8px;
            width: 400px;
        }
        h1 {
            color: white;
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: inline-block;
            width: 120px;
            color: white;
        }
        input[type="number"] {
            width: 100px;
            padding: 5px;
            border: 1px solid #ccc;
        }
        .result {
            width: 100px;
            padding: 5px;
            border: 1px solid #ccc;
            background-color: #90EE90;
           
        }
        input[type="submit"] {
            display: block;
            width: 200px;
            padding: 5px;
            background-color: #c0c0c0;
            color: black;
            border: 1px solid #808080;
            border-radius: 3px;
            cursor: pointer;
            margin: 15px auto 0;
            font-weight: bold;
        }
        input[type="submit"]:hover {
            background-color: #a0a0a0;
        }
        .message {
            color: yellow;
            margin-top: 10px;
        }
       
    </style>
</head>
<body>
    <div class="container">
        <h1>TÍNH TIỀN KARAOKE</h1>
        <form method="post">
            <div class="form-group">
                <label>Giờ bắt đầu:</label>
                <input type="number" name="start_time" value="<?php echo $start_time; ?>" required> (h)
            </div>
            <div class="form-group">
                <label>Giờ kết thúc:</label>
                <input type="number" name="end_time" value="<?php echo $end_time; ?>" required> (h)
            </div>
            <?php if ($total !== ''): ?>
                <div class="form-group">
                    <label>Tiền thanh toán:</label>
                    <input type="number" class="result" name="thanhtoan" value="<?php echo number_format($total, 0, ',', '.'); ?>" readonly> (VNĐ)
                </div>
           
            <?php endif; ?>
            <input type="submit" value="Tính tiền" class="submit-btn">
        </form>
        <?php if ($message): ?>
            <div class="message"><?php echo $message; ?></div>
        <?php endif; ?>
    </div>
</body>
</html>