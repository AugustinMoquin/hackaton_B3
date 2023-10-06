<?php
$servername = "localhost";
$username = "id21346810_admin";
$password_db = "YNOHackaton4!";
$database = "id21346810_hackaton";
ob_start();
try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password_db);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {    
    echo "Connection failed: " . $e->getMessage();
    }


// Récupérez les données du formulaire (assurez-vous de les valider et de les sécuriser).
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];


// Préparez la requête SQL avec une requête préparée pour éviter les injections SQL.
$sql = "INSERT INTO USER (username, password, email) 
        VALUES ('$username', '$password', '$email')";
$stmt = $conn->prepare($sql);


// Exécutez la requête SQL.
try{
    if ($stmt->execute()) {
        echo "L'utilisateur a été enregistré avec succès.";
    // Créer un cookie de connexion
    $cookie_name = $username;
    $cookie_value = json_encode(array("username" => $username));
    
    // Vous pouvez également définir une durée de vie pour le cookie (par exemple, 1 heure).
    $expiration_time = time() + 9000; // Expire dans 1 heure (3600 secondes)

    // Définir le cookie avec setcookie
    setcookie($cookie_name, $cookie_value, $expiration_time, "/");
    } else {
        echo "Erreur lors de l'enregistrement de l'utilisateur : " . $conn->error;
    }
    
} catch (PDOException $e) {
    if ($e->getCode() === '23000') {
        // This error code '23000' corresponds to "Integrity constraint violation: 1062 Duplicate entry"
        echo "Duplicate entry error: This record already exists.";
    } else {
        // Handle other database errors
        echo "Database error: " . $e->getMessage();
    }
}
ob_end_flush();

?>