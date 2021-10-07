<?php
    
    require_once('connect_db.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

    
    $title = '';
    $description = '';
    $slides = [];

    $data_stmt = $pdo->prepare('SELECT `title`, `description` FROM `portfolio` WHERE id = ?');
    $data_stmt->execute([$id]);
    $d = $data_stmt->fetch();

    $slides_stmt = $pdo->prepare('SELECT `id_portfolio`, `src` FROM `mobile_slider` WHERE `id_portfolio` = ?');
    $slides_stmt->execute([$id]);

    while ($row = $slides_stmt->fetch()){
        $slides[] = $row;
    }

    $data = array(
        'title' => $d['title'],
        'description' => $d['description'],
        'slides' => $slides
    );

    print_r(json_encode($data));

?>