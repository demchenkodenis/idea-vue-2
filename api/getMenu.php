<?php
    
    require_once('connect_db.php');

    $services = [];

    $stmt = $pdo->query('SELECT * FROM `idea`.`services`');
    while ($row = $stmt->fetch()){
        $services[] =  $row;
    }

    print_r(json_encode($services));

?>