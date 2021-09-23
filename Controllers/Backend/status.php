<?php
    $ttht = $_REQUEST["ttht"];
    $new_status = $_REQUEST["ttmoi"];

    // print_r($_REQUEST);
    $chophep = "";
    if($ttht==0||
        ($ttht==1&&($ttmoi==2||$ttmoi==3)) ||
        ($ttht==3&&($ttmoi==1||$ttmoi==2)))
        {
            $chophep="OK";
        }
    $thongbao=""; //để truyền cho view kết quả
    // $link_tieptuc = "ctlHoadon.php";
    if($chophep=="OK")
    {
        $ketqua = $hoadon->DoiTrangThaiHoadon($id_bill,$new_status);
        if($ketqua==TRUE)
            echo "CẬP NHẬT TRẠNG THÁI THÀNH CÔNG!";
            // $thongbao = "CẬP NHẬT TRẠNG THÁI THÀNH CÔNG!";
        else
            echo "CẬP NHẬT TRẠNG THÁI LỖI!";
            // $thongbao = "CẬP NHẬT TRẠNG THÁI LỖI!";
    }
    else
    {
        echo "Trạng thái cần chuyển không hợp lệ!";
        // $thongbao = "Trạng thái cần chuyển không hợp lệ!";
    }
    header('location:index_admin.php?module=backend&controller=bill');
?>