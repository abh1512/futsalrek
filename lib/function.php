<?php
function encryptIt( $q ) {
	return $q;
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp'.date("ymd")."GemastikUnesa";
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
}
function decryptIt( $q ) {
	return $q;
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp'.date("ymd")."GemastikUnesa";
    $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
    return( $qDecoded );
}
if(!function_exists("alertT")){
	function alertT($pesan){
		echo "<script>alert(\"".str_replace("\\","\\\\",$pesan)."\");</script>";
	}
}
if(!function_exists("telahLogin")){
	function telahLogin(){
	 if(empty(isset($_SESSION['user_id'])) and empty(isset($_SESSION['hak_akses']))){
		 echo "<script>document.location='".$base_url."login.php'</script>";
		 header("location:login.php");
		 die("");
	 }
	}
}
if(!function_exists("hakAkses")){
	function hakAkses($hak,$user,$href,$pesanTolak){
		if(!in_array($user,$hak)){
			//foreach($hak as $i)echo $i.",";
			alertT($pesanTolak);
			echo "$pesanTolak <a href='$href'>Kembali</a><script>document.location='$href'</script>";
			die("");
		}
	}
}
if(!function_exists("loadProdi")){
	function loadProdi(){
		return array(
		"S1 Pendidikan Teknologi Informasi",
		"D3 Manajemen Informasi",
		"S1 Teknik Informatika",
		"S1 Sistem Informasi");
	}
}
if(!function_exists("alert")){
	function alert($pesan,$mode="success"){
		return '<div class="alert alert-'.$mode.'" id="myAlert">
				<a href="#" class="close">&times;</a>'.$pesan.'</div>';
	}
}
if(!function_exists("anti_sql_injection")) {
	function anti_sql_injection($con,$string) {
		$string = stripslashes($string);
		$string = strip_tags($string);
		$string = mysqli_real_escape_string($con,$string);
		return $string;
	}
}
if(!function_exists("mliQuery")){
	function mliQuery($con,$field="*",$tbl,$search=""){
		//echo "Select $field from $tbl $search";
		return mysqli_query($con,"Select $field from $tbl $search");;
	}
}
if(!function_exists("mliSelect")){
	function mliSelect($q){
		return mysqli_fetch_object($q);
	}
}
if(!function_exists("mliNumR")){
	function mliNumR($con,$field="*",$tbl,$search=""){
		//echo "Select $field from $tbl $search";
		return mysqli_num_rows(mysqli_query($con,"Select $field from $tbl $search"));
	}
}
if(!function_exists("mliInsert")){
	function mliInsert($con,$tbl,$field,$value){
	 $query="INSERT into $tbl ($field) VALUES ($value);";
		return mysqli_query($con,$query);
	}
}
if(!function_exists("mliUpdate")){
	function mliUpdate($con,$tbl,$param, $search=""){
		$query="UPDATE $tbl SET $param $search;";
		return mysqli_query($con,$query);
	}
}
if(!function_exists("mliDelete")){
	function mliDelete($con,$tbl, $search=""){
		 $query="Delete from $tbl $search;";
		return mysqli_query($con,$query);
	}
}
if(!function_exists("randomPassword")) {
	function randomPassword($length) {
		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		for ($i = 0; $i < $length; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass); //turn the array into a string
	}
}
if(!function_exists("uploadAttachment")) {
	function uploadAttachment($files,$q1,$week,$pesan,$attachment=""){//files, query(ketua tim, nama tim), $week, $pesan
		//inisialisasi
		//$files=$_FILES['files'];
		$fileA=$uploaded=$failed=array();
		$allowed =array("pdf","doc","docx","xls","xlsx","ppt","pptx","txt","jpg","jpeg","png","bmp","gif","tiff");

		//buat folder files/id_user/minggu
		$uploaddir="files/".$q1->tim_ketua_id."_".$q1->tim_nama."/".$week;
		$uploaddatedir="files/".$q1->tim_ketua_id."_".$q1->tim_nama."/";
		if (!is_dir($uploaddatedir)) mkdir($uploaddatedir);
		if (!is_dir($uploaddir)) mkdir($uploaddir);

		//proses untuk setiap file yang diupload
		$index=0;
		foreach($files['name'] as $position => $file_name){
			$file_tmp =$files['tmp_name'][$position]; 	//temporary alamat file
			$file_size =$files['size'][$position]; 		//ukuran file
			$file_error=$files['error'][$position]; 	//jika ada eror
			$file_ext = explode(".", $file_name);
			$file_ext = strtolower(end($file_ext));		//mengambil extensi
			if(in_array($file_ext,$allowed)){
				if($file_error===0){
					if($file_size<=10*1024*1024){		//maksimal ukuran 10 mb
						//$file_name_new = uniqid('', true).'.'.$file_ext;
						while(file_exists($uploaddir."/".($index).$file_name)){
							$index++;
						}
						$file_destination=$uploaddir."/".($index).$file_name;
						//$file_destination = $uploaddir.'/'.($index++).".".$file_ext;
						if(move_uploaded_file($file_tmp,$file_destination)){
							$fileA[]=$file_destination;
							$uploaded[$position]= "[{$file_name}] success to upload\n";
							$attachment.="|".($index).$file_name;
						}else{
							$failed[$position]="[{$file_name}] failed to upload."."\n";
						}
					}else{
						$failed[$position]= "[{$file_name}] is too large."."\n";
					}
				}else {
					$failed[$position]="[{$file_name}] errored with code {$file_error}"."\n";
				}
			}else{
				$failed[$position]="[{$file_name}] file extension '{$file_ext}' is not allowed."."\n";
			}
		}
		if(!empty($uploaded)){
			$p="";
			foreach($uploaded as $x){$p.=$x."<br>";}
			$pesan.=alert($p,"success");
			//print_r($uploaded);
		}
		if(!empty($failed)){
			$p="";
			foreach($failed as $x){$p.=$x."<br>";}
			$pesan.=alert($p,"danger");//print_r($failed);
		}
		$return=array($pesan,$attachment);
		echo $attachment;
		return $return;
	}
}
/*if(!function_exists("hakAkses")){ //Hanya untuk membantu memahami fungsi hak aksees
	function hakAkses($hak){
		switch($hak){
			case 1: //Admin
				$Pengguna=array("visible"=>true,"column"=>array(1,2,3,4,5,6,7,"UD"),"bidMid"=>"all","hakAkses"=>"all");
				$BidangMinat=array("visible"=>true,"column"=>array(1,2,3,"CRUD"));
				$Tim=array("visible"=>true,"column"=>array(1,2,3,4,5,"CRUD"));
				$Laporan=array("visible"=>true,"column"=>array(1,2,3,4,5,6,7,"UD"),"show"=>"all");
				$Saran=array("visible"=>true,"column"=>array(1,2,3,4,"UD"),"show"=>"based on laporan");
			break;
			case 2: //Dosbing
				$Pengguna=array("visible"=>true,"column"=>array(1,2,3,4,5,6,7,""),"bidMid"=>"none","hakAkses"=>"none");
				$BidangMinat=array("visible"=>false);
				$Tim=array("visible"=>false);
				$Laporan=array("visible"=>true,"column"=>array(1,2,3,4,5,6,7,""),"show"=>"based on bidMit");
				$Saran=array("visible"=>true,"column"=>array(1,2,3,4,"UD"),"show"=>"based on laporan");
			break;
			case 3: //Ketua Gemastik
				$Pengguna=array("visible"=>true,"column"=>array(1,2,3,4,5,6,7,""),"bidMid"=>"koor,ket tim,anggota","hakAkses"=>"none");
				$BidangMinat=array("visible"=>false);
				$Tim=array("visible"=>true,"column"=>array(1,2,3,4,5,"CRUD"));
				$Laporan=array("visible"=>true,"column"=>array(1,2,3,4,5,6,7,""),"show"=>"all");
				$Saran=array("visible"=>true,"column"=>array(1,2,3,4,""),"show"=>"based on laporan");
			break;
			case 4: //Ketua Koordinator
				$Pengguna=array("visible"=>true,"column"=>array(1,2,3,4,5,6,7,""),"bidMid"=>"ket tim,anggota","hakAkses"=>"none");
				$BidangMinat=array("visible"=>false);
				$Tim=array("visible"=>true,"column"=>array(1,2,3,4,5,"CRUD"),"show"=>"based on bidMit");
				$Laporan=array("visible"=>true,"column"=>array(1,2,3,4,5,6,7,""),"show"=>"based on bidMit");
				$Saran=array("visible"=>true,"column"=>array(1,2,3,4,""),"show"=>"based on laporan");
			break;
			case 5: //Ketua Tim
				$Pengguna=array("visible"=>true,"column"=>array(1,2,3,4,5,6,7,""),"bidMid"=>"none","hakAkses"=>"none");
				$BidangMinat=array("visible"=>false);
				$Tim=array("visible"=>true,"column"=>array(1,2,3,4,5,""),"show"=>"based on bidMit");
				$Laporan=array("visible"=>true,"column"=>array(1,2,3,4,5,6,7,"CRUD"),"show"=>"based on bidMit");
				$Saran=array("visible"=>true,"column"=>array(1,2,3,4,""),"show"=>"based on laporan");
			break;
			case 6: //Anggota Tim
				$Pengguna=array("visible"=>true,"column"=>array(1,2,3,4,5,6,7,""),"bidMid"=>"none","hakAkses"=>"none");
				$BidangMinat=array("visible"=>false);
				$Tim=array("visible"=>true,"column"=>array(1,2,3,4,5,""),"show"=>"based on bidMit");
				$Laporan=array("visible"=>true,"column"=>array(1,2,3,4,5,6,7,""),"show"=>"based on bidMit");
				$Saran=array("visible"=>true,"column"=>array(1,2,3,4,""),"show"=>"based on laporan");
			break;
			case 7: //Guest
				$Profil=array("visible"=>true);
			break;
		}
		//return $
	}
}*/
?>
