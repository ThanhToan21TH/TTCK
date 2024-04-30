<?php include("../inc/top.php"); ?>

<h3>Thêm tin tức</h3> 
<br>
<form method="post" enctype="multipart/form-data" action="index.php">
<input type="hidden" name="action" value="xulythem">
<div class="mb-3 mt-3">
		<label for="tieude" class="form-label">Tiêu đề</label>
			<input type="text" class="form-control" name="tieude" placeholder="Nhập tiêu đè">
		</div>
		<div class="mb-3 mt-3">
		<label for="noidung" class="form-label">Mô tả</label>
			<textarea id="noidung" rows="5" class="form-control" name="noidung" placeholder="Nhập mô tả" required></textarea>
		</div>
		<div class="mb-3 mt-3">
		<label  class="form-label">Hình ảnh</label>
			<input type="file" class="form-control" name="filehinhanh" placeholder="Chọn tệp">
		</div>
<div class="mb-3 mt-3">
	<input type="submit" value="Lưu" class="btn btn-success">
	<input type="reset" value="Hủy" class="btn btn-warning">
</div>
</form>

<?php include("../inc/bottom.php"); ?>