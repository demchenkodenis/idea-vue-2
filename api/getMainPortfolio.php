<?php

require_once('connect_db.php');

$portfolio = [];

$stmt = $pdo->query('SELECT
                        `portfolio`.`id`,
                        `portfolio`.`title`,
                        `portfolio`.`description`,
                        `portfolio`.`preview_img`,
                        `index_page_portfolio`.`additional_src`
                    FROM
                        `portfolio`
                    INNER JOIN `index_page_portfolio` ON `index_page_portfolio`.`id_portfolio` = `portfolio`.`id`');

while ($row = $stmt->fetch()){
    $portfolio[] =  $row;
}

print_r(json_encode($portfolio));

?>