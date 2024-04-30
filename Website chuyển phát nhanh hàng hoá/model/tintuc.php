<?php
class TINTUC{
    // khai báo các thuộc tính
    private $id;
    private $tieude;
    private $noidung;
    private $hinhanh;

    public function getid(){ return $this->id; }
    public function setid($value){ $this->id = $value; }
    public function gettieude(){ return $this->tieude; }
    public function settieude($value){ $this->tieude = $value; }
    public function getnoidung(){ return $this->noidung; }
    public function setnoidung($value){ $this->noidung = $value; }
    public function gethinhanh(){ return $this->hinhanh; }
    public function sethinhanh($value){ $this->hinhanh = $value; }


    // Lấy danh sách
    public function laytintuc(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM tintuc";
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
	// Lấy danh sách mặt hàng thuộc 1 danh mục

    // Lấy mặt hàng theo id
    public function laytintuctheoid($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM tintuc WHERE id=:id";
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
    // Thêm mới
    public function themtintuc($tintuc){
        $dbcon = DATABASE::connect();
        try{
            $sql = "INSERT INTO tintuc(tieude,noidung,hinhanh) 
                VALUES(:tieude,:noidung,:hinhanh)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tieude", $tintuc->tieude);
            $cmd->bindValue(":noidung", $tintuc->noidung);
            $cmd->bindValue(":hinhanh", $tintuc->hinhanh);
            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Xóa 
    public function xoatintuc($tintuc){
        $dbcon = DATABASE::connect();
        try{
            $sql = "DELETE FROM tintuc WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $tintuc->id);
            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Cập nhật 
    public function suatintuc($tintuc){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE tintuc SET tieude=:tieude,
                                        noidung=:noidung,
                                        hinhanh=:hinhanh,
                                        WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tieude", $tintuc->tieude);
            $cmd->bindValue(":noidung", $tintuc->noidung);
            $cmd->bindValue(":hinhanh", $tintuc->hinhanh);
            $cmd->bindValue(":id", $tintuc->id);
            $result = $cmd->execute();            
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
