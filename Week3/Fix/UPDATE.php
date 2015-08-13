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
            
            
           $id = filter_input(INPUT_GET, 'id');
            
           $db = dbconnect();
           
           $stmt = $db->prepare("SELECT * FROM corps where id = :id");
           
           $binds = array(
                ":id" => $id
            );
           
            $pullArray = array();
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $pullArray = $stmt->fetch(PDO::FETCH_ASSOC);
            }
           
            
            if (isPostRequest()){
            $id = filter_input (INPUT_POST, 'id');
            $corp = filter_input(INPUT_POST, 'corp');
            $incorp_dt = filter_input(INPUT_POST, 'incorp_dt');
            $email = filter_input(INPUT_POST, 'email');
            $zipcode = filter_input(INPUT_POST, 'zipcode');
            $owner = filter_input(INPUT_POST, 'owner');
            $phone = filter_input(INPUT_POST, 'phone');
            }
            
           ?>
        
        <h1>Update Company Info</h1>
        
            <form method="post" action="#">            
                Company: <input type="text" name="corp" value="<?php echo $pullArray['corp'] ?>" />
            <br />
            Email: <input type="email" name="email" value="<?php echo $pullArray['email'] ?>"/>
            <br />
            Zip Code: <input type="text" name="zipcode" value="<?php echo $pullArray['zipcode'] ?>"/>
            <br />
            Owner: <input type="text" name="owner" value="<?php echo $pullArray['owner'] ?>"/>
            <br />
            Phone: <input type="text" name="phone" value="<?php echo $pullArray['phone'] ?>"/>
            <br />
            <input type="hidden" name="id" value="<?php echo $id ?>" />
            <input type="hidden" name="incorp_dt" value="<?php echo $incorp_dt ?>" />
            <input type="submit" value="Submit" />
            <input type="hidden" name="action" value="submit"/>
        </form>
        
        
        <?php    
        $action = filter_input(INPUT_POST, 'action');
        
        if ($action === 'submit'){
                
            $stmt = $db->prepare("UPDATE corps SET corp = :corp, email = :email, zipcode = :zipcode, owner = :owner, phone = :phone WHERE id = :id");
            $binds = array(
                ":id" => $id,
                 ":corp" => $corp,                 
                 ":email" => $email,                   
                 ":zipcode" => $zipcode,                 
                 ":owner" => $owner,                    
                 ":phone" => $phone                    
             );
            $result = 'Data was not updated';
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                 $result = 'Data has been updated';
            }
        }

        ?>
        
        <h1>
        <?php if ( !empty($result) ) {
            echo $result;
        } ?>
        </h1>
        
        <a href="./view.php"> Back to View All </a>
                
        
    </body>
</html>