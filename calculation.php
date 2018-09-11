<!doctype html>
<html>
    <head><title>Calculation</title></head>
    <body>
        <p>And the answer is...
            <?php
            if($_POST['func']==multiply){
                echo "num1 * num2";
            }
            else if($_POST['func']==divide){
                echo "num1 / num2";
            }
            else if($_POST['func']==add){
                echo "num1 + num2";
            }
            else ($_POST['func']==subtract){
                echo "num1 - num2";
            }
            ?></p></body></html>
5
