<?php 
require("../model/database.php");
require("../model/tintuc.php");
require("../model/khachhang.php ");


$tt = new TINTUC();

if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="null"; 
}


switch($action){
    case "null": 	
    	$tintuc = $tt->laytintuc();	
        include("main.php");
        break;
    case "dangnhap":
        include("loginform.php");
        break;
    case "xldangnhap":
        $email = $_POST["txtemail"];
        $matkhau = $_POST["txtmatkhau"];
        $kh = new KHACHHANG();
        if($kh->kiemtrakhachhanghople($email,$matkhau)==TRUE){
            $_SESSION["khachhang"] = $kh->laythongtinkhachhang($email);
            // đọc thông tin (đơn hàng) của kh
            include("info.php");
        }
        else{
            //$tb = "Đăng nhập không thành công!";
            include("loginform.php");
        }
        break;
    case "thongtin":
        // đọc thông tin các đơn của khách
        include("info.php"); // trang info.php hiển thị các đơn đã đặt
        break;
    case "dangxuat":
        unset($_SESSION["khachhang"]);
        include("main.php");
        break;
    default:
        break;
}

?>