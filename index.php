<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>They say you see the future</title>
    </head>
    <body>
        <form action="number.php" method="POST">
            <?php
                session_start();
                $password = rand(1, 100);
                echo("<h1>Chose diapazone</h1>");
                echo("<select name='answer'>");
                $c = 1;
                for($i = 1; $i <= 10; $i++){
                    $t1 = $i * 10;
                    $p = "$c-$t1";
                    echo("<option value=$p>$c-$t1</option>");
                    $c += 10;
                }
                echo("</select>");

            
                echo("<input type='hidden' name='password' value='$password'>");
                echo("<p><input type='submit' value='run'></p>");
            ?>
            
        </form>
    </body>
</html>