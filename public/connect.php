<?php
function openCon(){
$servername = "localhost";
$username = "id21346810_admin";
$password = "YNOHackaton4!";
$database = "id21346810_hackaton";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {    
    echo "Connection failed: " . $e->getMessage();
    }
}
?>
