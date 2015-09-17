<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Welcome to the Book of Addresses</h1>
        <?php
            require_once '../includes/session-start.req-inc.php';
            
            include_once '../functions/dbconnect.php';
            include_once '../functions/login-function.php';
            include_once '../functions/until.php';
        
            
            if ( isPostRequest() ) {
                
                $email = filter_input(INPUT_POST, 'email');
                $password = filter_input(INPUT_POST, 'pass');
                
                if ( isValidUser($email, $password) ) {
                    $_SESSION['user_id'] = getUser($email, $password);                    
                } else {
                    $results = 'Sorry please try again';
                }
               
            }
            
            
            if ( isset($_SESSION['user_id']) && intval($_SESSION['user_id']) > 0 ) {
                include '../includes/site-links.html.php';
            }
            else {
                include '../includes/loginform.html.php'; 
            }
        
         
            
        ?>
        
        <?php include '../includes/results.html.php'; ?>        
        
    </body>
</html>