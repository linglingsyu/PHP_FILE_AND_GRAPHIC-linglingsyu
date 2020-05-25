<?php
/****
 * 1.建立資料庫及資料表
 * 2.建立上傳檔案機制
 * 3.取得檔案資源
 * 4.取得檔案內容
 * 5.建立SQL語法
 * 6.寫入資料庫
 * 7.結束檔案
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>文字檔案匯入</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1 class="header">文字檔案匯入練習</h1>
<!---建立檔案上傳機制--->

<form action="parse_file.php" method="post" enctype="multipart/form-data" style="margin:0 auto; width:500px">
    <input type="file" name="doc">
    <input type="submit" value="匯入">

</form>

<!----讀出匯入完成的資料----->
<?php
include_once ("base.php");
$todo = all("todolist","","",PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC常數不需要用""變成字串
?>

<table>
<tr>
    <td>id</td>
    <td>subject</td>
    <td>description</td>
    <td>create_date</td>
    <td>due_date</td>
</tr>
<?php

foreach($todo as $t){
?>

<tr>
    <td><?= $t['id']?></td>
    <td><?= $t['subject']?></td>
    <td><?= $t['description']?></td>
    <td><?= $t['create_date']?></td>
    <td><?= $t['due_date']?></td>
</tr>
<?php } ?>
</table>

<?php
    $newfile = fopen('todolist.txt',"w+");
    foreach($todo as $t){
        fwrite($newfile,implode(',',$t)."\n");
    }
    fclose($newfile);
?>

<a href="todolist.txt" download>匯出資料表</a>

</body>
</html>