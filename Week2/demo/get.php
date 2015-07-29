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
        
        $key = 'test';
        //echo sha1($key);
        
        $id = filter_input(INPUT_GET, 'id');
        echo $id;
        
        if($id === sha1($key)){
            echo 'Key entered';
        }
        ?>
    </body>
</html>
