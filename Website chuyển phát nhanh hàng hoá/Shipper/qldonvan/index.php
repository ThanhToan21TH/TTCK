<?php 

    require("../../model/database.php");
  
    require("../../model/donvan.php");
    require("../../model/nguoidung.php");
    // Xét xem có thao tác nào được chọn

    if(isset($_REQUEST["action"])){
        $action = $_REQUEST["action"];
    }
    else{   // mặc định là xem danh sách
        $action="xem";
    }


    $dv = new DONVAN();
    $nd = new NGUOIDUNG();
    $idsua = 0;
    switch($action){
        case "xem":
            //$danhmuc = $dm->laydanhmuc();    
            $donvan = $dv->laydonvan();   
            include("main.php");
            break;

        case "chitiet":
            if(isset($_GET["id"])){
                $dv = $dv->laydonvantheoid($_GET["id"]);
                include("detail.php");
            }
            else{
                $donvan = $dv ->laydonvan();
                include("main.php");
            }
            break;

        case "them":
            include("addform.php");
            break;

        case"xulythem":

            $new_donvan = new DONVAN();
            $new_donvan->setdichvu_id($_POST['optloaidv']);
            $new_donvan->sethanghoa_id($_POST['optloaihang']);
            $new_donvan->sethotennguoigui($_POST['hotennguoigui']);
            $new_donvan->setdiachinguoigui($_POST['diachinguoigui']);
            $new_donvan->setsdtnguoigui($_POST['sdtnguoigui']);
            $new_donvan->sethotennguoinhan($_POST['hotennguoinhan']);
            $new_donvan->setdiachinguoinhan($_POST['diachinguoinhan']);
            $new_donvan->setsdtnguoinhan($_POST['sdtnguoinhan']);
            $new_donvan->setkhoiluong($_POST['khoiluong']);
            $new_donvan->setgiatrihanghoa($_POST['giatrihanghoa']);
            $new_donvan->setngay($_POST['ngay']);
            $new_donvan->setphithuho($_POST['phithuho']);
            $new_donvan->setyeucau($_POST['optyc']);
            $new_donvan->sethinhthucthanhtoan($_POST['optthanhtoan']);
            $new_donvan->settinhtrang($_POST['tinhtrang']);
            $new_donvan->setbuucuc_id($_POST['optbuucuc']);
            $new_donvan->setghichu($_POST['ghichu']);
            $dv->themdonvan($new_donvan);
            header('location:./');
            break;

        case "xoa":
            if(isset($_GET["id"])){
                $xoadonvan = new DONVAN();        
                $xoadonvan->setid($_GET["id"]);
                $dv->xoadonvan($xoadonvan);
            }
            $donvan = $mh->laydonvan();
            include("main.php");
            break;	 

        case "sua":
            $idsua = $_GET["id"];
            $donvan = $dv ->laydonvan();
            include("main.php");
            break;

        case "xulysua":

            $new_donvan = new DONVAN();
            
            $new_donvan->settinhtrang($_POST["tinhtrang"]);
            // sửa
            $dv->themdonvan($new_donvan);
            // load danh sách
            $donvan = $dv->laydonvan();       
            include("main.php");
            break;


        default:
            break;
    }
?>
