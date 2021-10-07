<?php
    
    require_once('connect_db.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    
    $service = [];
    $projects = [];
    $faq = [];

    $service_stmt = $pdo->prepare('SELECT
                            *
                        FROM
                            `pages`
                        WHERE
                            id = :id');

    $service_stmt->bindValue(':id', (int) $id, PDO::PARAM_INT);
    $service_stmt->execute();

    while ($row = $service_stmt->fetch()){
        $service[] =  $row;
    }

    $projects_stmt = $pdo->prepare('SELECT
                                `portfolio`.`id`,
                                `portfolio`.`title`,
                                `portfolio`.`description`,
                                `portfolio`.`preview_img`,
                                `pages_portfolio`.`additional_src`
                            FROM
                                `pages_portfolio`
                            INNER JOIN `portfolio` ON `portfolio`.`id` = `pages_portfolio`.`id_portfolio`
                            WHERE
                                `pages_portfolio`.`id_page` = :id
                            ORDER BY `pages_portfolio`.`sorting`');

    $projects_stmt->bindValue(':id', (int) $id, PDO::PARAM_INT);
    $projects_stmt->execute();

    while ($row2 = $projects_stmt->fetch()){
        $projects[] =  $row2;
    }
    
    
    $faq_stmt = $pdo->prepare('SELECT
                                `question`, `answer`
                            FROM
                                `faq`
                            WHERE
                                `id_services` = :id
                            ORDER BY `sorting`');

    $faq_stmt->bindValue(':id', (int) $id, PDO::PARAM_INT);
    $faq_stmt->execute();

    while ($row3 = $faq_stmt->fetch()){
        $faq[] =  $row3;
    }

    $data = array(
        'data' => $service,
        'project' => $projects,
        'faq' => $faq,
    );

    print_r(json_encode($data));
?>