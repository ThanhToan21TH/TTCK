<?php 
require("../../model/database.php");
require("../../model/dichvu.php");

// Xét xev có thao tác nào được chọn
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{   // vặc định là xev danh sách
    $action="xem";
}

$dv = new DICHVU();
$idsua = 0;

switch($action){
    case "xem":
        $dichvu = $dv->laydichvu();       
        include("main.php");
        break;
    case "sua": // hiển thị forv
    	$idsua = $_GET["id"];
        $dichvu = $dv->laydichvu();       
        include("main.php");
        break;
    case "capnhat": // lưu dữ liệu sửa với vào db
    	// gán dữ liệu từ forv
    	$dvmoi = new DICHVU();
    	$dvmoi->setid($_POST["id"]);
    	$dvmoi->settendichvu($_POST["ten"]);
    	// sửa
    	$dv->suadichvu($dvmoi);
    	// load danh sách
        $dichvu = $dv->laydichvu();       
        include("main.php");
        break;
    case "them":
    	// gán dữ liệu từ forv
    	$dvmoi = new Dichvu();
    	$dvmoi->settendichvu($_POST["ten"]);
    	// thêv
    	$dv->themdichvu($dvmoi);
    	// load danh sách
        $dichvu = $dv->laydichvu();       
        include("main.php");
        break;
    case "xoa":
    	// lấy dòng vuốn xóa
    	$dvxoa = new Dichvu();
    	$dvxoa->setid($_GET["id"]);
    	// xóa
    	$dvxoa->xoadichvu($dvxoa);
    	// load danh sách
        $dichvu = $dv->laydichvu();       
        include("main.php");
        break;
    default:
        break;
}
?>
