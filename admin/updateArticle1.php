<?php
error_reporting(E_ALL^E_NOTICE);
header('Content-type:text/html;charset=utf8');
if($_SERVER['REQUEST_METHOD']=='GET'){
    include '../libs/db.php';
    include '../libs/function.php';
    $obj = new unit();
    $obj->model=='news1';
    $nid=$_GET['nid'];
    $trs=$obj->cateTree(0,$mysql,'addfenlei',0,$nid);
    $sql="select * from news1";
    $mysql->query($sql);
    $cname=$obj->selectone1($mysql,'news1',$nid,'title');
    include '../template/admin/updateArticle1.html';
}else{
    include '../libs/db.php';
    $cid=$_POST['cid'];
    $nid=$_POST['nid'];
    $title=$_POST['title'];
    $description=$_POST['description'];
    $times=$_POST['times'];
    $author=$_POST['author'];
    $editor=$_POST['editor'];
    $origin=$_POST['origin'];
    $content=$_POST['content'];
    $thumb=$_POST['thumb'];
    $ends=$_POST['ends'];

    $sql="update news1 set cid='{$cid}',nid='{$nid}',title='{$title}',description
 ='{$description}',times='{$times}',author='{$author}',editor='{$editor}',origin='{$origin}',content='{$content}',thumb='{$thumb}',ends='{$ends}' where nid='{$cid}'";
    $mysql->query($sql);
    if($mysql->affected_rows){
        $message='修改成功';
        $url='showArticle1.php';
    }else{
        $message='修改失败';
        $url='showArticle1.php';
    }
    include '../template/admin/message.html';
}