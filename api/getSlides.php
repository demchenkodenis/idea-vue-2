<?php
    
    require_once('connect_db.php');

    $slides = [];

    $stmt = $pdo->query('SELECT `id`, `slide_image_src` FROM `index_page_slider`');
    while ($row = $stmt->fetch()){
        $slides[] =  $row;
    }

    print_r(json_encode($slides));
?>