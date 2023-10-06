<!doctype html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>L'Hidalgo</title>
    
  </head>
  <body>
<?php 
    if(isset($_COOKIE['name'])){
        $name = $_COOKIE['name'];
        echo "
        <form action='https://ynov-b3.000webhostapp.com/public/user_profile.php'>
            <button type='submit' class='user'> $name </button>
        </form>";
    }else{
       echo "
        <form action='https://ynov-b3.000webhostapp.com/public/login_register.php'>
            <button type='submit' class='user'> Register/Login </button>
        </form>";
    }
?>

<button class="aboutus">About us</button>

<style>
    .user{
        position:absolute;
        right:0%;
        margin:1rem;
    }
    
    .aboutus{
        position:absolute;
        margin:1rem;
    }
    
</style>
