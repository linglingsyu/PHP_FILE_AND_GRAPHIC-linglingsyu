<?php
/**
 * 1.建立資料庫及資料表來儲存檔案資訊
 * 2.建立上傳表單頁面
 * 3.取得檔案資訊並寫入資料表
 * 4.製作檔案管理功能頁面
 */

 include_once "base.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>檔案管理功能</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1 class="header">檔案管理練習</h1>
<!----建立上傳檔案表單及相關的檔案資訊存入資料表機制----->

<form action="save_file.php" method="post" enctype="multipart/form-data">
    <input type="file" name="upload" id="image">
    說明：<input type="text" name="text" id="">
    相簿：<input type="text" name="album" id="">
    <input type="submit" value="上傳">
</form>
<a href="album.php" target="_blank">相簿</a>



<!----透過資料表來顯示檔案的資訊，並可對檔案執行更新或刪除的工作----->

<table>
    <tr>
        <td>預覽</td>
        <td>檔名</td>
        <td>路徑</td>
        <td>類別</td>
        <td>說明</td>
        <td>相簿</td>
        <td>上傳時間</td>
        <td>操作</td>
    </tr>


<?php
    $all = all('file_info');
    foreach($all as $row){
?>

    <tr>
        <td><img src="<?= $row['path'] ?>" style="width:200px;"></td>
        <td><?= $row['filename'] ?></td>
        <td><?= $row['path'] ?></td>
        <td><?= $row['type'] ?></td>
        <td><?= $row['text'] ?></td>
        <td><?= $row['album'] ?></td>
        <td><?= $row['upload_time'] ?></td>
        <td>
            <a class="btn" href="confirm.php?id=<?= $row['id']; ?>">刪除</a>
            <a class="btn" href="update_file.php?id=<?= $row['id']; ?>">更新</a>
        </td>
    </tr>
<?php
    }
?>
</table>
</body>
</html>


