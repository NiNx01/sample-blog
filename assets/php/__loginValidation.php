<?php

if(isset($_POST['loginBtn'])) {

    require("__connection.php") ;
    require("__domain.php") ;

    $loginEmail = $_POST['loginEmail'] ;
    $loginPassword = $_POST['loginPassword'] ;

    $selectUser = "SELECT * FROM users WHERE email ='{$loginEmail}'" ;
    $resultUser = mysqli_query($connection , $selectUser) ;

    $numberOfUsers = mysqli_num_rows($resultUser) ;

    if($numberOfUsers > 0) {
        // echo "Account exists" ;

        // Validate passeord

        $outputUser = mysqli_fetch_assoc($resultUser) ;

        // password_verify($loginPassword , $outputUser['password']) ;

        if(password_verify($loginPassword , $outputUser['password'])){
            // password matches

            session_start() ;

            $_SESSION['id'] = $outputUser['id'];
            $_SESSION['name'] = $outputUser['name'];
            $_SESSION['email'] = $outputUser['email'];


            header("location:{$domain}") ;

        }else{

            header("location:{$domain}login.php?wrongPassword") ;

        }


    }else {
        header("location:{$domain}login.php?noAccount") ;
    }



}else {
    echo "You are not allowed here" ;
}