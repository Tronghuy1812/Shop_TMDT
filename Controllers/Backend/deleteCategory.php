<?php
require_once('./Models/ProductModel.php');
if($id!="" && is_numeric($id)){
	$sp = new clsSanpham();
	$sp->TimTheoNhomSanpham($id);//tìm các sản phẩm của nhóm có id này
	if($sp->data==NULL){ //nếu chưa có sản phẩm nào liên quan thì xóa
		$ketqua = $nhomsanpham->XoaNhomSanpham($id);
		if($ketqua==FALSE)
			echo "Lỗi xóa dữ liệu";
	}
	else{//có sản phẩm thuộc nhóm thì sửa trang thái về 0
		$ketqua = $nhomsanpham->SuaTrangThaiNhomSanpham($id,0);
		if($ketqua==FALSE)
			echo "Lỗi đổi trạng thái nhóm sản phẩm";
		// else
		// 	echo "Nhóm SP đã có sản phẩm liên quan
		// 	<br>Đã cập nhật sang trạng thái không hiển thị ";
	}
}
else
	echo "Xóa dữ liệu lỗi id sản phẩm";
header('location:?module=backend&controller=category');
?>