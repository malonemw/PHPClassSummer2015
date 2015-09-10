<?php
function createUser($email,$pass) {
    $db = dbconnect();
    $stmt = $db->prepare("INSERT INTO users SET email = :email, pass = :pass");
    $binds = array(
        ":email" => $email,
        ":pass" => $pass
    );
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;
    }
     
    return false;
    
}
?>