<?php
/****
 * 1.建立資料庫及資料表
 * 2.建立上傳圖案機制
 * 3.取得圖檔資源
 * 4.進行圖形處理
 *   ->圖形縮放
 *   ->圖形加邊框
 *   ->圖形驗證碼
 * 5.輸出檔案
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
<h1 class="header">圖形處理練習</h1>
<!---建立檔案上傳機制--->
<form action="graphic.php" method="post" enctype="multipart/form-data">
    <input type="file" name="pic"><br>
    說明<input type="text" name="text"><br>
    相簿<input type="text" name="album"><br>
    <input type="submit" value="上傳">
</form>

<a href="album.php">查看相簿</a>

<!----縮放圖形----->


<!----圖形加邊框----->


<!----產生圖形驗證碼----->



</body>
</html>