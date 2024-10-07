<?php
    $n=$a=$b=$kq='';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $n = intval($_POST['n']); 
            $a = intval($_POST['a']); 
            $b = intval($_POST['b']); 
           
        } 
          // Kiểm tra N có chia hết cho A và B hay không
          function kt_so($so, $a, $b) {
            return ($so % $a == 0 && $so % $b == 0) ? 1 : 0;
        }
        $chuoi = "";

            // Duyệt từ 1 đến N
            for ($i = 1; $i <= $n; $i++) {
                if (kt_so($i, $a, $b)) {
                    $chuoi .= $i . " ";
                }
            }
           
        
        ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm Số chia hết cho A và B</title>
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
            
            background-color: #ebe491;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 350px;    
        }

        h2 {
            color: #6b4320;
            text-align: center;
            background-color: #f1a35f;
            padding: 10px;
            margin: -20px -20px 20px -20px;
            border-radius: 8px 8px 0 0;
        }
        label{
            display: inline-block;
        }
        .group {
            margin-bottom: 15px;
            padding: 10px;            
            }
        input[type="text"] {
            padding: 8px;
            font-size: 14px;
        }
        input[type="submit"] {
            margin-top: 10px;
            padding: 5px 10px;
            margin-bottom: 10px;
            background-color: #f39c12;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        .result {
          margin-top: 20px;
            background-color: #f5b7b1;
            padding: 10px;
            border-radius: 4px;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>TÌM SỐ CHIA HẾT CHO A VÀ B</h2>
        <form method="post" action="">
            <div class="group">
            <label>Nhập N:</label>
            <input type="number" id="n" name="n" value="<?php echo $n;?>" required>
            <br><br>
            <label>Nhập A:</label>
            <input type="number" id="n" name="a"  value="<?php echo $a;?>;" required>
            <br><br>
            <label >Nhập B:</label>
            <input type="number" id="n" name="b"  value="<?php echo $b;?>;" required>

            <input type="submit" value="Các số => N chia hết cho A và B">
         <?php
          if (!empty($chuoi)) {
            echo "<div class='result'>Các số chia hết cho $a và $b <= $n là: $chuoi</div>";
        } else {
            echo "<div class='result'>Không có số nào chia hết cho $a và $b trong khoảng từ 1 đến $n.</div>";
        }
        ?>
            
           
            </div>
        </form>

        

       
    </div>
</body>
</html>
