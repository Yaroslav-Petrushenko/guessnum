<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guess the number</title>
</head>
<body>
    
        <?php
            $password = $_POST["password"];
            $chooseStart = $_POST["chooseStart"];
            $chooseEnd = $_POST["chooseEnd"];
            $ansNum = $_POST["ansNum"];
            $balOne = $_POST["balOne"];
            $balTwo = $_POST["balTwo"];
            $balTree = $_POST["balTree"];
            
            if($password == $ansNum){
                $balTwo = 2;

                $balOneGen = 0;
                $balTwoGen = 0;
                $balTreeGen = 0;


                if($balOne == 1){
                    $balOneGen = 50;
                }else{
                    $balOneGen = 0;
                }
                if($balTwo == 2){
                    $balTwoGen = 50;
                }else{
                    $balTwoGen = 0;
                }

                $balGeneral = $balOneGen + $balTwoGen;
                echo("<p>You guessed it!</p>");
                echo("<p>Number is: $password</p>");
                //echo("<p>Your mark is $balGeneral</p>");
                session_start();
                $_SESSION["sPoint"] += $balGeneral;
                //echo("<a href='indeh.php'>Play again</a>");
            }else{
                echo("<p>You didn't guess the number</p>");
                echo("<p>Choose number</p>");
            }
        ?>

            <form action="range.php" method="POST"> 
                <?php   
            
                
                $password = $_POST["password"];
                $chooseStart = $_POST["chooseStart"];
                $chooseEnd = $_POST["chooseEnd"];
                $chooseRange = $chooseStart + 5;
                $ansNum = $_POST["ansNum"];
                if($_POST["password"] <= $chooseRange && $_POST["ansNum"] <= $chooseRange){
                    $balTwo = 1;
                }else if($_POST["password"] >= $chooseRange && $_POST["ansNum"] >= $chooseRange){
                    $balTwo = 1;
                }
                

                if(isset($_POST["run"])){
                    if($ansNum > $password){
                        echo("<p>Number is small </p>");
                    }else if ($ansNum < $password){
                        echo("<p>Number is big /p>");
                    }else if ($ansNum = $password){
                        echo("<p>You guessed it!</p>");
                        echo("<p>Number is: $ansNum</p>");
                        
                    }
                }


                if($ansNum != $password){
                    echo("<select name='ansNum'>");
                    if($_POST["password"] <= $chooseRange){
                        for($i = $chooseStart+1; $i <= $chooseRange; $i++){
                                echo("<option value=$i>$i</option>");
                        }
                    }else{
                        for($i = $chooseRange; $i <= $chooseEnd; $i++){
                                echo("<option value=$i>$i</option>");
                        }
                    }
                    echo("</select>");
                }
    
                if($ansNum != $password){
                    echo("<input type='submit' value='run' name='run'>");
                }
                
                
            ?>
            <p><a href='index.php'>Start new game</a></p>
            <input type='hidden' name='password' value="<?php echo($password); ?>">
            <input type='hidden' name='balOne' value="<?php echo($balOne); ?>">
            <input type='hidden' name='balTwo' value="<?php echo($balTwo); ?>">
            <input type='hidden' name='balTree' value="<?php echo($balTree); ?>">
            <input type='hidden' name='chooseStart' value="<?php echo($chooseStart); ?>">
            <input type='hidden' name='chooseEnd' value="<?php echo($chooseEnd); ?>">
            <input type='hidden' name='ansNum' value="<?php echo($ansNum); ?>">
        </form>

</body>
</html>
