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
                                premises_portfolio.id_portfolio AS id,
                                premises_portfolio.preview_img,
                                premises_category.title
                            FROM
                                premises_portfolio
                            INNER JOIN premises_category ON premises_category.id = premises_portfolio.id_premises_category
                            ORDER BY premises_portfolio.sorting
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
                                    premises_portfolio.id_portfolio AS id,
                                    premises_portfolio.preview_img,
                                    premises_category.title
                                FROM
                                    premises_portfolio
                                INNER JOIN premises_category ON premises_category.id = premises_portfolio.id_premises_category
                                WHERE
                                    `premises_category`.`id` = :id
                                ORDER BY premises_portfolio.sorting
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