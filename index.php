<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>They say you see the future</title>
</head>
<body>
    <form action="game.php" method="POST">
    <?php
        
        session_start();
                
                //$sPoint = $_SESSION["sPoint"];
                $password = rand(1, 100);
                //if($sPoint == ""){
                    //$_SESSION["sPoint"] = 0;
                    //echo("<p>Mark: $sPoint</p>");
                //}else{
                    //echo("<p>Mark: $sPoint</p>");
                //}
                //$point = 10;
                $balOne = 0;
                $balTwo = 0;
                $balTree = 0;
        echo("<h1>Chose diapazone</h1>");
            echo("<select name='choose'>");
                $f = 1;
                for($i = 1; $i <= 10; $i++){
                    $j = $i * 10;
                    $p = "$f-$j";
                    echo("<option value=$p>$f-$j</option>");
                    $f += 10;
                }
            echo("</select>");
    ?>

        <input type='hidden' name='password' value="<?php echo($password); ?>">
        <input type='hidden' name='balOne' value="<?php echo($balOne); ?>">
        <input type='hidden' name='balTwo' value="<?php echo($balTwo); ?>">
        <input type='hidden' name='balTree' value="<?php echo($balTree); ?>">
        <input type='hidden' name='point' value="<?php echo($point); ?>">
        <input type="submit" name="go" value="go" />
        
    </form>
</body>
</html>