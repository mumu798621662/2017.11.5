<?php
if($_SERVER['REQUEST_METHOD']=='GET'){
    include '../libs/db.php';
    include '../libs/function.php';
    $deletes=new unit();
    $trs=$deletes->deleteArticle1($mysql,'news1');
    include '../template/admin/showArticle1.html';
}
