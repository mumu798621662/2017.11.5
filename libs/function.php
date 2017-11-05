<?php
class unit{
    function __construct()
    {
        $this->str='';
        $this->parentid=null;
        $this->model='';
    }
//    pid  数据库$mysql  $table表   $flag(0)标记属于几级分类  $current 当前栏目的id；
  function cateTree($pid,$db,$table,$flag,$current=null){
      $flag++;
      $parentid=null;
      if($current && $this->model=='addfenlei'){
          $sql="select pid from $table where cid=$current" ;
          $data= $db->query($sql)->fetch_assoc();
          $this->parentid=$data['pid'];
      }else if($current && $this->model=='news1'){
          $sql="select cid from $this->model where nid=$current" ;
          $data= $db->query($sql)->fetch_assoc();
          $this->parentid=$data['cid'];
      }
        $sql="select * from {$table} where pid={$pid}";
        $data=$db->query($sql);
        while($row=$data->fetch_assoc()){
            if($row['cid']==$this->parentid){
             $this->str .="<option value={$row['cid']} selected> $flag{$row['cname']}</option>";
            }
            $this->str .="<option value={$row['cid']}> $flag{$row['cname']}</option>";
            $this->cateTree($row['cid'],$db,$table,$flag);
        }
        return $this->str;
  }

  function deletebiaoge($db,$table){
   $sql="select * from $table";
   $data=$db->query($sql)->fetch_all(MYSQLI_ASSOC);
   for($i=0;$i<count($data);$i++){
       $this->str .="
                   <tr>
                <td>{$data[$i]['cid']}</td>  
                <td>{$data[$i]['cname']}</td>
                <td>{$data[$i]['pid']}</td>
                <td>{$data[$i]['template']}</td>
                <td>
                    <a href=\"deletes.php?cid={$data[$i]['cid']}\"><button>删除</button></a>
                    <a href=\"updates.php?cid={$data[$i]['cid']}\"><button>修改</button></a>
                </td>
            </tr>
       
       ";
   }
      return $this->str;
  }

function selectone($db,$table,$id,$attr){
 $sql="select $attr from $table where cid={$id}";
 $data=$db->query($sql)->fetch_assoc();
 $cname=$data[$attr];
 return $cname;
}

    function selectone1($db,$table,$id,$attr){
        $sql="select $attr from $table where nid={$id}";
        $data=$db->query($sql)->fetch_assoc();
        $cname=$data[$attr];
        return $cname;
    }


    function deleteArticle1($db,$table){
        $sql="select * from $table";
        $data=$db->query($sql)->fetch_all(MYSQLI_ASSOC);
        for($i=0;$i<count($data);$i++){
            /** @var TYPE_NAME $ */
            $this->str .="
                   <tr>
                <td>{$data[$i]['cid']}</td>
                <td>{$data[$i]['title']}</td>
                <td>{$data[$i]['description']}</td>
                <td>{$data[$i]['times']}</td>
                <td>{$data[$i]['author']}</td>
                <td>{$data[$i]['editor']}</td>
                <td>{$data[$i]['origin']}</td>
                <td>{$data[$i]['content']}</td>
                <td>{$data[$i]['ends']}</td>
               <td><img src='{$data[$i]['thumb']}' alt='' style='width: 100px;height: 100px;'></td>
                <td>
                    <a href=\"deleteAriticle1.php?nid={$data[$i]['nid']}\"><button>删除</button></a>
                    <a href=\"updateArticle1.php?nid={$data[$i]['nid']}\"><button>修改</button></a>
                </td>
            </tr>
       
       ";
        }
        return $this->str;
    }















}