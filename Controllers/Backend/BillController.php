<?php
    require_once("./Models/BillModel.php");
    $id_bill = "";
    $id_bill =$_REQUEST['id_bill'] ?? null ;
    $action =$_REQUEST['action'] ?? null ;
    $hoadon = new clsHoadon();
    //gọi các view và các Controllers cấp dưới dựa trên biến action
    switch($action)
    {
        case 'delete':
            require_once('./Controllers/Backend/deleteBill.php');
            break;

        case 'status':
            require_once('./Controllers/Backend/status.php');
            break;

        case 'detail':
            $ketqua = $hoadon->TimHoadon($id_bill);
            if($ketqua==TRUE)
            {
                $rowHD = $hoadon->data;//lấy dòng hóa đơn (dạng mảng) từ data lưu vào $rowHD
                if($rowHD)
                {
                    $ketqua = $hoadon->ChiTietHoadon($id_bill);
                    require("./Views/backend/Bills/detail_bill.php");
                }
                else
                {
                    echo "HÓA ĐƠN KHÔNG TỒN TẠI";
                }
            }
            else
            {
                echo "LỖI TRUY VẤN HÓA ĐƠN";
            }
            break;
        default:
            $ketqua = $hoadon->LayDanhSachHoadon();
            require_once("./Views/backend/Bills/index.php");
            break;
    }
?>