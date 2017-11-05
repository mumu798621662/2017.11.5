<?php
header('Content-type:text/html;charset=utf8');
  if($_SERVER['REQUEST_METHOD']=='GET'){
      include '../libs/db.php';
      include '../libs/function.php';
      $obj = new unit();
      $obj->model=='addfenlei';
      $cid=$_GET['cid'];
      $trs=$obj->cateTree(0,$mysql,'addfenlei',0,$cid);
      $cname=$obj->selectone($mysql,'addfenlei',$cid,'cname');
      include '../template/admin/updates.html';

}else{
  include '../libs/db.php';
 $cid=$_POST['cid'];
 $cname=$_POST['cname'];
 $pid=$_POST['pid'];
 $template=$_POST['template'];
 $sql="update addfenlei set cname='{$cname}',pid='{$pid}',template='{$template}' where cid='{$cid}'";
 $mysql->query($sql);
 if($mysql->affected_rows){
     $message='修改成功';
     $url='show.php';
 }else{
     $message='修改失败';
     $url='show.php';
 }
 include '../template/admin/message.html';
  }