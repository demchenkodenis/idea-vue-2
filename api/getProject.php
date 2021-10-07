<?php

    require_once('connect_db.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }


    $stmt = $pdo->prepare('SELECT
                            `title`,
                            `description`,
                            `html_code`
                        FROM
                            `portfolio`
                        WHERE
                            id = :id');

    $stmt->bindValue(':id', (int) $id, PDO::PARAM_INT);
    $stmt->execute();
    $project = $stmt->fetch();

    print_r(json_encode($project));
?>