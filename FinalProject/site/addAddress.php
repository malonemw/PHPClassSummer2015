<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
         require_once '../includes/session-start.req-inc.php';
         require_once '../includes/access-required.html.php';
         
        include_once '../functions/dbconnect.php';
        include_once '../functions/address-functions.php';
        include_once '../functions/image-functions.php';
        include_once '../functions/login-function.php';
        include_once '../functions/until.php';
        
        
        
        $user_id = $_SESSION['user_id'];
        var_dump($user_id);
        //$categories = getAllCategories();
        
        
        if ( isPostRequest() ) {
                        
            $fullname = filter_input(INPUT_POST, 'fullname');
            $email = filter_input(INPUT_POST, 'email');
            $address = filter_input(INPUT_POST, 'address');
            $phone = filter_input(INPUT_POST, 'phone');
            $website = filter_input(INPUT_POST, 'website');
            $birthday = filter_input(INPUT_POST, 'birthday');
            $image = uploadImage();
                        
            $errors = array();
            
//            if ( !isValidProduct($product) ) {
//                $errors[] = 'Product is not Valid';
//            }
//            
//            if ( !isValidPrice($price) ) {
//                $errors[] = 'Price is not Valid';
//            }
                //return a string '' instead of bool        
            if ( $image == '' ) {
                $errors[] = 'image could not be uploaded';
            }
            // want to check for correct files before uploading image
            if ( count($errors) == 0 ) {
                var_dump($fullname,$email,$address,$birthday,$phone,$website,$image);
                
                if ( createAddress($fullname, $email, $address, $phone, $website, $birthday, $image, $user_id ) ) {
                    $results = 'Product Added';
                } else {
                    
                    $results = 'Product was not Added';
                }
                
            }
            
        }
        
        
        
        ?>
        
        <h1>Add Address</h1>
        
        <?php if ( isset($errors) && count($errors) > 0 ) : ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        
        
        <?php include '../includes/results.html.php'; ?>
               
        <form method="post" action="#" enctype="multipart/form-data">
            
            Address: <input type ="text" name ="address" value="" />
            <br />
            Full Name : <input type="text" name="fullname" value="" /> 
            <br />
            Email : <input type="email" name="email" value="" /> 
            <br />            
            Phone : <input type="text" name="phone" value="" /> 
            <br />            
            Website : <input type="text" name="website" value="" /> 
            <br />            
            Birthday : <input type="text" name="birthday" value="" /> 
            <br />            
             Image: <input name="upfile" type="file" />
             <br />
            <input type="submit" value="Submit" />
            <input type="hidden" name="user_id" value="<?php echo $user_id ?>" />
        </form>
        
        
        
    </body>
</html>