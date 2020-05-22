<?php
/**
 * 1.建立表單
 * 2.建立處理檔案程式
 * 3.搬移檔案
 * 4.顯示檔案列表
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>檔案上傳</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
 <h1 class="header">檔案上傳練習</h1>
 <!----建立你的表單及設定編碼
 圖形是用二進位編碼,與文字不同,所以要設定enctype="multipart/form-data"才能上傳
 ----->

<form action="catch_file.php" method="post" enctype="multipart/form-data">

<input type="file" name="upload" id="image">
<input type="text" name="text" id="">
<input type="submit" value="上傳">


</form>



<!----建立一個連結來查看上傳後的圖檔---->  

<!-- 有filename這個值才顯示貼圖 -->
<?php
if(!empty($_GET['filename'])){
    $name = $_GET['filename'];
?>

<img src="img/<?= $name ?>" alt="">

<?php 
}
?>

</body>
</html>