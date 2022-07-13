<?php
include "../config.php";
date_default_timezone_set('Asia/Shanghai');
$p = $_POST;

if(isset($p['nsort']) && strlen($p['nsort']) > 0)
{

}
else
{
    $p['nsort'] = 0;
}
if(isset($p['ntitle']) && strlen($p['ntitle']) > 0)
{
    $p['ntitle'] = addslashes($p['ntitle']);
}

if(isset($p['ncontent']) && strlen($p['ncontent']) > 0)
{
    $p['ncontent'] = addslashes($p['ncontent']);

}

if($p['t'] == "add"){

//    $get_data = array ("cmd" => "10105",
//                         "operatorid" => "1",
//                         "sign" => "xxx",
//                         "type" => 'json',
//                         "req" => array(
//                                        "channelId" => '10001',
//                                        "arr" => array('content' => '欢迎来到小师叔','title' => '小师妹')
//                                    ),
//                        );

    $get_data['cmd'] = '10105';
    $get_data['sign'] = 'asdfasdf';
    $get_data['type'] = 'json';
    $get_data['operatorid'] = '1';
    $get_data['req']['channelId'] = '74';

    $user = array(
        0 => array(
            'annid'     =>$p['annid'] ,
            'content'   => $p['ncontent'],
            'title'     => $p['ntitle'],
        ),
    );
    $get_data['req']['arr'] = $user;

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

    $response = json_decode($response,true);
    if($response['code'] == 0){
        echo '修改成功';

    }else{
        echo '修改失败';
    }

}

if($p['t'] == "xg"){


    $get_data['cmd'] = '10116';
    $get_data['sign'] = 'asdfasdf';
    $get_data['type'] = 'json';
    $get_data['operatorid'] = '1';
    $get_data['req']['channelId'] = '10001';

    $user = array(
        0 => array(
            'annid'     =>$p['annid'] ,
            'content'   => $p['ncontent'],
            'title'     => $p['ntitle'],
        ),
    );

    $get_data['req']['arr'] = $user;

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

    $response = json_decode($response,true);
    var_dump($response);
    if($response['code'] == 0){
        echo '修改成功';

    }else{
        echo '修改失败';
    }

}

if($p['t'] == "del"){

    $get_data['cmd'] = '10106';
    $get_data['sign'] = 'asdfasdf';
    $get_data['type'] = 'json';
    $get_data['operatorid'] = '1';
    $get_data['req']['channelId'] = '74';
    $get_data['req']['annid'] = '2';

    $url = 'http://106.75.7.149:8090/';
    $data = json_encode($get_data);

    var_dump($url);


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


