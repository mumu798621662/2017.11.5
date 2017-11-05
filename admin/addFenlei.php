<?php
if($_SERVER['REQUEST_METHOD']=='GET'){
    include '../libs/db.php';
    include '../libs/function.php';
    $add=new unit();

    $option=$add->cateTree(0,$mysql,'addfenlei',0);
    include '../template/admin/addFenlei.html';
}else{
    $pid=$_POST['pid'];

//    $cid=$_POST['cid'];
    $cname=$_POST['cname'];
    $template=$_POST['template'];

    include '../libs/db.php';
$sql="insert into addfenlei (pid,cname,template) value ('{$pid}','{$cname}','{$template}')";
$mysql->query($sql);
    if($mysql->affected_rows){
        $message='添加成功';
        $url='show.php';
    }else{
        $message='添加失败';
        $url='show.php';
    }
    include '../template/admin/message.html';
}