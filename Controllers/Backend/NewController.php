<?php
    require_once("./Models/NewModel.php");
    $id = "";
    $id =$_REQUEST['id'] ?? null ;
    $action =$_REQUEST['action'] ?? null ;
    $tintuc = new clsTintuc();
    switch($action)
    {
        case "create":
            require_once("./Views/backend/news/create.php");
            break;
        case "update":
            $ketqua = $tintuc->TimTheoIDTintuc($id);
            require_once("./Views/backend/news/update.php");
            break;

        case "addNew":
            require_once("./Controllers/Backend/addNew.php");
            break;
        case "updateNew":
            require_once("./Controllers/Backend/updateNew.php");
            break;
        case "delete":
            require_once("./Controllers/Backend/deleteNew.php");
            break;
        default:
            $ketqua = $tintuc->LayDanhSachTintuc();
            require_once("./Views/backend/news/index.php");
            break;
    }
?>