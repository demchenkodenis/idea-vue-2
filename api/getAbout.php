<?php
    
    require_once('connect_db.php');

    $about = [];
    $tasks = [];
    $team = [];

    $about = $pdo->query('SELECT * FROM `about`')->fetch();

    $tasks_smtp = $pdo->query('SELECT * FROM `about_task`');
    
    while ($row = $tasks_smtp->fetch()){
        $tasks[] =  $row;
    }
    
    $smtp = $pdo->query('SELECT * FROM `about_team` ORDER BY `sorting` DESC');
    
    while ($row2 = $smtp->fetch()){
        $team[] = $row2;
    }

    $data = array(
        'about' => $about,
        'task' => $tasks,
        'team' => $team
    );

    print_r(json_encode($data));

?>