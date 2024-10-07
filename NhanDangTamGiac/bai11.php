<?php
$canh1=$canh2=$canh3=$loaitamgiac='';
$error='';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $canh1 = $_POST['canh1']??'';
    $canh2 = $_POST['canh2']??'';
    $canh3 = $_POST['canh3']??'';
    if (($canh1 + $canh2 > $canh3) && ($canh1 + $canh3 > $canh2) && ($canh2 + $canh3 > $canh1)) {
        // Kiểm tra tam giác đều
        if ($canh1 == $canh2 && $canh2 == $canh3) {
            $loaitamgiac = "Tam giác đều";
        }
        // Kiểm tra tam giác vuông cân
        elseif (($canh1 == $canh2 || $canh2 == $canh3 || $canh1 == $canh3) && 
                (($canh1 * $canh1 + $canh2 * $canh2 == $canh3 * $canh3) || 
                 ($canh1 * $canh1 + $canh3 * $canh3 == $canh2 * $canh2) || 
                 ($canh2 * $canh2 + $canh3 * $canh3 == $canh1 * $canh1))) {
            $loaitamgiac = "Tam giác vuông cân";
        }
        // Kiểm tra tam giác cân
        elseif ($canh1 == $canh2 || $canh2 == $canh3 || $canh1 == $canh3) {
            $loaitamgiac = "Tam giác cân";
        }
        // Kiểm tra tam giác vuông
        elseif (($canh1 * $canh1 + $canh2 * $canh2 == $canh3 * $canh3) || 
                ($canh1 * $canh1 + $canh3 * $canh3 == $canh2 * $canh2) || 
                ($canh2 * $canh2 + $canh3 * $canh3 == $canh1 * $canh1)) {
            $loaitamgiac = "Tam giác vuông";
        }
        // Nếu không thuộc các loại trên, thì là tam giác thường
        else {
            $loaitamgiac = "Tam giác thường";
        }
    } else {
        // Không phải là tam giác
        $loaitamgiac = "Không phải là tam giác";
    }

}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhận dạng tam giác</title>
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
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 400px;
        }
        h2 {
            color: #8B4513;
            text-align: center;
            background-color: #FFD700;
            padding: 10px;
            margin: -20px -20px 20px -20px;
            border-radius: 8px 8px 0 0;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: inline-block;
            width: 120px;
        }
        input[type="text"], input[type="number"] {
            width: 200px;
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .equation {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }
        .equation span {
            margin: 0 5px;
        }
        .result {
            width: 180px;
            background-color: #FFFFE0;
            padding: 5px;
            margin-bottom: 15px;
            border: 1px solid #E6DB55;
        }
        #loai-tam-giac{
            background-color: #ffb6c1;
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
    </style>
</head>
<body>
    <div class="container">
        <h2>NHẬN DẠNG TAM GIÁC</h2>
        <form method="post">
            <div class="form-group">
                
                <div class="equation">
                <label>Cạnh 1:</label> <input type="number" name="canh1" value="<?php echo $canh1; ?>" required>
                </div>
                <div class="equation">
                <label>Cạnh 2:</label> <input type="number" name="canh2" value="<?php echo $canh2; ?>" required>
                </div>

                <div class="equation">
                <label>Cạnh 3:</label> <input type="number" name="canh3" value="<?php echo $canh3; ?>" required>   
                </div>

                <div class="equation">
                <label>Loại tam giác:</label> <input type="text" id="loai-tam-giac" name="loaitamgiac" value="<?php echo $loaitamgiac; ?>" readonly>             
                </div>

                <input type="submit" value="Nhận dạng">
            </div>
            
            </div>
        </form>
    </div>
</body>
</html>