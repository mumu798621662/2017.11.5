<?php
if($_SERVER['REQUEST_METHOD']=='GET'){
    include '../libs/db.php';
    include '../libs/function.php';
    $deletes=new unit();
    $trs=$deletes->deletebiaoge($mysql,'addfenlei');
    include '../template/admin/show.html';
}