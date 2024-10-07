
<?php
$ho_ten=$ten=$ho=$ten_dem="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $ho_ten = trim($_POST["ho_ten"])?:'';
    $mang = explode(" ", $ho_ten);

    $ho = $mang[0]; // Phần tử đầu tiên là Họ
    $ten = $mang[count($mang) - 1]; // Phần tử cuối cùng là Tên
    $ten_dem = "";
    for ($i = 1; $i < count($mang) - 1; $i++) {
        $ten_dem .= $mang[$i] . " ";
    }
    $ten_dem = trim($ten_dem); // Loại bỏ khoảng trắng dư thừa
}

?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tách họ và tên</title>
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
            background-color: #c5c8ef;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 450px;
        }
        h2 {
            color: white;
            text-align: center;
            background-color: #141a78;
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
            width: 130px;
            margin-top: 20px;
        }
        input[type="text"] {
            width: 300px;
            padding: 5px;
            font-size: 16px;
        }
        #chuoi1{
            width: 150px;
            padding: 5px;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #9ee5ae;
            margin-left: 150px;
            margin-top: 20px;
            color: black;
            border: solid 1px white;
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
        <h2>TÁCH HỌ VÀ TÊN</h2>
        <form method="post">
            <label>Nhập họ và tên:</label>
            <input type="text" name="ho_ten" value="<?php echo isset($_POST['ho_ten'])? htmlspecialchars($_POST['ho_ten']):'' ; ?>" required >
        <div class="form-group">
                <label for="chuoi1">Họ:</label>
                <input type="text" id="ho" name="ho" value="<?php echo htmlspecialchars($ho) ; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="chuoi1">Tên đệm:</label>
                <input type="text" id="tendem" name="tenDem" value="<?php echo htmlspecialchars($ten_dem) ; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="chuoi2">Tên:</label>
                <input type="text" id="ten" name="ten" value="<?php echo htmlspecialchars($ten) ;?>" readonly>
            </div>
            <input type="submit" value="Tách họ tên">
        </form>

        
    </div>
</body>
</html>
