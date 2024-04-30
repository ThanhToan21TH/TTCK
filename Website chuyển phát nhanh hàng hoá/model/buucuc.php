<?php
class BUUCUC{
	
	// Thêm địa chỉ mới, trả về khóa của dòng mới thêm
	public function thembuucuc($nguoidung_id,$buucuc){
		$db = DATABASE::connect();
		try{
			$sql = "INSERT INTO buucuc(nguoidung_id, buucuc) VALUES(:nguoidung_id,:buucuc)";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':nguoidung_id',$nguoidung_id);			
			$cmd->bindValue(':buucuc',$buucuc);			
			$cmd->execute();
			$id = $db->lastInsertId();
			return $id;
		}
		catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}

}
?>
