<?php
error_reporting(E_ALL^E_NOTICE);
include '../libs/db.php';
include 'header.php';

$cid=$_GET['cid'];
$sql="select * from addfenlei where cid={$cid}";
$data=$mysql->query($sql)->fetch_assoc();




$cname=$data['cname'];
$sql="select * from news1 where cid={$cid}";
$wenzhang=$mysql->query($sql)->fetch_all(MYSQLI_ASSOC);



include '../template/index/' .$data['template'];
include 'footer.php';


