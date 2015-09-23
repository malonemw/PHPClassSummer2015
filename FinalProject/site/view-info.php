<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            require_once '../includes/session-start.req-inc.php';
            require_once '../includes/access-required.html.php';
            
            //include_once '../functions/address-functions.php';           
            include_once '../functions/dbconnect.php';
            include_once '../functions/until.php';
            
            $address_id = filter_input(INPUT_GET, 'id');
            
            $db = dbconnect();
             
            $stmt = $db->prepare("SELECT * FROM address");
           
            $result = array();
            if ($stmt->execute() && $stmt->rowCount() > 0) {
                $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
            }
        ?>
        
        <h1>My Addresses</h1> 
        <p><a href="addAddress.php">Add a New Address</a></p>
        <?php foreach ($result as $row): ?>
                <tr>
                    <td><?php echo $row['address']; ?></td>                    
                    <td><?php echo $row['fullname']; ?></td>                    
                    <td><a href="fullView.php?id=<?php echo $row['address_id']; ?>"> View More </a></td> 
                    <td><a href="../site/update.php?id=<?php echo $row['address_id']; ?>"> Update </a></td> 
                    <td><a href="delete.php?id=<?php echo $row['address_id']; ?>"> Delete </a></td>
                    </br>
                </tr>
              
            <?php endforeach; ?>
    </body>
</html>