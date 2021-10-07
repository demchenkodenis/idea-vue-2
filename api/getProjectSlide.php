<?php
    
    require_once('connect_db.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

    $slides = [];

    $slides_smtp = $pdo->prepare('SELECT id_portfolio, preview_img FROM `premises_portfolio` WHERE id_portfolio = :id');
    
    $slides_smtp->bindValue(':id', (int) $id, PDO::PARAM_INT);
    $slides_smtp->execute();

    while ($row = $slides_smtp->fetch()){
        $slides[] = $row;
    }

    print_r(json_encode($slides));

?>