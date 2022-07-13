<?php
include "../config.php";
include "../debug.php";

date_default_timezone_set('Asia/Shanghai');

$p = $_POST;

$get_data['cmd'] = '10203';
$get_data['sign'] = 'asdfasdf';
$get_data['type'] = 'json';
$get_data['operatorid'] = '1';

$get_data['req']['zid'] = $p['serverId'];


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
    echo '清理成功！请查收';

}else{
    echo '清理失败';
}

