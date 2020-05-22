<?php 

include_once "base.php";

//判斷檔案上傳是否成功
//或是用 if(!empty($_FILES['upload']['tmp_name']))
if($_FILES['upload']['error']==0){

//自訂上傳後的檔名 用上傳時間.副檔名
// $_FILES['upload']['type']有很多種類型
// 可以從這邊看https://developer.mozilla.org/zh-TW/docs/Web/HTTP/Basics_of_HTTP/MIME_types

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
    $name =  date("Yndhis").$sub;
    move_uploaded_file($_FILES['upload']['tmp_name'],"img/".$name);

    $data = [
        'filename'=>$name,
        'type'=>$_FILES['upload']['type'],
        'text'=>$_POST['text'],
        'album'=>$_POST['album'],
        'path'=>'img/'.$name
    ];

    save('file_info',$data);

    header("location:manage.php");
}

?>

