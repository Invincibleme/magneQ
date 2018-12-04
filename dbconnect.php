<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=task", $username, $password);

    
    }
catch(PDOException $e)
    {
        die ('Could Not Conect');
    
    }
?>