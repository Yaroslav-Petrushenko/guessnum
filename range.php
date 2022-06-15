<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>They say you see the future</title>
</head>
<body>
    <?php
        session_start();
        echo('<form action="range.php" method="POST">');
        $password = $_POST["password"];
        $rangeStart = $_POST["rangeStart"];
        $rangeLast = $_POST["rangeLast"];
        $range = $rangeStart + 4;
        $chooseAnswer = $_POST["chooseAnswer"];//
        $choose = $_POST["choose"];
        $chooseDecode = json_decode($choose);
        array_push($chooseDecode, $_POST["chooseAnswer"]);//

        if(isset($_POST)){
            if(isset($_POST["run"])){
                if($chooseAnswer > $password){
                    echo("<p>Number is small</p>");
                }else if ($chooseAnswer < $password){
                    echo("<p>Number is big</p>");
                }else if ($chooseAnswer = $password){
                    echo("<p>You guess number</p>");
                    echo("<p>Number: $chooseAnswer</p>");
                    echo("<p><a href='index.php'>Start new game</a></p>");
                } 
                
            }
    
            if($chooseAnswer != $password){
                echo("<select name='chooseAnswer'>");//

                if($_POST["password"] <= $range){
                    for($i = $rangeStart; $i <= $range; $i++){
                        $e = 0;
                        $j = 0;
                        while($j <= count($chooseDecode)){
                            if($i == $chooseDecode[$j]){
                                $e = 1;
                                $j = count($chooseDecode) + 1;
                            }
                            $j++;
                        }
                        if($e == 1){
                            echo("<option value='$i' disabled>$i</option>");
                        }else{
                            echo("<option value='$i'>$i</option>");
                        }
                    }
                }else{
                    for($i = $range+1; $i <= $rangeLast; $i++){
                        $e = 0;
                        $j = 0;
                        while($j <= count($chooseDecode)){
                            if($i == $chooseDecode[$j]){
                                $e = 1;
                                $j = count($chooseDecode) + 1;
                            }
                            $j++;
                        }
                        if($e == 1){
                            echo("<option value='$i' disabled>$i</option>");
                        }else{
                            echo("<option value='$i'>$i</option>");
                        }
                    }
                }
                echo("</select>");
            }
        }else{
            echo("<p>You dont guess number</p>");
            echo("<p><a href='index.php'>Start new game</a></p>");
        }

        $chooseEncode = json_encode($chooseDecode);

 
        echo("<input type='hidden' name='password' value='$password'>");
        echo("<input type='hidden' name='rangeStart' value='$rangeStart'>");
        echo("<input type='hidden' name='rangeLast' value='$rangeLast'>");
        echo("<input type='hidden' name='choose' value='$chooseEncode'>");
        echo("<input type='submit' value='run' name='run'>");
        echo("</form>");
    ?>
</body>
</html>