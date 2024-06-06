<?php

session_start() ;

if(isset($_SESSION['name'])){

    session_unset() ;
    session_destroy() ;

    require("__domain.php") ;

    header("location:{$domain}") ;

}