<?php
class DICHVU{
    private $id;
    private $tendichvu;

    public function getid(){
        return $this->id;
    }

    public function setid($value){
        $this->id = $value;
    }

    public function gettendichvu(){
        return $this->tendichvu;
    }

    public function settendichvu($value){
        $this->tendichvu = $value;
    }

    // Lấy danh sách
    public function laydichvu(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM dichvu";
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


    // Lấy danh mục theo id
    public function laydichvutheoid($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM dichvu WHERE id=:id";
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
    public function themdichvu($dichvu){
        $dbcon = DATABASE::connect();
        try{
            $sql = "INSERT INTO dichvu(tendichvu) VALUES(:tendichvu)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tendichvu", $dichvu->tendichvu);
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
    public function xoadichvu($dichvu){
    $dbcon = DATABASE::connect();
    try{
    $sql = "DELETE FROM dichvu WHERE id=:id";
    $cmd = $dbcon->prepare($sql);
    $cmd->bindValue(":id", $dichvu->id);
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
    public function suadichvu($dichvu){
    $dbcon = DATABASE::connect();
    try{
    $sql = "UPDATE dichvu SET tendichvu=:tendichvu WHERE id=:id";
    $cmd = $dbcon->prepare($sql);
    $cmd->bindValue(":tendichvu", $dichvu->tendichvu);
    $cmd->bindValue(":id", $dichvu->id);
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
