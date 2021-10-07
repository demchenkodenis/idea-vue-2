<?php

require_once('connect_db.php');

if(isset($_GET['id'])){
    $d = $_GET['id'];
}

if($d == 'cd6af48346b090e049bdc12fa54e2cbf'){
    $stm = $pdo->prepare('UPDATE settings SET `value` = "no" WHERE id = 1');
    $stm->execute();
    print_r('ok');
}else{
    print_r('nope!');
}

?>