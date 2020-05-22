<?php

include_once "base.php";

//更新檔案 -> 利用先刪除檔案再重新上傳新檔案的方式 


if(!empty($_GET['id'])){
    $row = find("file_info",$_GET['id']);
}


//處理有檔案要更新上傳時
if(!empty($_POST['submit'])){
    $id = $_POST['id'];
    $source = find("file_info",$id);

    if(!empty($_FILES['upload']['tmp_name'])){

        switch($_FILES['upload']['type']){
            case "image/jpeg";
                $sub=".jpg";
        break;
            case "image/png";
                $sub=".png";
        break;
            case "image/gif";
                $sub=".gif";
        break;
        }

        unlink($source['path']);
        $name ="ling".date("YmdHis").$sub;
        $source["filename"] = $name;
        $source['type'] = $_FILES['upload']['type'];
        $source['path'] = "img/".$name;

        move_uploaded_file($_FILES['upload']['tmp_name'],"img/$name");

    }

//文字的部分都會處理到(因為一定會送出值)
    $text = $_POST['text'];
    $source['text'] = $text;
    save("file_info",$source);
    to("manage.php");


}

?>

<img src="<?=$row['path']; ?>" style="width:200px">

<form action="update_file.php" method="post" enctype="multipart/form-data">
    <input type="file" name="upload" >
    <input type="text" name="text" value="<?= $row['text']?>">
    <input type="hidden" name="id" value="<?=$row['id'];?>">
    <input type="submit" name="submit" value="更新">
</form>
