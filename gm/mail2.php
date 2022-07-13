<?php
include "../config.php";
date_default_timezone_set('Asia/Shanghai');
$p = $_POST;

$name = $p['name'];
$zid = $p['serverId'];

if (empty($p['title']) || empty($p['content']) ){
    echo '邮件发送失败,填写内容和标题';
    return;
}

$get_data['cmd'] = '10201';
$get_data['sign'] = 'asdfasdf';
$get_data['type'] = 'json';
$get_data['operatorid'] = '1';

$get_data['req']['zid'] = $zid;
$get_data['req']['name'] = $name;
$get_data['req']['title'] = $p['title'];
$get_data['req']['content'] = $p['content'];


$item = explode(',',$p['item']);
$emailItems = array();
$index = 0;
foreach ($item as $value){
    $str = explode(':',$value);
    $emailItems[$index]['tid'] = $str[0];
    $emailItems[$index]['name'] = $str[1];
    $emailItems[$index]['itemNum'] = $str[2];
    $index++;
}

$get_data['req']['items'] = $emailItems;


$url = 'http://106.75.7.149:8090/';
$data = json_encode($get_data);
var_dump($get_data);

$ch = curl_init(); // 启动一个CURL会话
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 40);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
$result2 = curl_exec($ch);

$result2 = json_decode($result2,true);

curl_close($ch);
if($result2['code'] == 0){
  echo '邮件发送成功！请查收';
}else{
  echo '邮件发送失败';
}

?>
