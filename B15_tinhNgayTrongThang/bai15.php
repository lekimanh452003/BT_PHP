<?php
                    $thang=$nam="";
                    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính ngày trong tháng</title>
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
            width: 350px;
        }
        h2 {
            color: black;
            text-align: center;
            background-color: #f32f25;
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
        button {
            padding: 5px 10px;
            background-color: white;
            margin: 10px 100px;
            color: black;
            border: 1px solid #808080;
            border-radius: 3px;
            cursor: pointer;
            font-weight: bold;
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
        <h2>TÌM NGÀY TRONG THÁNG</h2>
        <form method="post">
            <div class="form-group">
                <div class="group1">
                    <label>Tháng / Năm: </label>
                    <input type="number" name="thang" value="<?php echo isset($_POST['thang']) ? $_POST['thang'] : ''; ?>">

                    <label>/</label>
                    <input type="number" name="nam" value="<?php echo isset($_POST['nam']) ? $_POST['nam'] : ''; ?>"><br>
                    <button type="submit">Tính số ngày</button>
                </div>
                <div class="result">
                    <?php
                    $thang=$nam="";
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $thang = isset($_POST['thang']) ? intval($_POST['thang']) : 0;
                        $nam = isset($_POST['nam']) ? intval($_POST['nam']) : 0;
                        $ngay = 0;

                        switch ($thang) {
                            case 1: case 3: case 5: case 7: case 8: case 10: case 12:
                                $ngay = 31;
                                break;
                            case 4: case 6: case 9: case 11:
                                $ngay = 30;
                                break;
                            case 2:
                                if (($nam % 400 == 0) || ($nam % 4 == 0 && $nam % 100 != 0)) {
                                    $ngay = 29;
                                } else {
                                    $ngay = 28;
                                }
                                break;
                            default:
                                $ngay = "Tháng không hợp lệ";
                        }

                        echo "Tháng $thang năm $nam có $ngay ngày. ";
                    }
                    ?>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
