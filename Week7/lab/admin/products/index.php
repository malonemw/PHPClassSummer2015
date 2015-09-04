<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            require_once '../../includes/session-start.req-inc.php';
            require_once '../../includes/access-required.html.php';
            
            include_once '../../functions/products-functions.php';           
            include_once '../../functions/dbconnect.php';
            include_once '../../functions/until.php';
            
            $db = dbconnect();
             
            $stmt = $db->prepare("SELECT * FROM products JOIN categories ON categories.category_id = products.category_id");
           
            $result = array();
            if ($stmt->execute() && $stmt->rowCount() > 0) {
                $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
            }
            //print_r($result);
        ?>
        
        <h1>Products</h1>
        <p><a href="create.php">Create</a></p>
        <?php foreach ($result as $row): ?>
                <tr>
                    <td><?php echo $row['image']; ?></td>
                    <td><?php echo $row['product']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><a href="update.php?id=<?php echo $row['product_id']; ?>"> Update </a></td> 
                    <td><a href="delete.php?id=<?php echo $row['product_id']; ?>"> Delete </a></td>
                    </br>
                </tr>
              
            <?php endforeach; ?>
    </body>
</html>