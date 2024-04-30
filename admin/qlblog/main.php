<?php include("../inc/top.php"); ?>

<h4 class="text-info">Danh sách danh mục</h4> 
<table class="table table-hover">
	<tr><th>ID</th><th>Tiêu đề</th><th>Mô tả</th><th>Hình ảnh</th><th>Sửa</th><th>Xóa</th></tr>
	<?php 
	foreach ($tintuc as $t) : 
		if($t["id"] == $idsua){ 
	?>
		<tr>
		<form method="post">
			<input type="hidden" name="action" value="capnhat">
			<input type="hidden" name="id" value="<?php echo $t["id"]; ?>">
			<td><?php echo $t["id"]; ?></td>
			<td><input class="form-control" name="ten" type="text" value="<?php echo $t["tieude"]; ?>"></td>
			<div class="mb-3 mt-3">
	<label for="mota" class="form-label">Mô tả</label>
	<textarea id="mota" rows="5" class="form-control" name="mota" placeholder="Nhập mô tả" required></textarea>
	</div>
	<div class="my-3">
	<label>Hình ảnh</label><br>
	<input type="hidden" name="txthinhcu" value="<?php echo $t["hinhanh"]; ?>">
	<img src="../<?php echo $t["hinhanh"]; ?>" width="50" class="img-thumbnail">	
	<a data-bs-toggle="collapse" data-bs-target="#demo">Đổi hình ảnh</a>
	<div id="demo" class="collapse m-3">
	  <input type="file" class="form-control" name="filehinhanh">
	</div>
</div>
			<td><input class="btn btn-success" type="submit" value="Lưu"></td>
		</form>
			<td><a href="index.php?action=xoa&id=<?php echo $t["id"]; ?>" class="btn btn-danger">Xóa</a></td>
		</tr>

	<?php 
		} 
		else {
	?>
		<tr>
			<td><?php echo $t["id"]; ?></td>
			<td><?php echo $t["tieude"]; ?></td>
			<td><?php echo $t["noidung"];?> </td>
			<td><?php echo $t["hinhanh"];?></td>
			<td><a href="index.php?action=sua&id=<?php echo $t["id"]; ?>" class="btn btn-warning">Sửa</a></td>
			<td><a href="index.php?action=xoa&id=<?php echo $t["id"]; ?>" class="btn btn-danger">Xóa</a></td>
		</tr>
	<?php 
		} // end else
	endforeach; 
	?>
</table>

<br>
<a class="btn btn-info" href="addform.php"><i class="align-diddle" data-feather="plus-circle"></i>Thêm tin tức</a>
<br><br>


<?php include("../inc/bottom.php"); ?>
