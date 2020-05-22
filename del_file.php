<?php

include_once "base.php";
$id = $_GET['id'];
$file=find("file_info",$id);
//將硬碟的檔案也要刪除,因為unlink內要放檔案路徑,所以要在資料表資料刪除之前先刪硬碟內的資料
unlink($file['path']);
//將資料表的資料刪除
del("file_info",$id);
to("manage.php");

?>