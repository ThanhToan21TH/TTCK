<?php include("../inc/top.php"); ?>
<div>
<h3>Cập nhật mặt hàng</h3>
<form method="post" action="index.php" enctype="multipart/form-data">
<input type="hidden" name="action" value="xulysua">
<input type="hidden" name="txtid" value="<?php echo $t["id"]; ?>">

<div class="my-3">    
	<label>Tiêu đề</label>    
	<input class="form-control" type="text" name="tieude" required value="<?php echo $t["tieude"]; ?>">
</div> 
<div class="my-3">    
	<label>Mô tả</label>    
	<textarea class="form-control" name="noidung" id="noidung" required><?php echo $m["noidung"]; ?></textarea>
</div> 

<div class="my-3">
	<label>Hình ảnh</label><br>
	<input type="hidden" name="txthinhcu" value="<?php echo $t["hinhanh"]; ?>">
	<img src="../../<?php echo $t["hinhanh"]; ?>" width="50" class="img-thumbnail">	
	<a data-bs-toggle="collapse" data-bs-target="#demo">Đổi hình ảnh</a>
	<div id="demo" class="collapse m-3">
	  <input type="file" class="form-control" name="filehinhanh">
	</div>
</div>

<div class="my-3">
<input class="btn btn-primary"  type="submit" value="Lưu">
<input class="btn btn-warning"  type="reset" value="Hủy">
</div>
</form>
</div>
<script>
    ClassicEditor
        .create( document.querySelector( '#noidung' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

<?php include("../inc/bottom.php"); ?>