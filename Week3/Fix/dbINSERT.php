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
                      
            $db = dbconnect();
            
            if (isPostRequest()){
            
            
            $id = filter_input (INPUT_POST, 'id');
            $corp = filter_input(INPUT_POST, 'corp');
            $email = filter_input(INPUT_POST, 'email');
            $zipcode = filter_input(INPUT_POST, 'zipcode');
            $owner = filter_input(INPUT_POST, 'owner');
            $phone = filter_input(INPUT_POST, 'phone');
            }
            
            ?>

            <h1>Update Company Info</h1>
        
            <form method="post" action="#">            
                Company: <input type="text" name="corp" value="" placeholder="Company Name"/>
            <br />
            Email: <input type="email" name="email" value="" placeholder="Email_Address@email.com"/>
            <br />
            Zip Code: <input type="text" name="zipcode" value="" placeholder="Zip Code"/>
            <br />
            Owner: <input type="text" name="owner" value="" placeholder="Owner Name"/>
            <br />
            Phone: <input type="text" name="phone" value="" placeholder="Phone Number"/>
            <br />
            <input type="hidden" name="id" value="" />
            <input type="submit" value="Submit" />
            <input type="hidden" name="action" value="submit"/>
        </form>
            
            <?php
           $action = filter_input(INPUT_POST, 'action');
            if ($action === 'submit'){
                
            $stmt = $db->prepare("INSERT INTO corps SET corp = :corp, incorp_dt = now() ,email = :email, zipcode = :zipcode, owner = :owner, phone = :phone WHERE id = :id");
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