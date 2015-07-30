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
        include './functions.php';
        include './dbConn.php';
        ?>
        
                
            <?php          
            $results = '';            
            
            if (isPostRequest()) {

            $db = getDB();

            $stmt = $db->prepare("INSERT INTO test SET firstName = :firstName, lastName = :lastName, dob = :dob, height = :height");

            $firstName = filter_input(INPUT_POST, 'firstName');
            $lastName = filter_input(INPUT_POST, 'lastName');
            $dob = filter_input(INPUT_POST, 'dob');
            $height = filter_input(INPUT_POST, 'height');

            $binds = array(
                ":firstName" => $firstName,
                ":lastName" => $lastName,
                ":dob" => $dob,
                ":height" => $height
            );

            //$results = array();
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = 'Data Added';
//    $results = $stmt->fetchall(PDO::FETCH_ASSOC);   
            }
            }
            ?>
            <form method="post" action="#">
            
            Actor's First Name <input type="text" value="" name="firstName" />
            <br />
            Actor's Last Name <input type="text" value="" name="lastName" />
            <br />
            Actor's Date of Birth <input type="date" value="" name="dob" />
            <br />
            Actor's Height <input type="int" value="" name="height" />
            <br />
            <input type="submit" value="Submit" /> ?>
            
        
    </body>
</html>
