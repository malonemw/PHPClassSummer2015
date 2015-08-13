<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
            include_once './dbconnect.php';
            
            $corp = filter_input(INPUT_POST, 'corp');
            $incorp_dt = filter_input(INPUT_POST, 'incorp_dt');
            $email = filter_input(INPUT_POST, 'email');
            $zipcode = filter_input(INPUT_POST, 'zipcode');
            $owner = filter_input(INPUT_POST, 'owner');
            $phone = filter_input(INPUT_POST, 'phone');
        
            $db = dbconnect();
           ?>
        
        <h1>Update Company Info</h1>
        
            <form method="post" action="#">            
            Company: <input type="text" name="corp" value="<?php echo $corp ?>" />
            <br />
            Email: <input type="email" name="email" value="<?php echo $email ?>" />
            <br />
            Zip Code: <input type="text" name="zipcode" value="<?php echo $zipcode ?>" />
            <br />
            Owner: <input type="text" name="owner" value="<?php echo $owner ?>" />
            <br />
            Phone: <input type="text" name="phone" value="<?php echo $phone ?>" />
            <br />
            <input type="hidden" name="i-d" value="<?php echo $id ?>" />
            <input type="hidden" name="incorp_dt" value="<?php echo $incorp_dt ?>" />
            <input type="submit" value="Submit" />
            <input type="hidden" name="action" value="submit"/>
        </form>
        
        
        <?php    
        $action = filter_input(INPUT_POST, 'action');
        if (isset($_POST['submit'])){
            $stmt = $db->prepare("UPDATE corps SET corp = :corp, incorp_dt = :incorp_dt, email = :email, zipcode = :zipcode, owner = :owner, phone = :phone");
            $binds = array(
                 ":corp" => $corp,
                 ":incorp_dt" => $incorp_dt,                  
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
        
        <a href="<?php echo filter_input(INPUT_SERVER, './view.php'); ?>"> Back to View All </a>
                
        
    </body>
</html>