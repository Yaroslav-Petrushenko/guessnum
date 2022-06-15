<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>They say you see the future</title>
</head>
<body>
    <form action="range.php" method="POST">

        <?php
        

        
            $password = $_POST["password"];
            $chooseStart = $_POST["chooseStart"];
            $chooseEnd = $_POST["chooseEnd"];
            $chooseRange = $chooseStart + 4;
            $ansNum = $_POST["ansNum"];
            $balOne = $_POST["balOne"];
            $balTwo = $_POST["balTwo"];
            $balTree = $_POST["balTree"];
            
            
            

            if($balTree < 20){
                if(isset($_POST["run"])){
                    if($ansNum > $password){
                        echo("<p>Number is small. </p>");
                        //$balTree += 1;
                    }else if ($ansNum < $password){
                        echo("<p>Number is big. </p>");
                        //$balTree += 1;
                    }else if ($ansNum = $password){

                        $balOneGen = 0;
                        $balTwoGen = 0;
                        $balTreeGen = 0;


                        if($balOneGen == 1){
                            $balOneGen = 15;
                        }else{
                            $balOneGen = 0;
                        }
                        if($balTwoGen == 1){
                            $balTwoGen = 40;
                        }else{
                            $balTwoGen = 0;
                        }
                        if($balTreeGen == 0){
                            $balTreeGen = 15;
                        }else if($balTreeGen < 5){
                            $balTreeGen = 15 - $balTreeGen;
                        }else{
                            $balTreeGen = -10;
                        }

                        $balGeneral = $balOneGen + $balTwoGen + $balTreeGen;

                        if($balGeneral < 0){
                            $balGeneral = 0;
                        }




                        echo("<p>You guessed it!</p>");
                        echo("<p>Number is: $ansNum</p>");
                        session_start();
                        $_SESSION["sPoint"] += $balGeneral;
                        //echo("<p>Your mark is $balGeneral</p>");
                        
                    }
                }
        
                if($ansNum != $password){
                    echo ("<p>Choose number</p>");
                    echo("<select name='ansNum'>");
                    if($_POST["password"] <= $chooseRange){
                        
                        for($i = $chooseStart; $i <= $chooseRange; $i++){
                                
                                echo("<option value=$i>$i</option>");
                        }
                    }else{
                        for($i = $chooseRange+1; $i <= $chooseEnd; $i++){
                            echo("<option value=$i>$i</option>");
                        }
                    }
                    echo("</select>");
                }
            }else{
                echo("<p>You didn't guess the number</p>");
                //echo("<p>Attempts ended ($balTree)</p>");
                
                echo("<p>Your number is </p>");
                
                //$balTree += 1;
            }
    
            if($balTree < 5){
                if($ansNum != $password){
                    echo("<input type='submit' value='run' name='run'>");
                }
            }
            
        ?>
                <input type='hidden' name='password' value="<?php echo($password); ?>">
                <input type='hidden' name='balOne' value="<?php echo($balOne); ?>">
                <input type='hidden' name='balTwo' value="<?php echo($balTwo); ?>">
                <input type='hidden' name='balTree' value="<?php echo($balTree); ?>">
                <input type='hidden' name='chooseStart' value="<?php echo($chooseStart); ?>">
                <input type='hidden' name='chooseEnd' value="<?php echo($chooseEnd); ?>">
                
                <p><a href='index.php'>Start new game</a></p>
    </form>
</body>
</html>