<?php include("../inc/top.php"); ?>

<h3>Quản lý dặt hàng</h3>

<table class="table table-hover">
	<tr><th>ID</th><th>Họ tên người gửi</th><th>Địa chỉ gửi</th><th>Số điện thoại</th><th>Họ tên người nhận</th><th>Địa chỉ nhận</th><th>Số điện thoại</th><th>Tình trạng</th><th>Sửa</th></tr>
	<?php 
	foreach ($donvan as $d): 
		if($d["id"] == $idsua){
	?>
	<tr>
		<form method="post">
			<input type="hidden" name="action" value="capnhat">
			<input type="hidden" name="id" value="<?php echo $d["id"]; ?>">
			
			<td>
				<?php 	echo $d["id"]; ?>

			</td>
			
			</td>
			<td><?php echo $d["hotennguoigui"]; ?></td>
			<td><?php echo $d["diachinguoigui"]; ?></td>
			<td><?php echo $d["sdtnguoigui"]; ?></td>
			<td><?php echo $d["hotennguoinhan"]; ?></td>
			<td><?php echo $d["diachinguoinhan"]; ?></td>
			<td><?php echo $d["sdtnguoinhan"]; ?></td>
			<div class="col-auto">
			<td><input class="form-control" name="tinhtrang" type="text" value="<?php echo $d["tinhtrang"]; ?>"></td>
			</div>
			<td><input class="btn btn-success" type="submit" value="Lưu"></td>
			
		</form>
			<td><a href="index.php?action=xoa&id=<?php echo $d["id"]; ?>" class="btn btn-danger">Huỷ đơn</a></td>
		</tr>

	<?php 
		} // end if 
		else {
	?>
		<tr>
			<td>
				<?php 	echo $d["id"]; ?>

			</td>
			<td><?php echo $d["hotennguoigui"]; ?></td>
			<td><?php echo $d["diachinguoigui"]; ?></td>
			<td><?php echo $d["sdtnguoigui"]; ?></td>
			<td><?php echo $d["hotennguoinhan"]; ?></td>
			<td><?php echo $d["diachinguoinhan"]; ?></td>
			<td><?php echo $d["sdtnguoinhan"]; ?></td>
		
			<td><?php echo $d["tinhtrang"]; ?></td>

			<td><a href="index.php?action=sua&id=<?php echo $d["id"]; ?>" class="btn btn-warning" href="updatefrod.php"><i class="align-diddle" data-feather="edit"></i></a></td>
		</tr>
		<?php 
		} // end else
	endforeach; 
	?>
</table>

<?php include("../inc/bottom.php"); ?>
