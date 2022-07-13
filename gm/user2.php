<?php
include "../config.php";
date_default_timezone_set('Asia/Shanghai');
$p = $_POST;
$roledb = $p['roledb'];

//echo $sql;
                            $conn = mysql_connect($config["DB_HOST"],$config["DB_USER"],$config["DB_PWD"],$config["DB_NAME1"]);
                           	mysql_query("set names 'utf8'");
                            if(!$conn){
                                die("连接数据库失败，请配置好config.php文件！！！");
                            }
                            //$db_select = mysql_select_db($config["DB_NAME3"]);
							$db_select = mysql_select_db($roledb);
                            if(!$db_select){
                               die("连接数据库".$roledb."失败！请填写好数据库名~~~~");
                            }
							$tp = $p['tp'];
							$uid = $p['PlatformUID'];
							$u1 = $p['gold'];#金币
							$u2 = $p['diamond'];#元宝
							$u3 = $p['lvl'];#等级 等级(不同于英雄等级)
							$u4 = $p['vip'];#VIP等级
							$u5 = $p['vipScore'];#VIP积分
							$u6 = $p['honor'];#荣誉值
							$u7 = $p['ispk']; #是否开启pk isOpenPk
							$u8 = $p['prestige'];#声望 prestige
							$u9 = $p['genuineQi'];#真气 genuineQi
							$u10 = $p['rebirthLvl'];#转生等级 rebirthLvl
							$u11 = $p['rebirthExp'];#转生经验 rebirthExp
							
$t = date("y-m-d h:m:s",time());
//if($tp == 'edit'){
//	$url = "http://139.199.183.32:8091/h5-cqsj-free.php?type=edit&uid={$uid}&u1={$u1}&u2={$u2}&u3={$u3}&u4={$u4}&u5={$u5}&u6={$u6}&u7={$u7}&u8={$u8}&u9={$u9}&u10={$u10}&u11={$u11}&key1={$config["key1"]}&key2={$config["key2"]}&ip={$config["ip"]}&t={$t}";
//}
//if($tp == 'clear'){
//	$url = "http://139.199.183.32:8091/h5-cqsj-free.php?type=clear&uid={$uid}&key1={$config["key1"]}&key2={$config["key2"]}&ip={$config["ip"]}&t={$t}";
//}
//
//$rr =file_get_contents($url);
//if($rr){
//  $sql = json_decode($rr);
//
//}else{
//
//  $sql ='';
//}
if($tp == 'edit'){
	$sql ="update uw_user set `gold` = '{$u1}',`diamond` = '{$u2}',`lvl` = '{$u3}',`vip` = '{$u4}',`vipScore` = '{$u5}',`honor` = '{$u6}',`isOpenPk` = '{$u7}',`prestige` = '{$u8}',`genuineQi` = '{$u9}',`rebirthLvl` = '{$u10}',`rebirthExp` = '{$u11}',`lastUpdateTime`='{$t}' where id = {$uid} limit 1";
}
if($tp == 'clear'){
	$sql ="update uw_user set `bag` = '',`equipBag` = '',`lastUpdateTime`='{$t}' where id = {$uid} limit 1";
}

$result2 = mysql_query($sql,$conn);

if($result2){
  echo '修改成功！请重新登录';
}else{
  echo '修改失败';
}
@mysql_close($conn);
?>