<?php

    require_once("./Models/ProductModel.php");
    $id = "";
    $id =$_REQUEST['id'] ?? null ;
    $action =$_REQUEST['action'] ?? null ;
    $sanpham = new clsSanpham();
    switch($action)
    {
        case "create":
            require_once("./Views/backend/products/create.php");
            break;
        // case "update":
        //     //lấy mã nhóm sp cần sửa
        //     $manhom = $_REQUEST["manhom"];
        //     //tạo đối tượng nhomsp và lấy từ csdl
        //     // $obj = new clsNhomSP();
        //     $ketqua = $obj->Truyvan_1_Banghi("manhom",$manhom);
        //     require_once("Views/v_nhomsp_sua.php");
        //     break;

        case "update":
            $ketqua = $sanpham->TimTheoIDSanpham($id);
            require_once("./Views/backend/products/update.php");
            break;

        case "addProduct":
            require_once("./Controllers/Backend/addProduct.php");
            break;
        case "updateProduct":
            require_once("./Controllers/Backend/updateProduct.php");
            break;
        case "delete":
            require_once("./Controllers/Backend/deleteProduct.php");
            break;
        default:
            $ketqua = $sanpham->LayDanhSachSanpham();
            require_once("./Views/backend/products/index.php");
            break;
    }
?>