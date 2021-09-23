<?php
    require_once("././Helper/Tienich.php");
    $title = $_REQUEST["title"] ?? '';
    $summary = $_REQUEST["summary"] ?? '';
    $content = $_REQUEST["content"] ?? '';
    $image = UploadFile("image", "public/images/tintuc");
    $status =1;
    if(isset($_REQUEST["status"]))
        $status = $_REQUEST["status"];

    // print_r($_REQUEST);
    // echo $image;
    $ketqua = $tintuc->SuaTintuc($id, $title, $summary, $content, $image, $status);

    if($ketqua==FALSE)
    {
        echo '<h2>Lỗi Câu Truy vấn</h2>';
    }
    else
    {
        header('location:?module=backend&controller=new');
    }

?>