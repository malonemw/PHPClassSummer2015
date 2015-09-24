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
        
        
        
        $user_id = $_SESSION['user_id'];        
        $groups = getAddressGroup();
        $db = dbconnect();
        
        $fullname="";
        $email="";
        $address="";
        $phone="";
        $group_id="";
        $website="";
        $birthday="";
        $image="";
        
        if ( isPostRequest() ) {
                        
            $fullname = filter_input(INPUT_POST, 'fullname');
            $email = filter_input(INPUT_POST, 'email');
            $address = filter_input(INPUT_POST, 'address');
            $phone = filter_input(INPUT_POST, 'phone');
            $group_id = filter_input(INPUT_POST, 'address_group_id');
            $website = filter_input(INPUT_POST, 'website');
            $birthday = filter_input(INPUT_POST, 'birthday');
            $image = uploadImage();
                        
            $errors = array();
            
            
           $address_id = filter_input(INPUT_GET, 'id');
           $addressdb = getAddressGroup(); 
           $db = dbconnect();
           
           updateAddress($fullname, $email, $address, $phone, $group_id, $website, $birthday, $image, $user_id);
           
            
            
            $result = 'Data was not updated';
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $result = 'Data has been updated';
            }

           }
        
                      
           ?>
        
        
        
        <h1>Update Address Record</h1>
        
         <h1>
        <?php if ( isset($result) ) {
            echo $result;
        } ?>
             
        </h1>
        
            <form method="post" action="#">            
            Fullname: <input type="text" name="product" value="<?php echo $address ['fullname'] ?>" />
            <br />
            Email: <input type="email" name="email" value="<?php echo $address['email'] ?>"/>
            <br />
            Address: <input name="address" type="text" value="<?php echo $address['address'] ?>" />
            <br />
            Phone: <input name="phone" type="text" value="<?php echo $address['phone'] ?>" />
            <br />
            
            <!-- for each group, pull group id; input category (JOIN TABLES) -->
            Address Group: <select name="address_group_id">
            <?php foreach ($addressdb as $row): ?>
                <option value="<?php echo $row['address_group_id']; ?>"><?php echo $row['address_group']; ?></option>
            <?php endforeach; ?>
            </select>
            <br />
            Website: <input name="website" type="text" value="<?php echo $address['website'] ?>" />
            <br />
            Birthday: <input name="birthday" type="date" value="<?php echo $address['birthday'] ?>" />
            <br />
            Image: <input name="upfile" type="file" value="<?php echo $address['image'] ?>" />
            <br />
            <input type="hidden" name="address_id" value="<?php echo $address_id ?>" />
            <input type="submit" value="Submit" />            
        </form>
        
        
        
        
       
        
        <a href="./index.php"> Back to Address </a>
                
        
    </body>
</html>