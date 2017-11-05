<?php
if($_SERVER['REQUEST_METHOD']=='GET') {  //根据请求方式判断是打开一个页面还是验证
    include '../template/admin/login.html';  //引进登陆页面  需要写明路径
}else{                             //验证账号密码
$user=$_POST['user'];
$pass=$_POST['password'];
header('Content-type:text/html;charset=utf8');
$mysql=new mysqli('localhost','root','','project1','3306');
$mysql->query('set names utf8');
if($mysql->connect_errno){
    echo '数据库连接失败，失败信息' .$mysql->connect_errno;
    exit;
}
    $sql="select * from admin";
    $result=$mysql->query($sql);  //结果集
    $data=$result->fetch_all(1);  //转换成关联数组
    for($i=0;$i<count($data);$i++){
        if($data[$i]['uname']==$user && $data[$i]['upass']==$pass){
            header('Location:main.php');
        }else{
            $message='登录失败';
            $url='login.php';
            include '../template/admin/message.html';
        }
};

}