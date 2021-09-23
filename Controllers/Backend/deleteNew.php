<?php
//gọi hàm xóa sách
//is_numeric(): xác định xác định một giá trị có phải là số hay không
if($id!="" && is_numeric($id))
{
	$ketqua = $tintuc->XoaTintuc($id);
	if($ketqua==FALSE)
		$thongbao="Lỗi xóa dữ liệu";
	else
		$thongbao ="Xóa dữ liệu thành công";
}
else
	$thongbao ="Xóa dữ liệu lỗi id sản phẩm";

header('location:?module=backend&controller=new');
?>