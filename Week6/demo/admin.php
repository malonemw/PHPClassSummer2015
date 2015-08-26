<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        session_start();
        
        include_once './functions.php';
        
        include_once './header.php';
        
        if ( !isLoggedIn()){ 
            die('Access not allowed');
        }
        
         
        ?>
        
        <h1>Admin Page</h1>
    </body>
</html>