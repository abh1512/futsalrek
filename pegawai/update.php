<?php
require_once "../lib/settings.php";
require_once "../lib/function.php";


$name = $_POST['name'];
$id = $_POST['id'];
$status = $_POST['status'];

if($name=="status"){
		if(mliUpdate($con,"tbl_pengguna","hak_akses='$status'","where id_pengguna='$id'")){
			echo "ok";
		}else
			echo "gagal";
}
else if($name=="verifikasi"){
	if(mliUpdate($con,"tbl_pendaftaran","status='aktif'","where nim='$id'")){
		echo "ok";
	}else
		echo "gagal";
}
