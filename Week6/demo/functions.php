<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        isLoggedin(){
        if ( isset($_SESSION['loggedin']) ||
        $_SESSION['loggedin'] === false ) 
        
            {
            return false;
            }
            else 
                return true;
        }
        ?>
    </body>
</html>
