<?php
include "../config.php";
date_default_timezone_set('Asia/Shanghai');
$p = $_POST;


if($p['t'] == "add"){

    $get_data['cmd'] = '10305';
    $get_data['sign'] = 'asdfasdf';
    $get_data['type'] = 'json';
    $get_data['operatorid'] = '1';


    $get_data['req']['zid'] = $p['serverId'];
    $get_data['req']['newName'] = $p['sname'];
    $get_data['req']['newState'] =$p['sstatus'];
    $get_data['req']['type'] = 1;
    $get_data['req']['openDate'] = $p['serverDate'];
    $get_data['req']['maxRegister'] = '8000';

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
    echo $response;

}

if($p['t'] == "xg"){

}

if($p['t'] == "del"){

    $get_data['cmd'] = '10305';
    $get_data['sign'] = 'asdfasdf';
    $get_data['type'] = 'json';
    $get_data['operatorid'] = '1';

    $get_data['req']['zid'] = $p['zid'];
    $get_data['req']['newName'] = '';
    $get_data['req']['newState'] ='1';
    $get_data['req']['type'] = 0;
    $get_data['req']['openDate'] = '2019-04-09';
    $get_data['req']['maxRegister'] = '5000';

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
    echo $response;
}

?>