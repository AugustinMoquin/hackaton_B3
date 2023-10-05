<?php
$servername = "localhost";
$username = "id21346810_admin";
$password_db = "HackatonYNOV4!";
$database = "id21346810_user";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}


$sql = "CREATE TABLE velib (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    capacity INT(6) NOT NULL,
    num_docks_available INT(6) NOT NULL,
    num_bikes_available INT(6) NOT NULL,
    lat FLOAT(10, 6) NOT NULL,
    lon FLOAT(10, 6) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'velib' créée avec succès.";
} else {
    echo "Erreur lors de la création de la table : " . $conn->error;
}


$conn->close();
?>
