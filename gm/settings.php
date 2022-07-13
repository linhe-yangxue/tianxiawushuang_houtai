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
							$db_select = mysql_select_db($roledb);
                            if(!$db_select){
                               die("连接数据库".$roledb."失败！请填写好数据库名~~~~");
                            }
							$tp = $p['tp'];
							$id = $p['id'];
							$guildWarSign = $p['guildWarSign'];
							$guildWarOpen = $p['guildWarOpen'];
							$guildWarHost = $p['guildWarHost'];
							$guildWarPort = $p['guildWarPort'];
							$redisHostArr = $p['redisHostArr'];
							$noSignServerArr = $p['noSignServerArr'];

							
$t = date("y-m-d h:m:s",time());

if($tp == 'edit'){
	$sql ="update uw_game_config set `guildWarSign` = '{$guildWarSign}',`guildWarOpen` = '{$guildWarOpen}',`guildWarHost` = '{$guildWarHost}',`guildWarPort` = '{$guildWarPort}',`redisHostArr` = '{$redisHostArr}',`noSignServerArr` = '{$noSignServerArr}' where id = {$id} limit 1";
}

$result2 = mysql_query($sql,$conn);

if($result2){
  echo '修改成功！';
}else{
  echo '修改失败';
}
@mysql_close($conn);
?>
