<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        require_once './includes/session-start.req-inc.php';

        include_once './functions/dbconnect.php';
        include_once './functions/users-functions.php';
        include_once '../../functions/until.php';
        
        
        
        
        if ( isPostRequest() ) {
            
            $email = filter_input(INPUT_POST, 'email');
            $password = filter_input(INPUT_POST, 'password');
            $created = filter_input(INPUT_POST, 'created');
                                    
            $errors = array();
            
            //error checking for email
            if ( !isValidPassword($password) ) {
                $errors[] = 'Password is not Valid. Please Use More Than 4 Characters.';
            }

            // want to check for any errors before creating
            if ( count($errors) == 0 ) {
                
                if ( createUser($email, $password, $created ) ) {
                    $results = 'User Added. Please Log In.';
                } else {
                    $results = 'Product was not Added';
                }
                
            }
            
        }
        
        
        
        ?>
        
        <h1>Create a New Account</h1>
        
        <?php if ( isset($errors) && count($errors) > 0 ) : ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        
        
        <?php include '../../includes/results.html.php'; ?>
               
        <form method="post" action="#" enctype="multipart/form-data">

            Enter an Email Address : <input type="email" name="email" value="joe_smith@aol.com" /> 
            <br />
            Enter a Password : <input type="password" name="price" value="" /> 
            <br />                
            <input type="hidden" name="user_id" value="" />
            <input type="hidden" name="created" value="<?php echo DateTime.Now(); ?>" />
            <input type="submit" value="Submit" />
            <br />
            <br />
            <a href="./site/index.php">Log In</a> | <a href="../index.php">Back</a>
        </form>
        
        
        
    </body>
</html>