<?php
class DONVAN{
	private $id;
    private $dichvu_id;
    private $hanghoa_id;
    private $hotennguoigui;
    private $diachinguoigui;
    private $sdtnguoigui;
    private $hotennguoinhan;
    private $diachinguoinhan;
    private $sdtnguoinhan;
    private $khoiluong;
	private $giatrihanghoa;
	private $ngay;
	private $phithuho;
	private $yeucau;
	private $hinhthucthanhtoan;
    private $tinhtrang;
	private $buucuc_id;
	private $ghichu;

	public function getid(){ return $this->id; }
    public function setid($value){ $this->id = $value; }
    public function getdichvu_id(){ return $this->dichvu_id; }
    public function setdichvu_id($value){ $this->dichvu_id = $value; }
    public function gethanghoa_id(){ return $this->hanghoa_id; }
    public function sethanghoa_id($value){ $this->hanghoa_id = $value; }
    public function gethotennguoigui(){ return $this->hotennguoigui; }
    public function sethotennguoigui($value){ $this->hotennguoigui = $value; }
    public function getdiachinguoigui(){ return $this->diachinguoigui; }
    public function setdiachinguoigui($value){ $this->diachinguoigui = $value; }
    public function getsdtnguoigui(){ return $this->sdtnguoigui; }
    public function setsdtnguoigui($value){ $this->sdtnguoigui = $value; }
    public function gethotennguoinhan(){ return $this->hotennguoinhan; }
    public function sethotennguoinhan($value){ $this->hotennguoinhan = $value; }
    public function getdiachinguoinhan(){ return $this->diachinguoinhan; }
    public function setdiachinguoinhan($value){ $this->diachinguoinhan = $value; }
    public function getsdtnguoinhan(){ return $this->sdtnguoinhan; }
    public function setsdtnguoinhan($value){ $this->sdtnguoinhan = $value; }
    public function getkhoiluong(){ return $this->khoiluong; }
    public function setkhoiluong($value){ $this->khoiluong = $value; }
	public function getgiatrihanghoa(){ return $this->giatrihanghoa; }
    public function setgiatrihanghoa($value){ $this->giatrihanghoa = $value; }
	public function getngay(){ return $this->ngay; }
    public function setngay($value){ $this->ngay = $value; }
	public function getphithuho(){ return $this->phithuho; }
    public function setphithuho($value){ $this->phithuho = $value; }
	public function getyeucau(){ return $this->yeucau; }
    public function setyeucau($value){ $this->yeucau = $value; }
	public function gethinhthucthanhtoan(){ return $this->hinhthucthanhtoan; }
    public function sethinhthucthanhtoan($value){ $this->hinhthucthanhtoan = $value; }
    public function gettinhtrang(){ return $this->tinhtrang; }
    public function settinhtrang($value){ $this->tinhtrang = $value; }
	public function getbuucuc_id(){ return $this->buucuc_id; }
    public function setbuucuc_id($value){ $this->buucuc_id = $value; }
	public function getghichu(){ return $this->ghichu; }
    public function setghichu($value){ $this->ghichu = $value; }

	// Thêm đơn hàng mới, trả về khóa của dòng mới thêm
	public function themdonvan($donvan){
		$db = DATABASE::connect();
		try{
			$sql = "INSERT INTO donvan(dichvu_id,hanghoa_id,hotennguoigui,diachinguoigui,sdtnguoigui,hotennguoinhan,diachinguoinhan,sdtnguoinhan,khoiluong,giatrihanghoa,ngay,phithuho,yeucau,hinhthucthanhtoan,tinhtrang,buucuc_id,ghichu) 
					VALUES(:dichvu_id,:hanghoa_id,:hotennguoigui,:diachinguoigui,:sdtnguoigui,:hotennguoinhan,:diachinguoinhan,:sdtnguoinhan,:khoiluong,:giatrihanghoa,:ngay,:phithuho,:yeucau,:hinhthucthanhtoan,:tinhtrang,:buucuc_id,:ghichu)";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':dichvu_id',$donvan->dichvu_id);			
			$cmd->bindValue(':hanghoa_id',$donvan->hanghoa_id);
			$cmd->bindValue(':hotennguoigui',$donvan->hotennguoigui);
			$cmd->bindValue(':diachinguoigui',$donvan->diachinguoigui);
			$cmd->bindValue(':sdtnguoigui',$donvan->sdtnguoigui);
			$cmd->bindValue(':hotennguoinhan',$donvan->hotennguoinhan);
			$cmd->bindValue(':diachinguoinhan',$donvan->diachinguoinhan);
			$cmd->bindValue(':sdtnguoinhan',$donvan->sdtnguoinhan);
			$cmd->bindValue(':khoiluong',$donvan->khoiluong);
			$cmd->bindValue(':giatrihanghoa',$donvan->giatrihanghoa);
			$cmd->bindValue(':ngay',$donvan->ngay);
			$cmd->bindValue(':phithuho',$donvan->phithuho);
			$cmd->bindValue(':yeucau',$donvan->yeucau);
			$cmd->bindValue(':hinhthucthanhtoan',$donvan->hinhthucthanhtoan);
            $cmd->bindValue(':tinhtrang',$donvan->tinhtrang);
			$cmd->bindValue(':buucuc_id',$donvan->buucuc_id);
			$cmd->bindValue(':ghichu',$donvan->ghichu);
            $result = $cmd->execute();            
            return $result;
		}
		catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}
    public function suadonvan($donvan){
		$dbcon = DATABASE::connect();
		try{
		$sql = " donvan SET tinhtrang=:tinhtrang WHERE id=:id";
		$cmd = $dbcon->prepare($sql);
		$cmd->bindValue(":tinhtrang", $donvan->tinhtrang);
		$cmd->bindValue(":id", $donvan->id);
		$result = $cmd->execute();
		return $result;
		}
		catch(PDOException $e){
		$error_message = $e->getMessage();
		echo "<p>Lỗi truy vấn: $error_message</p>";
		exit();
		}
		}
    public function xoadonvan($donvan){
        $dbcon = DATABASE::connect();
        try{
            $sql = "DELETE FROM donvan WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $donvan->id);
            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
	// Đọc ds đơn hàng của 1 khách
	public function laydonvan(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM donvan ORDER BY id DESC";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
	public function laydonvantheoid($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM donvan WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            $result = $cmd->fetch();             
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
}
?>
