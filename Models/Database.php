<?php
class Database
{
	public $conn = NULL; //lưu đối tượng PDO kết nối CSDL
	public $pdo_stm = NULL;//lưu đối tượng PDOStatement
	function Database()
	{
		try//kết nối CSDL và lưu vào thuộc tính conn
		{
			$this->conn = new PDO("mysql:host=localhost;dbname=web_banhang","root","root");
			$this->conn->exec("SET NAMES UTF8");//Thiết lập làm việc với unicode
		}
		catch(PDOException $ex)
		{
			echo "<h3>" . $ex->getMessage() . "</h3>";
			die("<h3> LỖI KẾT NỐI CSDL </h3>");
		}
	}
	//Xây dựng hàm Thực thi SQL Dùng chung cho mọi lệnh SELECT, INSERT, UPDATE, DELETE
	//tham số $sql: câu lệnh sql cần thực thi
	//tham số $data: mảng chứa các dữ liệu tương ứng với tham số ? trong lệnh sql
	//trả TRUE: thành công, FALSE: lỗi
	public function ThucthiSQL($sql, $data=NULL)
	{
		$this->pdo_stm = $this->conn->prepare($sql);
		$ketqua=false;
		if($data!=NULL)
			$ketqua = $this->pdo_stm->execute($data);
		else
			$ketqua = $this->pdo_stm->execute();
		return $ketqua;
	}
		//lệnh Lay_1_Ban_Ghi_Dang_Mang, phải dùng sau lệnh
	//Thucthi_SQL(), dùng trả về 1 bản ghi dữ liệu
	//từ lệnh SELECT ở dạng mảng có tên cột hoặc vị trí
	public function Lay_1_Ban_Ghi_Dang_Mang()
	{
		if($this->pdo_smt && $this->pdo_smt->errorCode()=="00000")
			return $this->pdo_smt->fetch(PDO::FETCH_BOTH);
		else
			return NULL;
	}
	//lệnh Lay_Toanbo_Ban_Ghi_Dang_Mang, phải dùng sau lệnh
	//Thucthi_SQL(), dùng trả về các bản ghi dữ liệu
	//từ lệnh SELECT ở dạng mảng 2 chiều, mỗi dòng là 1 sản phẩm
	public function Lay_Toanbo_Ban_Ghi_Dang_Mang()
	{
		if($this->pdo_smt && $this->pdo_smt->errorCode()=="00000")
			return $this->pdo_smt->fetchAll(PDO::FETCH_BOTH);
		else
			return NULL;
	}
	//lệnh Lay_1_Ban_Ghi_Dang_Doituong, phải dùng sau lệnh
	//Thucthi_SQL(), dùng trả về 1 bản ghi dữ liệu
	//từ lệnh SELECT ở dạng đối tượng
	public function Lay_1_Ban_Ghi_Dang_Doituong()
	{
		if($this->pdo_smt && $this->pdo_smt->errorCode()=="00000")
			return $this->pdo_smt->fetch(PDO::FETCH_OBJ);
		else
			return NULL;
	}
	//lệnh Lay_Toanbo_Ban_Ghi_Dang_Doituong, phải dùng sau lệnh
	//Thucthi_SQL(), dùng trả về các bản ghi dữ liệu
	//từ lệnh SELECT ở dạng mảng các đối tượng
	public function Lay_Toanbo_Ban_Ghi_Dang_Doituong()
	{
		if($this->pdo_smt && $this->pdo_smt->errorCode()=="00000")
			return $this->pdo_smt->fetchAll(PDO::FETCH_OBJ);
		else
			return NULL;
	}
}
?>

