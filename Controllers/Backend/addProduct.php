<?php
	require_once("././Helper/Tienich.php");
	$id_cat = $_REQUEST["id_cat"] ?? '';
	$name = $_REQUEST["name"] ?? '';
	$description = $_REQUEST["description"] ?? '';
	$price = $_REQUEST["price"] ?? '';
	$image = UploadFile("image", "public/images/sanpham");
	$status = 1;
    if(isset($_REQUEST["status"]))
        $status = $_REQUEST["status"];
    // print_r($_REQUEST);
	$ketqua = $sanpham->ThemSanpham($name,$description,$price,$image,$status,$id_cat);
	if($ketqua==FALSE)
		echo "Lỗi thêm dữ liệu";
	else
        header('location:index_admin.php?module=backend&controller=product');
?>