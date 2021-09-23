<?php
require_once("./Models/BillModel.php");
if($id!="" && is_numeric($id))
{
	//bổ sung kiểm tra id sản phẩm có trong bảng tbChitietSanpham (cột id_product) hay chưa?
	//nếu chưa có thì xóa sản phẩm, nếu đã có thì không được xóa mà update cột status =0
	$hd = new clsHoadon();
	$hd->TimChitietHoadon($id);
	if($hd->data==NULL) //nếu chưa có sản phẩm nào trong hóa đơn liên quan thì xóa
	{
		$ketqua = $sanpham->XoaSanpham($id);
		if($ketqua==FALSE)
			echo "Lỗi xóa dữ liệu";
	}
	else
	{
		$ketqua = $sanpham->SuaTrangThaiSanpham($id,0);
		if($ketqua==FALSE)
			echo "Lỗi xóa dữ liệu";
	}
}
else
	echo "Xóa dữ liệu lỗi id sản phẩm";
header('location:?module=backend&controller=product');
?>