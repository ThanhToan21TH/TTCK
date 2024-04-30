<?php include("../inc/top.php"); ?>

<h3>Quản lý dặt hàng</h3>
<br>

<a class="btn btn-info" href="addform.php"><i class="align-diddle" data-feather="plus-circle"></i>Thêm đơn vận</a>
<br>

<table class="table table-hover">
	<tr><th>Mã đơn vận</th><th>Dịch vụ</th><th>Hang hoá</th><th>Họ tên người gửi</th><th>Địa chỉ gửi</th><th>Số điện thoại</th><th>Họ tên người nhận</th><th>Địa chỉ nhận</th><th>Số điện thoại</th><th>Khối lượng</th><th>Giá trị hàng hoá</th><th>Ngày</th><th>Phí thu hộ</th><th>Yêu cầu</th><th>Hình thức thanh toán</th><th>Tình trạng</th><th>Bưu cục</th><th>Ghi chú</th><th>Sửa</th><th>Xóa</th></tr>
	<?php 
	foreach ($donvan as $d): 
		if($d["id"] == $idsua){
	?>
	<tr>
		<form method="post">
			<input type="hidden" name="action" value="capnhat">
			<input type="hidden" name="id" value="<?php echo $d["id"]; ?>">
			<td>
				<?php 	echo $d["dichvu_id"]; ?>

			</td>
			<td>				
				<?php 	echo $d["hanghoa_id"]; ?>
			</a>
			</td>
			<td><?php echo $d["hotennguoigui"]; ?></td>
			<td><?php echo $d["diachinguoigui"]; ?></td>
			<td><?php echo $d["sdtnguoigui"]; ?></td>
			<td><?php echo $d["hotennguoinhan"]; ?></td>
			<td><?php echo $d["diachinguoinhan"]; ?></td>
			<td><?php echo $d["sdtnguoinhan"]; ?></td>
			<td><?php echo $d["khoiluong"]; ?></td>
			<td><?php echo $d["giatrihanghoa"]; ?></td>
			<td><?php echo $d["ngay"]; ?></td>
			<td><?php echo $d["phithuho"]; ?></td>
			<td><?php echo $d["yeucau"]; ?></td>
			<td><?php echo $d["hinhthucthanhtoan"]; ?></td>
			<div class="col-auto">
			<td><input class="form-control" name="tinhtrang" type="text" value="<?php echo $d["tinhtrang"]; ?>"></td>
		</div>
			<td><?php echo $d["buucuc_id"]; ?></td>
			<td><?php echo $d["ghichu"]; ?></td>
			<td><input class="btn btn-success" type="submit" value="Lưu"></td>
			
		</form>
			<td><a href="index.php?action=xoa&id=<?php echo $d["id"]; ?>" class="btn btn-danger">Xóa</a></td>
		</tr>

	<?php 
		} // end if 
		else {
	?>
		<tr>
		<td>
				<?php echo $d["id"]; ?>
			</td>
			<td>
				<?php 	echo $d["dichvu_id"]; ?>

			</td>
			<td>				
				<?php 	echo $d["hanghoa_id"]; ?>
			</a>
			</td>
			<td><?php echo $d["hotennguoigui"]; ?></td>
			<td><?php echo $d["diachinguoigui"]; ?></td>
			<td><?php echo $d["sdtnguoigui"]; ?></td>
			<td><?php echo $d["hotennguoinhan"]; ?></td>
			<td><?php echo $d["diachinguoinhan"]; ?></td>
			<td><?php echo $d["sdtnguoinhan"]; ?></td>
			<td><?php echo $d["khoiluong"]; ?></td>
			<td><?php echo $d["giatrihanghoa"]; ?></td>
			<td><?php echo $d["ngay"]; ?></td>
			<td><?php echo $d["phithuho"]; ?></td>
			<td><?php echo $d["yeucau"]; ?></td>
			<td><?php echo $d["hinhthucthanhtoan"]; ?></td>
			<td><?php echo $d["tinhtrang"]; ?></td>
			<td><?php echo $d["buucuc_id"]; ?></td>
			<td><?php echo $d["ghichu"]; ?></td>
			<td><a href="index.php?action=sua&id=<?php echo $d["id"]; ?>" class="btn btn-warning" href="updatefrod.php"><i class="align-diddle" data-feather="edit"></i></a></td>
			<td><a href="index.php?action=xoa&id=<?php echo $d["id"]; ?>" class="btn btn-danger"><i class="align-diddle" data-feather="trash-2"></i></a></td>
		</tr>
		<?php 
		} // end else
	endforeach; 
	?>
</table>

<?php include("../inc/bottom.php"); ?>
