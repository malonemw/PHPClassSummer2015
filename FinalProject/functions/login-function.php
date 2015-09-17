<?php
/*
 * users
 * user_id
 * email
 * password
 */
function isValidUser( $email, $pass ) {
    
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
    $pass = sha1($pass);
    $binds = array(
        ":email" => $email,
        ":password" => $pass
    );
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;      
    }
     
    return false;
    
}

//function getUser( $email, $pass ) {
//    
//    $db = dbconnect();
//    $stmt = $db->prepare("SELECT user_id FROM users where email = :email AND password = :password");
//    $pass = sha1($pass);
//    $binds = array(
//        ":email" => $email,
//        ":password" => $pass
//    );
//    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
//        $user_id = $stmt;
//        return $user_id; 
//    }
//    return "";
//}

function getUser( $email, $pass ) {
    
    $db = dbconnect();
    $pass = sha1($pass);
    $user_id = $db->prepare("SELECT user_id FROM users where email = $email AND password = $pass");
       
        return $user_id; 
}
