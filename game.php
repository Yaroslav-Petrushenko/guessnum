<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>They say you see the future</title>
</head>
<body>
    <form action="result.php" method="POST">
        <?php
                    $password = $_POST["password"];
                    $balOne = $_POST["balOne"];
                    $balTwo = $_POST["balTwo"];
                    $balTree = $_POST["balTree"];

                    $chooseStart = $_POST["choose"][0].$_POST["choose"][1];
                    if($chooseStart == "1-"){
                        $chooseStart = $_POST["choose"][0];
        
                    }
        
                    $chooseEnd = $chooseStart + 9;
                    
        
                    if($_POST["password"] >= $chooseStart && $_POST["password"] <= $chooseEnd){
                        echo("<p>You guessed the range</p>");
                        echo("<p>Choose number</p>");
                        //$point = $_POST["point"];
                        //$balOne = 1;
                    }else{
                        echo("<p>You dont guessed the range</p>");
                        echo("<p>Select a number from the correct range</p>");
                        //$point = $_POST["point"] - 2;
                    }
        
                    $chooseStart = floor(($_POST["password"]-1)/10)*10+1;
                    $chooseEnd = $chooseStart + 9;

                    echo("<select name='ansNum'>");
        
                        for($i = $chooseStart; $i <= $chooseEnd; $i++){
                            echo("<option value='$i'>$i</option>");
                        }
        
                    echo("</select>");
                ?>
                <input type='hidden' name='password' value="<?php echo($password); ?>">
                <input type='hidden' name='balOne' value="<?php echo($balOne); ?>">
                <input type='hidden' name='balTwo' value="<?php echo($balTwo); ?>">
                <input type='hidden' name='balTree' value="<?php echo($balTree); ?>">
                <input type='hidden' name='point' value="<?php echo($point); ?>">
                <input type='hidden' name='chooseStart' value="<?php echo($chooseStart); ?>">
                <input type='hidden' name='chooseEnd' value="<?php echo($chooseEnd); ?>">
                <input type="submit" name="go" value="go"/>
            </form>
            
</body>
</html>