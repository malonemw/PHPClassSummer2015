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
        <h1>Sorry, you had an error</h1>
        <h2>
        <?php
        
       if (isset($message)){
           echo $message;
       }
        
        ?>
        </h2>
    </body>
</html>
