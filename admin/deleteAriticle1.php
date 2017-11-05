<?php
include '../libs/db.php';
//include '../libs/function.php';
$nid=$_GET['nid'];
//$sql="select * from news1 where nid=$nid";
//$data=$mysql->query($sql);
//if(count($data->fetch_assoc())){
//
//    $message='有子栏目，无法删除';
//    $url='show.php';
//    include '../template/admin/message.html';
//    exit;
//}

$sql="delete from news1 where nid=$nid";
$mysql->query($sql);
if($mysql->affected_rows){
    $message='删除成功';
    $url='showArticle1.php';
    include '../template/admin/message.html';
}else{
    $message='删除失败';
    $url='showArticle1.php';
    include '../template/admin/message.html';
}