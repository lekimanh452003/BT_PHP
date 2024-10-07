<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính năm âm lịch</title>
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
            width: 450px;
        }
        h1 {
            color: white;
            text-align: center;
            background-color: #b225be;
            padding: 10px;
            margin: -20px -20px 20px -20px;
            border-radius: 8px 8px 0 0;
        }
        input[type="number"], input[type="text"] {
            width: 150px;
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            padding: 5px 10px;
            background-color: #c0c0c0;
            color: black;
            border: 1px solid #808080;
            border-radius: 3px;
            cursor: pointer;
            font-weight: bold;
        }
        button:hover {
            background-color: #ffb6c1;
        }
        .input-group {
            display: flex;
            align-items: center; 
            margin-bottom: 10px;
            gap: 150px;
         }
         .input-group-2 {
            margin-bottom: 10px;
            float: left;
        }

      
    </style>
</head>
<body>
    <div class="container">
        <h1>TÍNH NĂM ÂM LỊCH</h1>
        <?php
        $so = $chu = '';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $so = isset($_POST['so']) ? intval($_POST['so']) : 0;
            if ($so < 0) {
                $error = "Vui lòng nhập một số dương!";
            } else {
                $chu = tinhNamAmLich($so);
            }
        }

        function tinhNamAmLich($nam) {
            $can = ['Canh', 'Tân', 'Nhâm', 'Quý', 'Giáp', 'Ất', 'Bính', 'Đinh', 'Mậu', 'Kỷ'];
            $chi = ['Thân', 'Dậu', 'Tuất', 'Hợi', 'Tý', 'Sửu', 'Dần', 'Mão', 'Thìn', 'Tỵ', 'Ngọ', 'Mùi'];
            
            $canIndex = ($nam - 1900) % 10;
            $chiIndex = ($nam - 1900) % 12;
            
            return $can[$canIndex] . ' ' . $chi[$chiIndex];
        }
        ?>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
            <div class="input-group">
                <label>Năm dương lịch</label> 
                <label>Năm âm lịch</label>
            </div>
            <div class="input-group-2">
                <input type="number" name="so" id="so" min="0" value="<?php echo htmlspecialchars($so); ?>" required>
                &emsp;
                <button type="submit">=&gt;</button>&emsp;
                <input type="text" name="chu" value="<?php echo htmlspecialchars($chu); ?>" readonly>
            </div>
        </form>   
    </div>
</body>
</html>