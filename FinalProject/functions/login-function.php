<?php
/*
 * users
 * user_id
 * email
 * password
 */
function isValidUser( $email, $pass ) {
    
    $user_id = "";
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

function getUserID( $email, $pass ) {
    
    $user_id = 0;
    $db = dbconnect();
    $stmt = $db->prepare("SELECT user_id FROM users where email = :email AND password = :password");
    $pass = sha1($pass);
    $binds = array(
        ":email" => $email,
        ":password" => $pass
    );
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        $user_id = $results['user_id'];
         
    }
    return $user_id;
}

//function getUser( $email, $pass ) {
//    
//    $db = dbconnect();
////    $pass = sha1($pass);
//    $user_id = $db->prepare("SELECT user_id FROM users WHERE email = :email AND password = :pass");
//    $binds = array(
//        ":email" => $email,
//        ":password" => $pass
//    );
//    $user_id->execute($binds);
//       
//        return $user_id; 
//}
