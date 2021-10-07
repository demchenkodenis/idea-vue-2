<?php
    
    require_once('connect_db.php');

    $data = $pdo->query('SELECT * FROM `index_page`')->fetch();

    print_r(json_encode($data));

?>