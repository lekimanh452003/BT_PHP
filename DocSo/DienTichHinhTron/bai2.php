<?php
    $banKinh=$chuVi=$dienTich='';
    $error='';
    $pi = 3.14159;
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $banKinh=$_POST['ban-kinh']??'';
        $chuVi=$_POST['chu-vi']??'';
        $dienTich=$_POST['dien-tich']??'';

        if(is_numeric($banKinh)){
            $dienTich=$pi*pow($banKinh,2);
            $chuVi=2*$pi*$banKinh;
        }
    }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            font-family: 'Times New Roman', Times, serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container{
            background-color: #ffd700;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #8b4513;
            text-align: center;
            margin-top: 0;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input {
            width: 100%;
            padding: 5px;
            margin-top: 5px;
        }
        input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 15px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        #dien-tich {
            background-color: #ffb6c1;
        }
        #chu-vi {
            background-color: #ffb6c1;
        }
        .error {
            color: red;
            margin-top: 10px;
        }
        </style>
</head>
<body>
<div class="container">
        <h1>DIỆN TÍCH VÀ CHU VI HÌNH TRÒN</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="chieu-dai">Bán kính:</label>
            <input type="number" id="ban-kinh" name="ban-kinh" value="<?php echo htmlspecialchars($banKinh); ?>" required>
           
            <label for="dien-tich">Diện tích:</label>
            <input type="number" id="dien-tich" value="<?php echo htmlspecialchars($dienTich); ?>" readonly>

            <label for="chu-vi">Chu vi:</label>
            <input type="number" id="chu-vi" value="<?php echo htmlspecialchars($chuVi); ?>" readonly>
            
            <input type="submit" value="Tính">
        </form>
        
        <?php
        if (!empty($error)) {
            echo "<p class='error'>$error</p>";
        }
        ?>
    </div>
</body>
</html>