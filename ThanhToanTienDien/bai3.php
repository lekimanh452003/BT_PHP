<?php
    $chiSoCu=$chiSoMoi=$donGia=$tenChuHo='';
    $thanhTien='';
    $error='';
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $chiSoCu=$_POST['chi-so-cu']??'';
        $chiSoMoi=$_POST['chi-so-moi']??'';
        $donGia=$_POST['don-gia']??'';
        if(is_numeric($chiSoCu) && is_numeric($chiSoMoi) && is_numeric($donGia)){
            $thanhTien=($chiSoMoi-$chiSoCu)* $donGia;
        }else{
            $error="Hãy nhập giá trị hợp lệ!!";
        }
    }
   
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh Toán Tiền Điện</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #ffd700;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 500px;
        }
        h1 {
            color: #8b4513;
            text-align: center;
            margin-top: 0;
            margin-bottom: 20px;
            font-size: 1.5em;
        }
        label {
            display: inline-block;
            width: 120px;
            margin-top: 10px;
        }
        input {
            width: 300px;
            padding: 5px;
            margin-top: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            display: block;
            width: 80px;
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
        #so-tien-thanh-toan {
            background-color: #ffb6c1;
        }
        .unit {
            display: inline-block;
            margin-left: 5px;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>THANH TOÁN TIỀN ĐIỆN</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="ten-chu-ho">Tên chủ hộ:</label>
            <input type="text" id="ten-chu-ho" name="ten-chu-ho" value="<?php echo htmlspecialchars($tenChuHo);?>"required>
            
            <label for="chi-so-cu">Chỉ số cũ:</label>
            <input type="number" id="chi-so-cu" name="chi-so-cu" value="<?php echo htmlspecialchars($chiSoCu);?>"required>
            <span class="unit">(Kw)</span>
            
            <label for="chi-so-moi">Chỉ số mới:</label>
            <input type="number" id="chi-so-moi" name="chi-so-moi" value="<?php echo htmlspecialchars($chiSoMoi);?>" required>
            <span class="unit">(Kw)</span>
            
            <label for="don-gia">Đơn giá:</label>
            <input type="number" id="don-gia" name="don-gia" value="<?php echo htmlspecialchars($donGia);?>" required>
            <span class="unit">(VNĐ)</span>
            
            <label for="so-tien-thanh-toan">Số tiền thanh toán:</label>
            <input type="number" id="so-tien-thanh-toan" name="so-tien-thanh-toan" value="<?php echo htmlspecialchars($thanhTien); ?>" readonly>
            <span class="unit">(VNĐ)</span>
            
            <input type="submit" value="Tính">
        </form>
        <?php 
            if(!empty($error)){
                echo "<p class='error'>$error</p> ";
            }
        ?>
    </div>
</body>
</html>