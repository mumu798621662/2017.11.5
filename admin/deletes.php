<?php
include '../libs/db.php';
include '../libs/function.php';
$cid=$_GET['cid'];
$sql="select * from addfenlei where pid=$cid";
$data=$mysql->query($sql);
if(count($data->fetch_assoc())){

    $message='有子栏目，无法删除';
    $url='show.php';
    include '../template/admin/message.html';
    exit;
}

$sql="delete from addfenlei where cid=$cid";
$mysql->query($sql);
if($mysql->affected_rows){
    $message='删除成功';
    $url='show.php';
    include '../template/admin/message.html';
}else{
    $message='删除失败';
    $url='sh.php';
    include '../template/admin/message.html';
}
