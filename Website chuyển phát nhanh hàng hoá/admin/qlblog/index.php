<?php 
require("../../model/database.php");
require("../../model/tintuc.php");


// Xét xev có thao tác nào được chọn
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{   // vặc định là xev danh sách
    $action="xem";
}

$tt = new TINTUC();
$idsua = 0;

switch($action){
    case "xem":
        $tintuc = $tt->laytintuc();       
        include("main.php");
        break;
    case "sua": // hiển thị forv
    	$idsua = $_GET["id"];
        $tintuc = $tt->laytintuc();       
        include("main.php");
        break;
    case "capnhat": // lưu dữ liệu sửa với vào db
        if($_FILES["filehinhanh"]["name"]!=""){
            // xử lý file upload -- Cần bổ dung kiểm tra: dung lượng, kiểu file, ...       
            $hinhanh = "images/" . basename($_FILES["filehinhanh"]["name"]);// đường dẫn lưu csdl
            $ttmoi->sethinhanh($hinhanh);
            $duongdan = "../../" . $hinhanh; // đường dẫn lưu upload file        
            move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan);
        }
    	// gán dữ liệu từ forv
    	$ttmoi = new TINTUC();
    	$ttmoi->setid($_POST["id"]);
    	$ttmoi->settentintuc($_POST["tieude"]);
        $ttmoi->setnoidung($_POST["noidung"]);
        $ttmoi->sethinhanh($_POST["txthinhcu"]);
    	// sửa
    	$tt->suatintuc($ttmoi);
    	// load danh sách
        $tintuc = $tt->laytintuc();       
        include("main.php");
        break;
    case "them":
        include("addform.php");
            break;
    case "xulythem":
        $hinhanh = "images/" . basename($_FILES["filehinhanh"]["name"]); // đường dẫn ảnh lưu trong db
		$duongdan = "../../" . $hinhanh; // nơi lưu file upload (đường dẫn tính theo vị trí hiện hành)
		move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan);
    	// gán dữ liệu từ forv
    	$ttmoi = new TINTUC();
    	$ttmoi->settieude($_POST["tieude"]);
        $ttmoi->setnoidung($_POST["noidung"]);
        $ttmoi->sethinhanh($hinhanh);
    	// thêm
    	$tt->themtintuc($ttmoi);
    	// load danh sách
        $tintuc = $tt->laytintuc();       
        include("main.php");
        break;
    case "xoa":
    	// lấy dòng vuốn xóa
    	$ttxoa = new TINTUC();
    	$ttxoa->setid($_GET["id"]);
    	// xóa
    	$ttxoa->xoatintuc($ttxoa);
    	// load danh sách
        $tintuc = $tt->laytintuc();       
        include("main.php");
        break;
    default:
        break;
}
?>
