<?php
    
    require_once('connect_db.php');
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

    $projects = [];

    if($id == ''){
        $stmt = $pdo->query('SELECT
                                `premises_category`.`title`,
                                `premises_portfolio`.`id_portfolio` AS `id`,
                                `premises_portfolio`.`preview_img`
                            FROM
                                `premises_portfolio`
                            INNER JOIN `premises_category` ON `premises_category`.`id` = `premises_portfolio`.`id_premises_category`
                            LIMIT 8');

        while ($row = $stmt->fetch()){
            $projects[] =  $row;
        }

        print_r(json_encode($projects));
    }else{
        $stmt = $pdo->prepare('SELECT
                                    `premises_category`.`title`,
                                    `premises_portfolio`.`id_portfolio` AS `id`,
                                    `premises_portfolio`.`preview_img`
                                FROM
                                    `premises_portfolio`
                                INNER JOIN `premises_category` ON `premises_category`.`id` = `premises_portfolio`.`id_premises_category`
                                WHERE
                                    `premises_category`.`id` = ?
                                LIMIT 8');
 
        $stmt->execute([$id]);

        while ($row = $stmt->fetch()){
            $projects[] =  $row;
        }
    
        print_r(json_encode($projects));
    }

?>