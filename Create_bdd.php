<?php

$serveur = "localhost"; 
$utilisateur = "id21346810_admin"; 
$motdepasse = "YNOHackaton4!"; 
$basededonnees = "id21346810_hackaton"; 

$connexion = mysqli_connect($serveur, $utilisateur, $motdepasse);

if (!$connexion) {
    die("Erreur de connexion à la base de données : " . mysqli_connect_error());
}


$sql = "CREATE DATABASE IF NOT EXISTS $basededonnees";
if (mysqli_query($connexion, $sql)) {
    echo "Base de données créée avec succès<br>";
} else {
    echo "Erreur lors de la création de la base de données : " . mysqli_error($connexion) . "<br>";
}


mysqli_select_db($connexion, $basededonnees);


$sql = "CREATE TABLE IF NOT EXISTS Voie_future (
    id INT AUTO_INCREMENT PRIMARY KEY,
    reseau VARCHAR(12),
    statut VARCHAR(10),
    longitude VARCHAR(25),
    latitude VARCHAR(25)
)";
if (mysqli_query($connexion, $sql)) {
    echo "Table 'Voie_future' créée avec succès<br>";
} else {
    echo "Erreur lors de la création de la table 'Voie_future' : " . mysqli_error($connexion) . "<br>";
}


$sql = "CREATE TABLE IF NOT EXISTS USER (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(25),
    PASSWORD VARCHAR(25),
    email VARCHAR(25)
)";
if (mysqli_query($connexion, $sql)) {
    echo "Table 'USER' créée avec succès<br>";
} else {
    echo "Erreur lors de la création de la table 'USER' : " . mysqli_error($connexion) . "<br>";
}

$sql = "CREATE TABLE IF NOT EXISTS Zone_secure (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(12),
    longitude VARCHAR(25),
    latitude VARCHAR(25)
)";
if (mysqli_query($connexion, $sql)) {
    echo "Table 'Zone_secure' créée avec succès<br>";
} else {
    echo "Erreur lors de la création de la table 'Zone_secure' : " . mysqli_error($connexion) . "<br>";
}

$sql = "CREATE TABLE IF NOT EXISTS Velib (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30),
    capacity INT(10),
    longitude VARCHAR(25),
    latitude VARCHAR(25),
    num_docks_dispo INT,
    num_velo_dispo INT
)";
if (mysqli_query($connexion, $sql)) {
    echo "Table 'Velib' créée avec succès<br>";
} else {
    echo "Erreur lors de la création de la table 'Velib' : " . mysqli_error($connexion) . "<br>";
}


$sql = "CREATE TABLE IF NOT EXISTS Travaux (
    id INT AUTO_INCREMENT PRIMARY KEY,
    longitude VARCHAR(25),
    latitude VARCHAR(25),
    description VARCHAR(40),
    voie VARCHAR(30),
    precision_localisation VARCHAR(30),
    impact_circulation VARCHAR(60),
    impact_circulation_detail VARCHAR(50),
    niveau_perturbation VARCHAR(40),
    statut VARCHAR(30)
)";
if (mysqli_query($connexion, $sql)) {
    echo "Table 'Travaux' créée avec succès<br>";
} else {
    echo "Erreur lors de la création de la table 'Travaux' : " . mysqli_error($connexion) . "<br>";
}


mysqli_close($connexion);
?>
