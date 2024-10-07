<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm thứ trong tuần</title>
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
            background-color: #f19ddd;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 500px;
        }
        h2 {
            color: white;
            text-align: center;
            background-color: #b225be;
            padding: 10px;
            margin: -20px -20px 20px -20px;
            border-radius: 8px 8px 0 0;
        }
        input[type="number"] {
            width: 50px;
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
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
            background-color: #ffb6c1;
        }
        .result {    
            background-color: #FFFFE0;
            padding: 10px;
            margin-top: 15px;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>TÌM THỨ TRONG TUẦN</h2>
        <form method="post">
            <div class="form-group">
                <label>Ngày/tháng/năm: </label>
                <input type="number" name="ngay" value="<?php echo isset($_POST['ngay']) ? $_POST['ngay'] : ''; ?>" required><label>/</label>
                <input type="number" name="thang" value="<?php echo isset($_POST['thang']) ? $_POST['thang'] : ''; ?>" required><label>/</label>
                <input type="number" name="nam" value="<?php echo isset($_POST['nam']) ? $_POST['nam'] : ''; ?>" required>
                <input type="submit" value="Tìm thứ trong tuần">
            </div>
        </form>
        <div class="result">
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $ngay = $_POST['ngay'];
                $thang = $_POST['thang'];
                $nam = $_POST['nam'];

                $jd = cal_to_jd(CAL_GREGORIAN, $thang, $ngay, $nam); //chuyển ngày dương lịch (Gregorian calendar) thành số ngày Julian.
                $day = jddayofweek($jd, 0);// trả về chỉ số nyaf trong tuần, từ 0-CN

                switch ($day) {
                    case 0:
                        $thu = "Chủ Nhật";
                        break;
                    case 1:
                        $thu = "Thứ Hai";
                        break;
                    case 2:
                        $thu = "Thứ Ba";
                        break;
                    case 3:
                        $thu = "Thứ Tư";
                        break;
                    case 4:
                        $thu = "Thứ Năm";
                        break;
                    case 5:
                        $thu = "Thứ Sáu";
                        break;
                    case 6:
                        $thu = "Thứ Bảy";
                        break;
                    default:
                        $thu = "Không xác định";
                }

                echo "Ngày $ngay tháng $thang năm $nam là ngày $thu";
            }
            ?>
        </div>
    </div>
</body>
</html>