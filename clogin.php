<?php
session_start();
if(isset($_SESSION['login_user']) && !empty($_SESSION['name_cus'])){
} else{
    header('Location:login.php');
}
?>