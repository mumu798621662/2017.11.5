<?php
header('Content-type:text/html;charset=utf8');
include '../libs/db.php';
if($_SERVER['REQUEST_METHOD']=='GET'){
    include '../libs/function.php';
    $obj = new unit();
    $trs=$obj->cateTree(0,$mysql,'addfenlei',0);
    include '../template/admin/addArticle1.html';

}else{
//文章标题内容图片
//    $title=$_POST['title']
    $src='';
    $cid=$_POST['cid'];
    $title=$_POST['title'];
    $description=$_POST['description'];
    $times=$_POST['times'];
    $author=$_POST['author'];
    $editor=$_POST['editor'];
    $origin=$_POST['origin'];
    $content=$_POST['content'];
    $ends=$_POST['ends'];
//    $thumb=$_FILES['img'];

//    上传文件

    $file = $_FILES['img'];
    if (is_uploaded_file($file['tmp_name'])){
        if (!file_exists('../static/upload')) {
            mkdir('../static/upload', 0777, true);
        }
        $path = '../static/upload/' . date('y-m-d');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $imgPath = $path . '/' . $file['name'];
        move_uploaded_file($_FILES['img']['tmp_name'], $imgPath);

        $src = '/project1/' . substr($imgPath, 3);
    }
        $sql="insert into news1 (cid,title,description,times,author,editor,origin,content,ends,thumb) values ('{$cid}','{$title}','{$description}','{$times}','{$author}','{$editor}','{$origin}','{$content}','{$ends}','{$src}')";
        $mysql->query($sql);
        if($mysql->affected_rows){
            $message='插入成功';
            $url='showArticle1.php';
        }else{
            $message='插入失败';
            $url='showArticle1.php';
        }
        include '../template/admin/message.html';
}