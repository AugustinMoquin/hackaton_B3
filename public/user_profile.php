<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compte Utilisateur</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php
        if(isset($_COOKIE['name'])){
    ?>
    <div class="container">
        <h1>Ton Compte Utilisateur</h1>
        <div class="user-info">
            <form action="https://ynov-b3.000webhostapp.com/public/home.php">
                <button>retour à la casa</button>
            </form>
            <img src="profile_picture/bald_kid_poop.gif" alt="Photo de profil" class="img">
            <div class="user-details">
                <p class="username"><strong>Nom d'utilisateur:</strong> DJLopez</p>
                <p><strong class="email">E-mail:</strong> DJLOPEZ@gmail.com</p>
            </div>
        </div>
        <form action="../src/handler/logout.php" method="post">
            <button type="submit">Déconnexion</button>
        </form>
    </div>
    <?php
        }else{
            echo "pas encore chez nous ?  ";
            include "../src/header.php";
        }
    ?>
</body>


<style>
    body {
    margin: 0px;
    height: 100vh;
    width: 100vw;
    display: flex;
    justify-content: center;
    margin-top: 10vh;
}

.container{
    width: 25vw;
    height: 32rem;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

.img {
    margin-top: 3rem;
    border-radius: 90%;
    height: 12rem;
    width: 12rem;
}

h1{
    text-align: center;
}

.user-info{
    border-radius: 5%;
    background-color: seashell;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center ;
    width: 20rem;
    height:32rem;
}
</style>