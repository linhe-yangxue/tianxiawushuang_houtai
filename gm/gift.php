<?php
include "../config.php";
include "../debug.php";

date_default_timezone_set('Asia/Shanghai');
$p = $_POST;

if($p['g'] == "xinshoulibao"){

    $get_data['cmd'] = '10107';
    $get_data['sign'] = 'asdfasdf';
    $get_data['type'] = 'json';
    $get_data['operatorid'] = '1';

    $get_data['req']['giftType'] = '1';
    $get_data['req']['useMax'] = '1';
    $get_data['req']['name'] = '新手礼包';
    $get_data['req']['codeNum'] = '5000';
    $get_data['req']['media'] = '通用';

    $get_data['req']['beginTime'] = '1516313451';
    $get_data['req']['endTime'] = '1831846251';

    $items0 = array(

        0 => array(
            'tid' => '2000002',
            'name' => '突破石',
            'itemNum' => '10',
        ),
        1 => array(
            'tid' => '2000013',
            'name' => '体力丹',
            'itemNum' => '5',
        ),
        2 => array(
            'tid' => '2000008',
            'name' => '技能秘籍',
            'itemNum' => '5',
        ),
    );


    $get_data['req']['items'] = $items0;
    $get_data['req']['description'] = '突破石*10,体力丹*5,技能秘籍*5';
    $get_data['req']['channelId'] = '10001';

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

if($p['g'] == "gaojilibao"){

    $get_data['cmd'] = '10107';
    $get_data['sign'] = 'asdfasdf';
    $get_data['type'] = 'json';
    $get_data['operatorid'] = '1';

    $get_data['req']['giftType'] = '2';
    $get_data['req']['useMax'] = '1';
    $get_data['req']['name'] = '高级礼包';
    $get_data['req']['codeNum'] = '3000';
    $get_data['req']['media'] = '通用';

    $get_data['req']['beginTime'] = '1516313451';
    $get_data['req']['endTime'] = '1831846251';

    $items0 = array(

        0 => array(
            'tid' => '1000001',
            'name' => '元宝',
            'itemNum' => '1000',
        ),
        1 => array(
            'tid' => '2000013',
            'name' => '体力丹',
            'itemNum' => '10',
        ),
        2 => array(
            'tid' => '2000002',
            'name' => '突破石',
            'itemNum' => '50',
        ),
    );


    $get_data['req']['items'] = $items0;
    $get_data['req']['description'] = '元宝*1000,体力丹*10,突破石*50';
    $get_data['req']['channelId'] = '10001';

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

if($p['g'] == "zhuanshulibao"){

    $get_data['cmd'] = '10107';
    $get_data['sign'] = 'asdfasdf';
    $get_data['type'] = 'json';
    $get_data['operatorid'] = '1';

    $get_data['req']['giftType'] = '3';
    $get_data['req']['useMax'] = '1';
    $get_data['req']['name'] = '至尊礼包';
    $get_data['req']['codeNum'] = '3000';
    $get_data['req']['media'] = '通用';

    $get_data['req']['beginTime'] = '1516313451';
    $get_data['req']['endTime'] = '1831846251';

    $items0 = array(

        0 => array(
            'tid' => '2000011',
            'name' => '金符令',
            'itemNum' => '5',
        ),
        1 => array(
            'tid' => '2000007',
            'name' => '极品精炼仙露',
            'itemNum' => '10',
        ),
        2 => array(
            'tid' => '2000008',
            'name' => '技能秘籍',
            'itemNum' => '5',
        ),
    );

    $get_data['req']['items'] = $items0;
    $get_data['req']['description'] = '金符令*5,极品精炼仙露*10,技能秘籍*5';
    $get_data['req']['channelId'] = '10001';

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

if($p['g'] == "dujialibao"){

    $get_data['cmd'] = '10107';
    $get_data['sign'] = 'asdfasdf';
    $get_data['type'] = 'json';
    $get_data['operatorid'] = '1';

    $get_data['req']['giftType'] = '2';
    $get_data['req']['useMax'] = '1';
    $get_data['req']['name'] = '独家礼包';
    $get_data['req']['codeNum'] = '3000';
    $get_data['req']['media'] = '通用';

    $get_data['req']['beginTime'] = '1516313451';
    $get_data['req']['endTime'] = '1831846251';


    $items0 = array(

        0 => array(
            'tid' => '1000002',
            'name' => '银币',
            'itemNum' => '200000',
        ),
        1 => array(
            'tid' => '2000013',
            'name' => '体力丹',
            'itemNum' => '20',
        ),
        2 => array(
            'tid' => '2000010',
            'name' => '银符令',
            'itemNum' => '5',
        ),
        3 => array(
            'tid' => '2000011',
            'name' => '金符令',
            'itemNum' => '5',
        ),
    );

    $get_data['req']['items'] = $items0;
    $get_data['req']['description'] = '银币*200000,体力丹*20,银符令*5,金符令*5';
    $get_data['req']['channelId'] = '10001';

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




if($p['g'] == "del"){

    $get_data['cmd'] = '10109';
    $get_data['sign'] = 'asdfasdf';
    $get_data['type'] = 'json';
    $get_data['operatorid'] = '1';

    $get_data['req']['agid'] = '3';

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