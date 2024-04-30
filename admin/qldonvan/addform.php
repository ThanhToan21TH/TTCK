<?php 
    include("../inc/top.php"); 
?>

<form method="post" enctype="multipart/form-data" action="index.php">
    <input type="hidden" name="action" value="xulythem">
    <div class="my-3">
      <label>Dịch vụ</label>
      <select class="form-control" id ="loaiDichVu" name="optloaidv">  
      <option selected>--- Chọn ---</option>              
          <option value="1">Nội thành</option>
          <option value="2" >Trên 300km</option>
          <option value="3">Dưới 300km</option>
      </select></div>
      <div class="my-3">
      <label >Loại hàng</label>
      <select class="form-control" name="optloaihang">
        <option selected>--- Chọn ---</option>              
          <option value="1">Hàng cồng kềnh > 10kg</option>
          <option value="2" >Hàng cồng kềnh dạng lỏng</option>
          <option value="3">Hàng cồng kềnh < 10kg</option>
      </select></div>
    <div class="mb-3 mt-3">
        <label for="hotennguoigui" class="form-lable">Họ tên người gửi</label>
        <input class="form-control" type="text" name="hotennguoigui" placeholder="Nhập tên" required> 
    </div>
    <div class="mb-3 mt-3">
        <label for="diachinguoigui" class="form-lable">Địa chỉ</label>
        <input class="form-control" type="text" name="diachinguoigui" placeholder="Nhập địa chỉ" required> 
    </div>
    <div class="mb-3 mt-3">
        <label for="sdtnguoigui" class="form-lable">Số điện thoại</label>
        <input class="form-control" type="text" name="sdtnguoigui" placeholder="Nhập số điện thoại" required> 
    </div>
    <div class="mb-3 mt-3">
        <label for="hotennguoinhan" class="form-lable">Họ tên người nhận</label>
        <input class="form-control" type="text" name="hotennguoinhan" placeholder="Nhập tên" required> 
    </div>
    <div class="mb-3 mt-3">
        <label for="diachinguoinhan" class="form-lable">Địa chỉ</label>
        <input class="form-control" type="text" name="diachinguoinhan" placeholder="Nhập địa chỉ" required> 
    </div>
    <div class="mb-3 mt-3">
        <label for="sdtnguoinhan" class="form-lable">Số điện thoại</label>
        <input class="form-control" type="text" name="sdtnguoinhan" placeholder="Nhập số điện thoại" required> 
    </div>
    <div class="mb-3 mt-3">
        <label for="khoiluong" class="form-lable">Khối lượng</label>
        <input class="form-control" type="number" id= "khoiLuong" name="khoiluong" value="0"> 
    </div>
    <div class="mb-3 mt-3">
        <label for="giatrihanghoa" class="form-lable">Giá trị hàng hoá</label>
        <input class="form-control" type="number" name="giatrihanghoa" value="0"> 
    </div>
    <div class="mb-3 mt-3">
        <label for="ngay" class="form-lable">Ngày</label>
        <input class="form-control" type="date" name="ngay" > 
    </div>
    <div class="mb-3 mt-3">
        <label for="phithuho" class="form-lable">Phí thu hộ</label>
        <input class="form-control" type="number" name="phithuho" value="0"> 
    </div>
    <div class="row mt-3">
    <div class="col-md-4">
        <label for="tongTien" class="form-label">Tổng tiền:</label>
        <input type="text" id="tongTien" name ="tongtien" class="form-control" readonly>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
        $(document).ready(function(){
            $("#loaiDichVu, #khoiLuong").change(function(){
                var loaiDichVu = $("#loaiDichVu").val();
                var khoiLuong = $("#khoiLuong").val();
        
                $.ajax({
                    type: "POST",
                    url: "tongcuoc.php",
                    data: { loaiDichVu: loaiDichVu, khoiLuong: khoiLuong },
                    success: function(data){
                        $("#tongTien").val( + data + " VND");
                    }
                }); 
            });
        });
        </script>
        </div>
    </div>
    <div class="mb-3 mt-3">
        <label >Yêu cầu</label>
        <select class="form-control" name="optyc">
            <option selected>--- Chọn ---</option>              
            <option value="Được kiểm tra hàng">Được kiểm tra hàng</option>
            <option value="Không được kiểm tra hàng" >Không được kiểm tra hàng</option>
        </select></div>
    <div class="mb-3 mt-3">
        <label >Hình thức thanh toán</label>
        <select class="form-control" name="optthanhtoan">
            <option selected>--- Chọn ---</option>              
            <option value="Thanh toán khi nhận hàng">Thanh toán khi nhận hàng</option>
            <option value="Chuyển khoản" >Chuyển khoản</option>
        </select></div>
        <div class="mb-3 mt-3">
        <label for="tinhtrang" class="form-lable">Tình trạng</label>
        <input class="form-control" type="text" name="tinhtrang" placeholder="Nhập tinh trạng" required> 
    </div>
    <div class="mb-3 mt-3">
        <label >Bưu cục</label>
        <select class="form-control" name="optbuucuc">
            <option slected>--- Chọn ---</option>              
            <option value="1">An Giang</option>
            <option value="2" >Đồng tháp</option>
            <option value="3" >Long An</option>
            <option value="4" >Sài Gòn</option>
        </select></div>
    <div class="mb-3 mt-3">
        <label for="mota" class="form-lable">Ghi chú</label>
        <textarea id="editor"rows="5" class="form-control" name="ghichu" placeholder="Nhập ghi chú" required></textarea>
    </div>
    <div class="mb-3 mt-3">
        <input type="submit" value="Lưu" class="btn btn-success"> 
        <input type="reset" value="Hủy" class="btn btn-warning"> 
    </div>
</form>