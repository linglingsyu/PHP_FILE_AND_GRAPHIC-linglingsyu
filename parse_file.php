<style>
    .txt{
        margin: 10px;
        font-size:<?= $fontsize?>;
    }

</style>

<?php

include_once "base.php";

//確認是否上傳成功(不管處理什麼都要先做)
//(檔案要搬移的目錄要先建立資料夾)
if(!empty($_FILES['doc']['tmp_name'])){
    // echo "上傳的暫存檔名及路徑:".$_FILES['doc']['tmp_name']."<br>";
    // echo "上傳的類型:".$_FILES['doc']['type']."<br>";
    // echo "上傳的原始名稱:".$_FILES['doc']['name']."<br>";
    // move_uploaded_file($_FILES['doc']['tmp_name'],"doc/".$_FILES['doc']['name']);
    // echo "檔案搬移位置在"."doc/".$_FILES['doc']['name'];

    //上傳後如何處理檔案(文字檔為例)
    //檔案類型是text/plain的才做處理
    if($_FILES['doc']['type'] == "text/plain"){
        //開檔案然後一行行寫出來
        $path = 'doc/'.$_FILES['doc']['name'];
        //(搬到doc/下使用原本檔名)
        move_uploaded_file($_FILES['doc']['tmp_name'],$path);
        $file = fopen($path,"r+");
        //當檔案開啟尚未結束前,一行一行讀取開啟的檔案
        $txt = fgets($file); //先執行第一行,然後不處理他(略過處理標題)
        $num = 1 ;
        while(!feof($file)){
            $txt = fgets($file); // 再從第二行開始執行,開始處理
            //轉成陣列後將內容存到資料庫內
            $tmp = explode(",",$txt);
            if(count($tmp) == 4){     //略過未登打完成的檔案
                $content['subject'] = "$tmp[0]";
                $content['description'] = "$tmp[1]";
                $content['create_date'] = "$tmp[2]";
                $content['due_date'] = "$tmp[3]";
                save("todolist",$content);
                echo "已儲存".$num."筆資料";
                $num++;
            }
        }
        to("text-import.php");
    }else{
        echo "檔案類型錯誤";
    }


}else{
    echo "上傳錯誤".$_FILES['doc']['error'];
}




?>