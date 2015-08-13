<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
            include_once './dbconnect.php';
            include './functions.php';

            $corp = filter_input(INPUT_POST, 'corp');
            $incorp_dt = filter_input(INPUT_POST, 'incorp_dt');
            $email = filter_input(INPUT_POST, 'email');
            $zipcode = filter_input(INPUT_POST, 'zipcode');
            $owner = filter_input(INPUT_POST, 'owner');
            $phone = filter_input(INPUT_POST, 'phone');
        
            $db = dbconnect();
           
            $stmt = $db->prepare("INSERT INTO corps SET corp = :corp, incorp_dt = :incorp_dt, email = :email, zipcode = :zipcode, owner = :owner, phone = :phone");
            $binds = array(
                 ":corp" => $corp,
                 ":incorp_dt" => $incorp_dt,                  
                 ":email" => $email,                   
                 ":zipcode" => $zipcode,                 
                 ":owner" => $owner,                    
                 ":phone" => $phone                    
             );
            $result = 'Data was not added';
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                 $result = 'Data was added';
            }
                      
        ?>
        
        <h1>
        <?php if ( !empty($result) ) {
            echo $result;
        } ?>
        </h1>
        
        <a href="<?php echo filter_input(INPUT_SERVER, 'HTTP_REFERER'); ?>"> Go back </a>
                
        
    </body>
</html>