<?php
if(!function_exists("customError")){
	function customError($errorLevel,$errorMsg,$parser){
	 @session_start();
	 $_SESSION['error_msg'] = $errorMsg;
	 error_log("\n\r".$errorMsg."|".$erorLevel."|".$parser.(isset($_SESSION['user_id'])?"|user=$_SESSION[user_id]":"").(isset($_SERVER['PHP_SELF'])?"|PHP_SELF=$_SERVER[PHP_SELF]":"").(isset($_SERVER['QUERY_STRING'])?"|QUERY_STRING=$_SERVER[QUERY_STRING]":""),3,'logs/error.log');
	 header("Location: error.php");
	 exit;
	}
}
//set_error_handler("customError");
//error_reporting(E_ALL);
	$db_host="localhost";
	$db_user="root";
	$db_pass="";
	$db_name="futsalrek";
	$base_url='';
	$con=mysqli_connect($db_host,$db_user,$db_pass,$db_name) or die("Tidak bisa melakukan koneksi ke database");
	//session_id("a");
	session_start();

?>
