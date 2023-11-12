<?php
session_start();

require 'config/database.php';


if(!$_SESSION['name']){
    header('location: login.php');
}

?>