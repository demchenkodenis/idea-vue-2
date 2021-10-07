<?php
    
    require_once('connect_db.php');

    $category = [];

    $stmt = $pdo->query('SELECT
                            `id`,
                            `title`
                        FROM
                            `premises_category`
                        ORDER BY
                            `sorting`');

    while ($row = $stmt->fetch()){
        $category[] =  $row;
    }

    print_r(json_encode($category));

?>