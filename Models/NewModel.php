<?php
require_once("Database.php");
class clsTintuc
{
	public $db;
	public $data;//mảng chứa dữ liệu trả về bởi hàm truy vấn dữ liệu
	function clsTintuc()
	{
		$this->db = new Database();//tạo đối tượng clsDatabase và kết nối CSDSL
		$this->data = array();
	}
	//các hàm truy vấn, thêm, sửa, xóa
	function LayDanhSachTintuc()
	{
		$sql = "SELECT * FROM news";
		$ketqua = $this->db->ThucthiSQL($sql);
		//LẤY CÁC BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetchAll();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}
	//Hàm thêm dữ liệu
	function ThemTintuc($title,$summary,$content,$image,$status)
	{
		$sql = "INSERT INTO news (title,summary,content,image,status) VALUES (?, ?, ?, ?, ?)";
		$data[] = $title;
		$data[] = $summary;
		$data[] = $content;
		$data[] = $image;
		$data[] = $status;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}
	//Hàm sửa dữ liệu
	function SuaTintuc($id,$title,$summary,$content,$image,$status)
	{
		$sql = "UPDATE news SET title=?, summary = ?, content = ?, image = ?, status = ? WHERE id=?";
		$data[] = $title;
		$data[] = $summary;
		$data[] = $content;
		$data[] = $image;
		$data[] = $status;
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}
	//Hàm xóa dữ liệu
	function XoaTintuc($id)
	{
		$sql = "DELETE FROM news WHERE id=?";
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}
	//Hàm TimTheoIDTintuc($id) truy vấn dữ liệu theo id lưu vào thuộc tính data
	function TimTheoIDTintuc($id)
	{
		$sql = "SELECT * FROM news WHERE id=?";
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		//LẤY BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetch();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}
}
?>