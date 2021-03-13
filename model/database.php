<?php
    $dsn = 'mysql:host=eyw6324oty5fsovx.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=kc9wru2woexyxi29';
    $username = 'aqirvai49gq5v9k7';
    $password = 'zlzh68wqsrpvcthy';
    

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        exit();
    }
?>
