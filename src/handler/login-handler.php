<?php

$err_msg='';

$servername = "localhost";
$username = "id21346810_admin";
$password_db = "YNOHackaton4!";
$database = "id21346810_hackaton";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password_db);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {    
    echo "Connection failed: " . $e->getMessage();
}


// Récupérez les données du formulaire (assurez-vous de les valider et de les sécuriser).
$log_username = $_POST['log_username'];
$log_password = $_POST['log_password'];


// Préparez la requête SQL avec une requête préparée pour éviter les injections SQL.
$sql = "SELECT username, password, email FROM USER WHERE username = '$log_username'";

try{
    $result = $conn->query($sql);
    
    // output data of each row
    while($row = $result->fetch()) {
      if($row["username"] == $log_username && $row["password"] == $log_password){
        ob_start(); // Active la mise en mémoire tampon de sortie
        
        echo 'cookie done';
          
        // Créer un cookie de connexion
        $cookie_value = $log_username;
        $cookie_vale_email = $row["email"];
        //json_encode(array("username" => $log_username));
        
        // Vous pouvez également définir une durée de vie pour le cookie (par exemple, 1 heure).
        $expiration_time = time() + 9000; // Expire dans 1 heure (3600 secondes)
    
        // Définir le cookie avec setcookie
        setcookie('name', $cookie_value, $expiration_time, "/");
        setcookie('email', $cookie_value_email, $expiration_time, "/");
        echo '<script>window.location.href = "https://ynov-b3.000webhostapp.com/public/home.php";</script>';
        ob_end_flush();
          
      }else {
          $err_msg = "wrong password";
          echo '<script>window.location.href = "https://ynov-b3.000webhostapp.com/public/login_register.php";</script>';
      }
    }
}catch (PDOException $e) {
    echo $e;    
}



//try{
    /*if ($stmt->execute()) {
        echo "vous êtes connecté";
        // Créer un cookie de connexion
        $cookie_name = $username;
        $cookie_value = json_encode(array("username" => $username));
        
        // Vous pouvez également définir une durée de vie pour le cookie (par exemple, 1 heure).
        $expiration_time = time() + 9000; // Expire dans 1 heure (3600 secondes)
    
        // Définir le cookie avec setcookie
        setcookie($cookie_name, $cookie_value, $expiration_time, "/");
    } else {
        echo "Erreur lors de l'enregistrement de l'utilisateur : " . $conn->error;
    }*/
    
//} 
/*catch (PDOException $e) {
    if ($e->getCode() === '23000') {
        // This error code '23000' corresponds to "Integrity constraint violation: 1062 Duplicate entry"
        echo "Duplicate entry error: This record already exists.";
    } else {
        // Handle other database errors
        echo "Database error: " . $e->getMessage();
    }
}*/
?>