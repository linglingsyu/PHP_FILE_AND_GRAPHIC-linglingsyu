<?php 

include_once "base.php";

if($_FILES['pic']['error']==0){
    
    switch($_FILES['pic']['type']){
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
    move_uploaded_file($_FILES['pic']['tmp_name'],"img/".$name);

    $data = [
        'filename'=>$name,
        'type'=>$_FILES['pic']['type'],
        'text'=>$_POST['text'],
        'album'=>$_POST['album'],
        'path'=>'img/'.$name
    ];

    save('file_info',$data);

    //縮圖路徑
    $thumb_path = "thumb/".$name;
    //原始檔路徑
    $source_path = "img/".$name;
    //取得原始檔的圖片訊息(長寬高等) getimagesize:回傳陣列
    $img_info = getimagesize($source_path);
    // print_r($img_info);

    $rate = 0.2;
    $border = 5; //白邊的寬度

    //要讓縮圖為正方形呈現
    //計算縮圖大小:將原始檔的寬高*縮放倍率得到新的寬高
    if($img_info[0] > $img_info[1] ){     
    //寬>高
        $src_y =0;
        $src_x = ($img_info[0]-$img_info[1])/2;
        $img_w = $img_info[1]*$rate;
        $img_h = $img_info[1]*$rate;
        $src_w = $img_info[1];
        $src_h = $img_info[1];

    }elseif($img_info[0] < $img_info[1]){
    //高<寬
        $src_y = ($img_info[1]-$img_info[0])/2;
        $src_x = 0;
        $img_w = $img_info[0]*$rate;
        $img_h = $img_info[0]*$rate;
        $src_w = $img_info[0];
        $src_h = $img_info[0];
    }else{
    //高=寬
        $src_x = $img_info[1];
        $src_y = $img_info[1];
        $img_w = $img_info[1]*$rate;
        $img_h = $img_info[1]*$rate;
        $src_w = $img_info[1];
        $src_h = $img_info[1];
    }

    //創造一張新圖片(決定縮圖大小)
    $thumb_img = imagecreatetruecolor($img_w,$img_h);
    //為一幅圖像分配顏色(這邊目的在於決定邊框的顏色)
    $color = imagecolorallocate($thumb_img,255,170,213);
    imagefill($thumb_img,0,0,$color);
    //根據不同檔案格式建立不同圖像
    switch($img_info["mime"]){
        case "image/jpeg";
        $source_img = imagecreatefromjpeg($source_path);
    break;
        case "image/png";
        $source_img = imagecreatefrompng($source_path);
    break;
        case "image/gif";
        $source_img = imagecreatefromgif($source_path);
    break;
    }

    /**
     * imagecopyresampled:回傳縮圖成功或失敗
     * 重取樣copy部分圖像並調整大小(高品質縮圖)
     * dst_image : 輸出目標檔案
     * src_image : 來源檔案
     * dst_x: 目標檔案開始點的 x 座標
     * dst_y: 目標檔案開始點的 y 座標
     * src_x: 來源檔案開始點的 x 座標
     * src_y: 來源檔案開始點的 y 座標
     * dst_w: 目標檔案的長度
     * dst_h: 目標檔案的高度
     * src_w: 來源檔案的長度
     * src_h: 來源檔案的高度
     */

    imagecopyresampled($thumb_img,$source_img,$border,$border,$src_x,$src_y,$img_w-($border*2),$img_h-($border*2),$src_w,$src_h);

    /**
     * PHP 輸出圖像
     * PHP 允許將圖像以不同格式輸出：
     * imagegif()：以GIF 格式將圖像輸出到瀏覽器或文件
     * imagejpeg()：以JPEG 格式將圖像輸出到瀏覽器或文件
     * imagepng()：以PNG 格式將圖像輸出到瀏覽器或文件
     * imagewbmp()：以WBMP 格式將圖像輸出到瀏覽器或文件
     */
    switch($img_info["mime"]){
        case "image/jpeg";
        imagejpeg($thumb_img,$thumb_path);
    break;
        case "image/png";
        imagepng($thumb_img,$thumb_path);
    break;
        case "image/gif";
        imagegif($thumb_img,$thumb_path);
    break;
    }
    header("location:image.php");
}

?>
