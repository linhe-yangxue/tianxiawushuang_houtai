<?php
include "../config.php";
date_default_timezone_set('Asia/Shanghai');
$p = $_POST;

//echo $sql;
                            $conn = mysql_connect($config["DB_HOST"],$config["DB_USER"],$config["DB_PWD"],$config["DB_NAME1"]);
                           mysql_query("set names 'utf8'");
                            if(!$conn){
                                die("连接数据库失败，请配置好config.php文件！！！");
                            }
                            $db_select = mysql_select_db($config["DB_NAME3"]);
                            if(!$db_select){
                               die("连接数据库".$config["DB_NAME3"]."失败！请填写好数据库名~~~~");
                            }
							$tp = $p['tp'];
							$uid = $p['PlatformUID'];
							$u1 = $p['gold'];
							$u2 = $p['diamond'];
							$u3 = $p['lvl'];
							$u4 = $p['vip'];
							$u5 = $p['vipScore'];
							$u6 = $p['honor'];
							$u7 = $p['ispk'];
							$u8 = $p['prestige'];
							$u9 = $p['genuineQi'];
							$u10 = $p['rebirthLvl'];
							$u11 = $p['rebirthExp'];
							
$t = time();
if($tp == 'edit'){
	$url = "http://139.199.183.32:8091/h5-cqsj-free.php?type=edit&uid={$uid}&u1={$u1}&u2={$u2}&u3={$u3}&u4={$u4}&u5={$u5}&u6={$u6}&u7={$u7}&u8={$u8}&u9={$u9}&u10={$u10}&u11={$u11}&key1={$config["key1"]}&key2={$config["key2"]}&ip={$config["ip"]}&t={$t}";
}
if($tp == 'clear'){
	$url = "http://139.199.183.32:8091/h5-cqsj-free.php?type=clear&uid={$uid}&key1={$config["key1"]}&key2={$config["key2"]}&ip={$config["ip"]}&t={$t}";
}

$rr =file_get_contents($url);
if($rr){
  $sql = json_decode($rr);

}else{
 
  $sql ='';
}

$result2 = mysql_query($sql,$conn);

if($result2){
  echo '修改成功！,请重新登录';
}else{
  echo '修改失败';
}
@mysql_close($conn);
?>