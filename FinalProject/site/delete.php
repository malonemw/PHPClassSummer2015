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
         
        include_once '../functions/dbconnect.php';
        include_once '../functions/address-functions.php';
        include_once '../functions/image-functions.php';
        include_once '../functions/login-function.php';
        include_once '../functions/until.php';
        
        $address_id = filter_input(INPUT_GET, 'id');
        
        $db = dbconnect();
           
        $stmt = $db->prepare("DELETE FROM address WHERE address_id = :address_id");
           
        $binds = array(
             ":address_id" => $address_id
        );
           
        $isDeleted = false;
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $isDeleted = true;
        }         
        
        ?>
        
        <h1> Record <?php echo $address_id; ?> Has 
            <?php if ( !$isDeleted ): ?>Not<?php endif; ?> 
            Been Deleted
        </h1>
        
        <a href="<?php echo filter_input(INPUT_SERVER, 'HTTP_REFERER'); ?>"> Back to View </a>
         
    </body>
</html>