<?php
/**
 * Created by PhpStorm.
 * User: chenyongshuai
 * Date: 2019/1/25
 * Time: 下午2:36
 */
date_default_timezone_set('Asia/Shanghai');
$p = $_POST;

if($p['t'] == "add"){

    $get_data['cmd'] = '10102';
    $get_data['sign'] = 'asdfasdf';
    $get_data['type'] = 'json';
    $get_data['operatorid'] = '1';

    $get_data['req']['rollid'] = '3';
    $get_data['req']['content'] = '123456';
    $get_data['req']['playInterval'] = '33800';
    $get_data['req']['playCount'] = '100';
    $get_data['req']['beginTime'] = '1554094118';


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

if($p['t'] == "del"){

    $get_data['cmd'] = '10103';
    $get_data['sign'] = 'asdfasdf';
    $get_data['type'] = 'json';
    $get_data['operatorid'] = '1';

    $get_data['req']['rollid'] = '12';

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




