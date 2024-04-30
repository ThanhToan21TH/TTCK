<?php
$loaiDichVu = $_POST['loaiDichVu'];
$khoiLuong = $_POST['khoiLuong'];

$tongTien = 0;
if ($loaiDichVu == 1) {
    $tongTien = $khoiLuong < 1 ? 15000 + 15000 * 0.5 : 15000 + 15000;
} else if ($loaiDichVu == 2) {
    $tongTien = $khoiLuong < 1 ? 20000 + 20000 * 0.5 : 20000 + 20000;
} else if ($loaiDichVu == 3) {
    $tongTien = $khoiLuong < 1 ? 25000 + 25000 * 0.5 : 25000 + 25000;
}

echo $tongTien;
?>
