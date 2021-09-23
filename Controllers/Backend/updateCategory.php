<?php
    require_once("././Helper/Tienich.php");
    $name = $_REQUEST["name"] ?? '';
    $description = $_REQUEST["description"] ?? '';
    $image = UploadFile("image", "public/images/danhmuc");
    $ord = $_REQUEST["ord"] ?? '';
    $status =1;
    if(isset($_REQUEST["status"]))
        $status = $_REQUEST["status"];

    // print_r($_REQUEST);
    // echo $image;
    $ketqua = $nhomsanpham->SuaNhomSanpham($id,$name,$description,$image,$status,$ord);

    if($ketqua==FALSE)
    {
        echo '<h2>Lỗi Câu Truy vấn </h2>';
    }
    else
    {
       header('location:?module=backend&controller=category');
    }

?>