<?php
    $dsn = 'mysql:host=localhost;dbname=itp225Mod6'; 
    $username = 'root'; //if you change your user - be sure to put that in SQL script so I can load it!
    $password = '';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>