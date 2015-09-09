<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>stuff</h1>
        <?php
        echo 'Welcome to the Book of Addresses';
            require_once 'includes/session-start.req-inc.php';
            
            include_once 'functions/dbconnect.php';
            include_once 'functions/login-function.php';
            include_once 'functions/until.php';
        
            
            if ( isPostRequest() ) {
                
                $email = filter_input(INPUT_POST, 'email');
                $password = filter_input(INPUT_POST, 'pass');
                
                if ( isValidUser($email, $password) ) {
                    $_SESSION['isValidUser'] = true;                    
                } else {
                    $results = 'Sorry please try again';
                }
               
            }
            
            
            if ( isset($_SESSION['isValidUser']) &&  $_SESSION['isValidUser'] === true ) {
                echo '/includes/admin-links.html;';
            }
            else {
                include 'includes/loginform.html.php'; 
            }
        
         
            
        ?>
        
        <?php include 'includes/results.html.php'; ?>        
        
    </body>
</html>