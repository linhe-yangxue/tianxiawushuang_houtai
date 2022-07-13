<?php 
session_start();
include "config.php";
// include "debug.php";
// include "helper.php";

$act = $_GET['action'];
$user = $_POST['username'];
$pass = $_POST['pwd'];

if("login" == $act){
    var_dump($config);
    var_dump($pass);
    var_dump($user);
	if($user == $config["ADMIN_USER"] & $pass == $config["ADMIN_PASS"] ){
		$_SESSION['admin'] = 1;
		$_SESSION['user'] = "admin";
		header("location: first.php");
		// locate('first.php');
	}
	else{
		 echo "不是自己人进不去！";
//        $_SESSION['admin'] = 1;
//        $_SESSION['user'] = "admin";
//        header("location: first.php");
		header("location: index.php");

	}
}

if("logout" == $act){
	$_SESSION['admin'] = 0;
	$_SESSION['user'] = "";
	header("location: index.php");
}

if("userlogin" == $act){
	$conn = mysql_connect($config["DB_HOST"],$config["DB_USER"],$config["DB_PWD"]);
    mysql_query("set names 'utf8'");
    if(!$conn){
        die("连接数据库失败，请配置好config.php文件！！！");
    }
    $db_select = mysql_select_db($config["DB_NAME1"]);
    if(!$db_select){
        die("连接数据库".$config["DB_NAME1"]."失败！请填写好数据库名~~~~");
    }

	$sql = "SELECT COUNT(*) AS COUNT, userId from user WHERE userName='".$user."' and passWord='".$pass."' and gm = 1";
	$result = mysql_query($sql);
	$field = mysql_fetch_object($result);
	if ($field->COUNT != 1) {
		$arr = array('code'=>1,'errmsg'=>'登录失败,密码错误');
		@mysql_close($conn);
		header("location: user.php");
	}
	else {
		$_SESSION['user'] = $user;
        @mysql_close($conn);
		header("location: user_gm.php");
	}
}

?>