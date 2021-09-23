<?php
require_once("Database.php");
class clsHoadon
{
	public $db;
	public $data;//mảng chứa dữ liệu trả về bởi hàm truy vấn dữ liệu
	function clsHoadon()
	{
		$this->db = new Database();
		$this->data = array();
	}
	//các hàm truy vấn, thêm, sửa, xóa
	//Hàm LayDanhSachHoadon() truy vấn dữ liệu lưu vào thuộc tính data
	function LayDanhSachHoadon()
	{
		$sql = "SELECT * FROM bills ORDER BY id_bill DESC";
		$ketqua = $this->db->ThucthiSQL($sql);
		//LẤY CÁC BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetchAll();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}
	//Hàm tính và trả về tổng tiền của 1 hóa đơn, đầu vào mã hóa đơn
	public function TongTien($id_bill)
	{
		$sql = "SELECT SUM(quantity*purchase_price) AS tongtien
					FROM `bill_detail` WHERE id_bill=?";
		$data[] = $id_bill;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		//LẤY BẢN GHI KẾT QUẢ LƯU VÀO $data
		if($ketqua==TRUE)
		{
			$this->data = $this->db->pdo_stm->fetch();//lấy dòng kết quả
			return $this->data["tongtien"];//trả về cột tongtien
		}
		else
			return -1;
	}
	//Hàm TimHoaDon(id_bill) đầu vào là mã hóa đơn,
	//trả về bản ghi chứa thông tin của hóa đơn từ bảng tbHoadon
	function TimHoadon($id_bill)
	{
		$sql = "SELECT * FROM bills WHERE id_bill=?";
		$data[] = $id_bill;
		$ketqua = $this->db->ThucthiSQL($sql,$data);
		//LẤY CÁC BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetch();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}
	//Hàm ChitietHoadon(mahd): đầu vào là mã hóa đơn, trả về danh sách các sản phẩm
	//của hóa đơn,số lượng, giá mua.. lấy từ bảng tbChitietHoadon kết nối với bảng tbSanpham
	function ChiTietHoadon($id_bill)
	{
		$sql = "SELECT CTHD.*, SP.name,SP.price
				 FROM bill_detail CTHD INNER JOIN products SP
				 ON CTHD.id_product = SP.id WHERE id_bill = ?";
		$data[] = $id_bill;
		$ketqua = $this->db->ThucthiSQL($sql,$data);
		//LẤY CÁC BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetchAll();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}
	//Hàm cập nhật bảng tbHoadon, thay đổi cột trại thái
	function DoiTrangThaiHoadon($id_bill, $new_status)
	{
		$sql = "UPDATE bills SET status = ? WHERE id_bill=?";
		$data[] = $new_status;
		$data[] = $id_bill;
		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}
	//Hàm xóa chi tiết hóa đơn
	function XoaChiTietHD($id_bill)
	{
		$sql = "DELETE FROM bill_detail WHERE id_bill=?";
		$data[] = $id_bill;
		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}
	//Hàm xóa  hóa đơn
	function XoaHoaDon($id_bill)
	{
		$sql = "DELETE FROM bills WHERE id_bill=?";
		$data[] = $id_bill;
		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}
	function TimChitietHoadon($id_product)
	{
		$sql = "SELECT * FROM bill_detail WHERE id_product=?";
		$data[] = $id_product;
		$ketqua = $this->db->ThucthiSQL($sql,$data);
		//LẤY CÁC BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetch();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}
}
?>