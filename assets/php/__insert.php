<?php

if(isset($_POST['createBtn'])) {

    require("__connection.php") ;
    
    $username = $_POST['username'] ;
    $email = $_POST['email'] ;
    $password = $_POST['password'] ;
    
    $hashed_password = password_hash($password , PASSWORD_DEFAULT) ;
    
    $insert = "INSERT INTO users (name , email , password) VALUES ('{$username}' , '{$email}' , '{$hashed_password}')" ;
    
    $result = mysqli_query($connection , $insert) ;
    
    if($result) {
        // header("location:/phpZirakpurEveryday/Login system/createAccount.php?success") ;
        
        require("__domain.php") ;
        header("location:{$domain}createAccount.php?success") ;
    }


}else {

    echo "You are not allowed here" ;
}

