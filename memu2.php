<?php
include "../config.php";
date_default_timezone_set('Asia/Shanghai');

//echo $sql;
$y2r = array(
    "10"=>0,
    "11"=>6,
    "12"=>100,
    "13"=>300,
    "14"=>500,
    "15"=>1000,
    "16"=>2000,
    "17"=>3000,
    "18"=>4000,
    "19"=>6000,
    "20"=>8000,
    "21"=>10000,
);
 $conn = mysql_connect($config["DB_HOST"],$config["DB_USER"],$config["DB_PWD"],$config["DB_NAME1"]);
 if(!$conn){
     die("连接数据库失败，请配置好config.php文件！！！");
 }
 mysql_query("set names 'utf8'");
 $total = 0;
 $dbcount=20;
 for($i=1; $i <=$dbcount;$i++)
 {
     $dbname = 'chuanqi_rexue'.$i;
     $db_select = mysql_select_db($dbname);
     if(!$db_select){
         @mysqli_close($conn);
         die("连接数据库".$dbname."失败！请填写好数据库名~~~~");
     }
#     $sql = 'select vip, count(*) as num from uw_user where vip > 10 and vipScore > 0 group by vip';

$sql="SELECT SUM(payMoney) as num FROM `uw_recharge` WHERE char_length(transId) > 10";

     $result = mysql_query($sql,$conn);
     $row = mysql_fetch_array($result);
     echo "rexue_{$i}=" .$row['num']. "  <br/>";
     $total = $total + intval($row['num']);
 }
 echo '累积收入' . $total . '(根据充值金额计算)';

@mysql_close($conn);
?>
