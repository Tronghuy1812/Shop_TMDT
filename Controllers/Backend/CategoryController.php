<?php

    require("./Models/CategoryModel.php");
    $id = "";
    $id =$_REQUEST['id'] ?? null ;
    $action =$_REQUEST['action'] ?? null ;
    $nhomsanpham = new clsCategory();
    switch($action)
    {
        case "create":
            require("./Views/backend/categories/create.php");
            break;
        case "update":
            //lấy mã nhóm sp cần sửa
            $ketqua = $nhomsanpham->TimTheoIDNhomSanpham($id);
            require("./Views/backend/categories/update.php");
            break;
        case "addCategory":
            require("./Controllers/Backend/addCategory.php");
            break;
        case "updateCategory":
            require("./Controllers/Backend/updateCategory.php");
            break;
        case "delete":
            require("./Controllers/Backend/deleteCategory.php");
            break;
        default:
            //tạo đối tượng nhomsp và lấy các nhóm sp từ csdl
            // $obj = new clsNhomSP();
            // $ketqua = $obj->Truyvan_Toanbo_Banghi();
            $ketqua = $nhomsanpham->LayDanhSachNhomSanpham();
            require("./Views/backend/categories/index.php");
            break;
    }
?>