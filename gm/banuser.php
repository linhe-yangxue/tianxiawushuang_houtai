<?php
include "../config.php";
date_default_timezone_set('Asia/Shanghai');
$p = $_POST;


$get_data['cmd'] = '10002';
$get_data['sign'] = 'asdfasdf';
$get_data['type'] = 'json';
$get_data['operatorid'] = '1';

$get_data['req']['zid'] = $p['serverId'];
$get_data['req']['name'] = $p['name'];
$get_data['req']['beginTime'] = strtotime($p['bendExpireAt']);
$get_data['req']['endTime'] = strtotime($p['endExpireAt']);
$get_data['req']['reason'] = $p['bendType'];


$url = 'http://106.75.7.149:8090/';
$data = json_encode($get_data);

$ch = curl_init(); // 启动一个CURL会话
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 40);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

$response = curl_exec($ch);
curl_close($ch);
$result2 = json_decode($response,true);

if($result2['code'] == 0){
    echo '发送成功';

}else{
    echo '发送失败';
}

?>
