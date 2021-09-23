<?php
require_once("Database.php");
class clsSanpham
{
	public $db;
	public $data;//mảng chứa dữ liệu trả về bởi hàm truy vấn dữ liệu
	function clsSanpham()
	{
		$this->db = new Database();//tạo đối tượng clsDatabase và kết nối CSDSL
		$this->data = array();
	}
	//các hàm truy vấn, thêm, sửa, xóa
	//Hàm LayDanhSachSanpham() truy vấn dữ liệu lưu vào thuộc tính data của lớp
	function LayDanhSachSanpham()
	{
		$sql = "SELECT * FROM products";
		$ketqua = $this->db->ThucthiSQL($sql);
		//LẤY CÁC BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetchAll();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}
	//Hàm thêm dữ liệu
	function ThemSanpham($name,$description,$price,$image,$status,$id_cat)
	{
		$sql = "INSERT INTO products (name, description, price, image, status, id_cat) VALUES(?, ?, ?, ?, ?,?)";
		$data[] = $name;
		$data[] = $description;
		$data[] = $price;
		$data[] = $image;
		$data[] = $status;
		$data[] = $id_cat;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}
	//Hàm sửa dữ liệu
	function SuaSanpham($id,$name,$description,$price,$image,$status,$id_cat)
	{
		$sql = "UPDATE products SET name = ?, description = ?, price = ?, image = ?, status = ?, id_cat = ? WHERE id = ?";
		$data[] = $name;
		$data[] = $description;
		$data[] = $price;
		$data[] = $image;
		$data[] = $status;
		$data[] = $id_cat;
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}
	//Hàm xóa dữ liệu
	function XoaSanpham($id)
	{
		$sql = "DELETE FROM products WHERE id=?";
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}
	//Hàm TimTheoIDSanpham($id) truy vấn dữ liệu theo id lưu vào thuộc tính data
	function TimTheoIDSanpham($id)
	{
		$sql = "SELECT * FROM products WHERE id=?";
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		//LẤY BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetch();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}
	//Hàm TimTheoNhomSanpham($cat_id) truy vấn dữ liệu theo cat_id
	function TimTheoNhomSanpham($id_cat)
	{
		$sql = "SELECT * FROM products WHERE id_cat=?";
		$data[] = $id_cat;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		//LẤY BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetch();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}
	//Hàm sửa dữ liệu cột status
	function SuaTrangThaiSanpham($id, $status)
	{
		$sql = "UPDATE products SET status = ? WHERE id=?";
		$data[] = $status;
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}
}
?>