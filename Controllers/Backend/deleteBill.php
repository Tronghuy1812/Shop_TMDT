<?php

// echo "$id_bill";
//Kiểm tra nếu hóa đơn đang ở trạng thái đã thanh toán (2) thì không xóa
$ketqua = $hoadon->TimHoadon($id_bill);
$rowHD = $hoadon->data;
if($rowHD==NULL)//if($hoadon->db->pdo_stm->rowCount()==0)
	echo "HÓA ĐƠN: " . $id_bill . " KHÔNG TỒN TẠI";
else{
	if($rowHD["status"]==2)
		echo "HÓA ĐƠN ĐÃ THANH TOÁN - KHÔNG ĐƯỢC XÓA";
	else{
		$ketqua = $hoadon->XoaChiTietHD($id_bill);
		if($ketqua==FALSE)
			echo "LỖI XÓA CHI TIẾT HÓA ĐƠN: " . $id_bill ;
		else{
			$ketqua = $hoadon->XoaHoaDon($id_bill);
			if($ketqua==TRUE)
				echo "XÓA HÓA ĐƠN " . $id_bill . " THÀNH CÔNG";
			else
				echo "LỖI XÓA HÓA ĐƠN: " . $id_bill ;
		}
	}
}
    header('location:index_admin.php?module=backend&controller=bill');
?>