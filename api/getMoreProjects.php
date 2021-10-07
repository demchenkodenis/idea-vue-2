<?php
    
    require_once('connect_db.php');
    
    if(isset($_GET['offset'])){
        $offset = $_GET['offset'];
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
        $id = '';
    }

    $projects = [];


    if($id == ''){
        $stmt = $pdo->prepare('SELECT
                                `portfolio`.`id`,
                                `portfolio`.`title`,
                                `portfolio`.`description`,
                                `portfolio`.`preview_img`
                            FROM
                                `project_portfolio`
                            INNER JOIN `portfolio` ON `portfolio`.`id` = `project_portfolio`.`id_portfolio`
                            LIMIT 8
                            OFFSET :offset');

        $stmt->bindValue(':offset', (int) $offset, PDO::PARAM_INT);
        $stmt->execute();

        while ($row = $stmt->fetch()){
            $projects[] =  $row;
        }
        
        print_r(json_encode($projects));
    }else{
        $stmt = $pdo->prepare('SELECT
                                    `portfolio`.`id`,
                                    `portfolio`.`title`,
                                    `portfolio`.`description`,
                                    `portfolio`.`preview_img`
                                FROM
                                    `project_portfolio`
                                INNER JOIN `portfolio` ON `portfolio`.`id` = `project_portfolio`.`id_portfolio`
                                WHERE
                                    id_project = :id
                                LIMIT 8
                                OFFSET :offset');

        $stmt->bindValue(':id', (int) $id, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int) $offset, PDO::PARAM_INT);
        $stmt->execute();

        while ($row = $stmt->fetch()){
            $projects[] =  $row;
        }
    
        print_r(json_encode($projects));
    }

?>