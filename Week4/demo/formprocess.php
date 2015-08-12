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
        <h1>My Forms</h1>
        <?php
        
        $action = filter_input(INPUT_POST, 'action');
        
        if ($action === 'Submit1'){
            echo 'submitted form1';
        }
        if ($action === 'Submit2'){
            echo 'submitted form2';
        }
        
        include './forms/form1.php';
        include './forms/form2.php';
        include './forms/form3.php';
        
       if (isset($_POST['submit1']))
           echo 'Form One was Successfully Submitted';
       if (isset($_POST['submit2']))
           echo 'Form Two was Successfully Submitted';
       if (isset($_POST['submit3']))
           echo 'Form Three was Successfully Submitted';
                
        ?>
    </body>
</html>
