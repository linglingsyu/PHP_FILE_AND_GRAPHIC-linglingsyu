<style>

    *{
        box-sizing: border-box;
        padding: 0;
        margin: 0;
    }

    img{
        width: 100%;
    }

    img:hover{
        opacity: 0.9;
    }

    .frame{
        display: inline-flex;
        border: 2px solid blue;
        margin: 10px;
        padding: 10px;
        box-shadow: 1px 1px 10px lightblue;
        /* vertical-align: center; */

    }


</style>


<a href="?album=1">美食</a>
<a href="?album=2">旅遊</a>
<a href="?album=3">寵物</a>

<hr>
<?php

include_once "base.php";

if(!empty($_GET['album'])){
    $album = ['album'=>$_GET['album']];
}else{
    $album=[];
}


$image = all("file_info",$album);

foreach($image as $img){
    echo '<div class="frame"><a href="img/'.$img['filename'].'" target="_blank"><img src="thumb/'.$img['filename'].'"></a></div>';
}




?>