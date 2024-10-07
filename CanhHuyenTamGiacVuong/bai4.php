<?php
    $canhA=$canhB=$canhHuyen='';
    $error='';
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $canhA=$_POST['canh-a']??'';
        $canhB=$_POST['canh-b']??'';
        $canhHuyen=$_POST['canh-huyen']??'';

        if(is_numeric($canhA) && is_numeric($canhB)){
            $canhHuyen=sqrt(pow($canhA,2) +pow($canhB,2));
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
        #canh-huyen {
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
        <h1>CẠNH HUYỀN TAM GIÁC VUÔNG</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="canh-a">Cạnh A:</label>
            <input type="number" id="canh-a" name="canh-a" value="<?php echo htmlspecialchars($canhA); ?>" required>
           
            <label for="canh-b">Cạnh B:</label>
            <input type="number" id="canh-b" name="canh-b" value="<?php echo htmlspecialchars($canhB); ?>" required>

            <label for="canh-huyen">Cạnh huyền:</label>
            <input type="number" id="canh-huyen" value="<?php echo htmlspecialchars($canhHuyen); ?>" readonly>
            
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