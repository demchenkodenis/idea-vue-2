<?php
header('Content-Type: application/json; charset=utf-8', true);
    
    require_once('connect_db.php');

    $contact = [];

    $stmt = $pdo->query('SELECT * FROM `contact`');
    while ($row = $stmt->fetch()){
        $contact[] =  $row;
    }

    print_r(json_encode($contact));


?>