<?php
$tong = $tongLe = $tongChan=$batDau=$ketThuc = 0;
$tich=1;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $batDau = isset($_POST['batDau']) ? intval($_POST['batDau']) : 0;
    $ketThuc = isset($_POST['ketThuc']) ? intval($_POST['ketThuc']) : 0;

    for ($i = $batDau; $i <= $ketThuc; $i++) {
        $tong += $i;
        $tich *= $i;
        if ($i % 2 == 0) {
            $tongChan += $i;
        } else {
            $tongLe += $i;
        }
    }
 
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính toán trên dãy số</title>
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
            background-color: #f2e6c9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 500px;
        }
        h2 {
            background-color:#ffb600;
            color: white;
            padding: 10px;
            margin: -20px -20px 20px -20px;
            border-radius: 8px 8px 0 0;
            text-align: center;
        }
        .group1{
            display: flex;
            align-items: center; 
        }
        .group-1-1{
            display: flex;
            align-items: center; 
            background-color: white;
            width: 350px
        }
        .form-group {
            margin-bottom: 15px;
        }
       
        .group1 label, .group1 input {
            display: inline-block;
            margin-right: 0px; 
        }
        input[type="number"] {
            width: 50px;
            padding: 5px;
            border: 1px solid black;
            
        }
        .form-group input{
            width: 200px;
            padding: 5px;
        }
        label {
            display: inline-block;
           width:150px;
           
        }
        .kq{
            color:#e91e63;
            margin-top: 20px;
            margin-bottom: 10px;
        }
        .result {
            
            background-color: #FFFFE0;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #E6DB55;
        }
        input[type="submit"] {
            display: block;
            width: 100px;
            padding: 5px;
            background-color: #ffb600;
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
        #kqua{
            background-color: #ffb6c1;
        }

</style>
</head>
<body>
    <div class="container">
        <h2>TÍNH TOÁN TRÊN DÃY SỐ</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            
            
            <div class="group1">
                <label >Giới hạn của dãy số:</label>
                <div class="group-1-1">
                <label >Số bắt đầu:</label>
                <input type="number" id="batDau" name="batDau" min="0"  value="<?php echo $batDau; ?>" required>
                <label >Số kết thúc:</label>
                <input type="number" id="ketThuc" name="ketThuc" min="0" value="<?php echo $ketThuc; ?>" required>
            
                </div>
                
            </div>
            
                
            <div class="kq">
                 <label>Kết quả:</label>
            </div>
            
            <div class="form-group">
                <label for="tong">Tổng các số:</label>
                <input type="number" id="kqua" name="tong"  value="<?php echo $tong; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="tich">Tích các số:</label>
                <input type="number" id="kqua" name="tich" value="<?php echo $tich; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="tongchan">Tổng các số chẵn:</label>
                <input type="number" id="kqua" name="tongchan" value="<?php echo $tongChan; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="tongle">Tổng các số lẻ:</label>
                <input type="number" id="kqua" name="tongle" value="<?php echo $tongLe; ?>" readonly>
            </div>
           
            <input type="submit" value="Tính toán">
        </form>
    </div>
</body>
</html>