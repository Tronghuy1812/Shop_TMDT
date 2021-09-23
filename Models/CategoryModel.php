<?php
require_once("Database.php");
class clsCategory
{
	public $db;
	public $data;//mảng chứa dữ liệu trả về bởi hàm truy vấn dữ liệu
	function clsCategory()
	{
		$this->db = new Database();//tạo đối tượng clsDatabase và kết nối CSDSL
		$this->data = array();
	}
	//các hàm truy vấn, thêm, sửa, xóa
	//$trangthai: 2 - tất cả; 1 hoặc 0 thì lọc các bản ghi có status = 1|0
	//$order = 0 : không sắp xếp; 1 : tăng dần; -1 : giảm dần
	//tham số mặc định $trangthai =2, $order =0
	function LayDanhSachNhomSanpham()
	{
		$sql = "SELECT * FROM type_products";
		//nếu khác 2 thì thêm mệnh đề WHERE để lọc,
		//còn nếu =2 thì không có có WHERE => sẽ hiển thị mọi sản phẩm

		$ketqua = $this->db->ThucthiSQL($sql);
		//LẤY CÁC BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetchAll();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}

	//Hàm thêm dữ liệu
	function ThemNhomSanpham($name,$description,$image,$status,$ord)
	{
		// $sql = "INSERT INTO type_products VALUES (NULL, ?, ?, ?, ?)"; // id ko đc null (sai)
		$sql = "INSERT INTO type_products (name,description,image,status,ord) VALUES (?, ?, ?, ?, ?)";
		$data[] = $name;
		$data[] = $description;
		$data[] = $image;
		$data[] = $status;
		$data[] = $ord;
		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}
	//Hàm sửa dữ liệu
	function SuaNhomSanpham($id,$name,$descrition,$image,$status,$ord)
	{
		$sql = "UPDATE type_products SET name = ?, description = ?, image = ?,status = ?, ord = ? WHERE id = ?";

		$data[] = $name;
		$data[] = $descrition;
		$data[] = $image;
		$data[] = $status;
		$data[] = $ord;
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}
	//Hàm xóa dữ liệu
	function XoaNhomSanpham($id)
	{
		$sql = "DELETE FROM type_products WHERE id=?";
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}

	function TimTheoIDNhomSanpham($id)
	{
		$sql = "SELECT * FROM type_products WHERE id=?";
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		//LẤY BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetch();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}
	//Hàm sửa dữ liệu cột cat_status
	function SuaTrangThaiNhomSanpham($id, $status)
	{
		$sql = "UPDATE type_products SET status = ? WHERE id=?";
		$data[] = $status;
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}
}
?>