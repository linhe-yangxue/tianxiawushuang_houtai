<?php

date_default_timezone_set('Asia/Shanghai');
$p = $_POST;

if($p['n'] == "xiaofei"){

    $get_data['cmd'] = '10308';
    $get_data['sign'] = 'asdfasdf';
    $get_data['type'] = 'json';
    $get_data['operatorid'] = '1';

    $get_data['req']['zid'] = $p['serverId'];
    $get_data['req']['aid'] = '2';  //活动ID
    $get_data['req']['beginTime'] = '1586933683';
    $get_data['req']['endTime'] = '1587797683';
    $get_data['req']['endAwardTime'] = '1587797683';

    $items0 = array(

        0 => array(
            'tid' => '2000010',
            'itemNum' => '2',
        ),
        1 => array(
            'tid' => '2000018',
            'itemNum' => '2',
        ),
        2 => array(
            'tid' => '2000008',
            'itemNum' => '2',
        ),
        3 => array(
            'tid' => '1000002',
            'itemNum' => '5',
        ),
        4 => array(
            'tid' => '1000004',
            'itemNum' => '2',
        ),
    );

    $items1 = array(

        0 => array(
            'tid' => '2000015',
            'itemNum' => '5',
        ),
        1 => array(
            'tid' => '15202',
            'itemNum' => '5',
        ),
        2 => array(
            'tid' => '2000206',
            'itemNum' => '1',
        ),
        3 => array(
            'tid' => '2000209',
            'itemNum' => '1',
        ),
        4 => array(
            'tid' => '2000213',
            'itemNum' => '1',
        ),
    );

    $items2 = array(

        0 => array(
            'tid' => '14201',
            'itemNum' => '1',
        ),
        1 => array(
            'tid' => '15203',
            'itemNum' => '6',
        ),
        2 => array(
            'tid' => '1000008',
            'itemNum' => '10',
        ),
        3 => array(
            'tid' => '2000913',
            'itemNum' => '2',
        ),
        4 => array(
            'tid' => '2000918',
            'itemNum' => '2',
        ),
    );

    $items3 = array(

        0 => array(
            'tid' => '2000007',
            'itemNum' => '50',
        ),
        1 => array(
            'tid' => '14305',
            'itemNum' => '1',
        ),
        2 => array(
            'tid' => '2000211',
            'itemNum' => '2',
        ),
        3 => array(
            'tid' => '2000013',
            'itemNum' => '5',
        ),
        4 => array(
            'tid' => '2000008',
            'itemNum' => '10',
        ),
    );
    $items4 = array(

        0 => array(
            'tid' => '2000002',
            'itemNum' => '100',
        ),
        1 => array(
            'tid' => '15102',
            'itemNum' => '5',
        ),
        2 => array(
            'tid' => '15103',
            'itemNum' => '8',
        ),
        3 => array(
            'tid' => '15105',
            'itemNum' => '5',
        ),
        4 => array(
            'tid' => '30104',
            'itemNum' => '5',
        ),
    );
    $items5 = array(

        0 => array(
            'tid' => '14104',
            'itemNum' => '8',
        ),
        1 => array(
            'tid' => '14304',
            'itemNum' => '8',
        ),
        2 => array(
            'tid' => '2000009',
            'itemNum' => '30',
        ),
        3 => array(
            'tid' => '30104',
            'itemNum' => '5',
        ),
        4 => array(
            'tid' => '30101',
            'itemNum' => '5',
        ),
    );

    $items6 = array(

        0 => array(
            'tid' => '2000002',
            'itemNum' => '50',
        ),
        1 => array(
            'tid' => '1000004',
            'itemNum' => '50',
        ),
        2 => array(
            'tid' => '2000208',
            'itemNum' => '5',
        ),
        3 => array(
            'tid' => '2000010',
            'itemNum' => '20',
        ),
        4 => array(
            'tid' => '1000002',
            'itemNum' => '1000',
        ),
    );

    $items7 = array(

        0 => array(
            'tid' => '2000213',
            'itemNum' => '1',
        ),
        1 => array(
            'tid' => '2000014',
            'itemNum' => '80',
        ),
        2 => array(
            'tid' => '2000212',
            'itemNum' => '1',
        ),
        3 => array(
            'tid' => '2000007',
            'itemNum' => '80',
        ),
        4 => array(
            'tid' => '30070',
            'itemNum' => '8',
        ),
    );

    $items8 = array(

        0 => array(
            'tid' => '2000210',
            'itemNum' => '5',
        ),
        1 => array(
            'tid' => '2000208',
            'itemNum' => '1',
        ),
        2 => array(
            'tid' => '2000201',
            'itemNum' => '2',
        ),
        3 => array(
            'tid' => '2000003',
            'itemNum' => '80',
        ),
        4 => array(
            'tid' => '2000214',
            'itemNum' => '2',
        ),
    );

    $items9 = array(

        0 => array(
            'tid' => '2000920',
            'itemNum' => '2',
        ),
        1 => array(
            'tid' => '2000205',
            'itemNum' => '10',
        ),
        2 => array(
            'tid' => '2000002',
            'itemNum' => '300',
        ),
        3 => array(
            'tid' => '2000204',
            'itemNum' => '1',
        ),
        4 => array(
            'tid' => '2000208',
            'itemNum' => '5',
        ),
    );

    $user = array(
        0 => array(
            'rmbNum'    => "30000",
            'items'  => $items0,
        ),
        1 => array(
            'rmbNum'    => "50000",
            'items'  => $items1,
        ),
        2 => array(
            'rmbNum'    => "100000",
            'items'  => $items2,
        ),
        3 => array(
            'rmbNum'    => "150000",
            'items'  => $items3,
        ),
        4 => array(
            'rmbNum'    => "300000",
            'items'  => $items4,
        ),
        5 => array(
            'rmbNum'    => "450000",
            'items'  => $items5,
        ),
        6 => array(
            'rmbNum'    => "800000",
            'items'  => $items6,
        ),
        7 => array(
            'rmbNum'    => "1000000",
            'items'  => $items7,
        ),
        8 => array(
            'rmbNum'    => "1500000",
            'items'  => $items8,
        ),
        9 => array(
            'rmbNum'    => "2500000",
            'items'  => $items9,
        ),
    );
    $get_data['req']['chargeAward'] = $user;

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

if($p['t'] == "chongzhi"){

    $get_data['cmd'] = '10308';
    $get_data['sign'] = 'asdfasdf';
    $get_data['type'] = 'json';
    $get_data['operatorid'] = '1';

    $get_data['req']['zid'] = $p['serverId'];

    $get_data['req']['aid'] = '1';  //活动ID

    $get_data['req']['beginTime'] = '1586933683';
    $get_data['req']['endTime'] = '1587797683';
    $get_data['req']['endAwardTime'] = '1587797683';

    $items0 = array(

        0 => array(
            'tid' => '2000013',
            'itemNum' => '5',
        ),
        1 => array(
            'tid' => '2000004',
            'itemNum' => '5',
        ),
        2 => array(
            'tid' => '2000008',
            'itemNum' => '5',
        ),
        3 => array(
            'tid' => '2000003',
            'itemNum' => '5',
        ),
        4 => array(
            'tid' => '2000007',
            'itemNum' => '5',
        ),
    );

    $items1 = array(

        0 => array(
            'tid' => '16306',
            'itemNum' => '10',
        ),
        1 => array(
            'tid' => '2000002',
            'itemNum' => '50',
        ),
        2 => array(
            'tid' => '2000013',
            'itemNum' => '10',
        ),
        3 => array(
            'tid' => '2000209',
            'itemNum' => '5',
        ),
        4 => array(
            'tid' => '2000213',
            'itemNum' => '2',
        ),
    );

    $items2 = array(

        0 => array(
            'tid' => '2000204',
            'itemNum' => '1',
        ),
        1 => array(
            'tid' => '2000014',
            'itemNum' => '50',
        ),
        2 => array(
            'tid' => '30305',
            'itemNum' => '10',
        ),
        3 => array(
            'tid' => '2000209',
            'itemNum' => '5',
        ),
        4 => array(
            'tid' => '2000008',
            'itemNum' => '20',
        ),
    );

    $items3 = array(

        0 => array(
            'tid' => '30118',
            'itemNum' => '3',
        ),
        1 => array(
            'tid' => '2000209',
            'itemNum' => '20',
        ),
        2 => array(
            'tid' => '2000211',
            'itemNum' => '5',
        ),
        3 => array(
            'tid' => '15202',
            'itemNum' => '5',
        ),
        4 => array(
            'tid' => '2000915',
            'itemNum' => '2',
        ),
    );
    $items4 = array(

        0 => array(
            'tid' => '30094',
            'itemNum' => '3',
        ),
        1 => array(
            'tid' => '2000002',
            'itemNum' => '200',
        ),
        2 => array(
            'tid' => '15203',
            'itemNum' => '50',
        ),
        3 => array(
            'tid' => '2000008',
            'itemNum' => '10',
        ),
        4 => array(
            'tid' => '2000208',
            'itemNum' => '10',
        ),
    );
    $items5 = array(

        0 => array(
            'tid' => '30095',
            'itemNum' => '3',
        ),
        1 => array(
            'tid' => '2000008',
            'itemNum' => '60',
        ),
        2 => array(
            'tid' => '30305',
            'itemNum' => '50',
        ),
        3 => array(
            'tid' => '2000214',
            'itemNum' => '10',
        ),
        4 => array(
            'tid' => '2000211',
            'itemNum' => '30',
        ),
    );

    $items6 = array(

        0 => array(
            'tid' => '30107',
            'itemNum' => '4',
        ),
        1 => array(
            'tid' => '2000002',
            'itemNum' => '1000',
        ),
        2 => array(
            'tid' => '2000214',
            'itemNum' => '50',
        ),
        3 => array(
            'tid' => '15002',
            'itemNum' => '50',
        ),
        4 => array(
            'tid' => '2000916',
            'itemNum' => '3',
        ),
    );

    $items7 = array(

        0 => array(
            'tid' => '2000008',
            'itemNum' => '2000',
        ),
        1 => array(
            'tid' => '14104',
            'itemNum' => '10',
        ),
        2 => array(
            'tid' => '14107',
            'itemNum' => '10',
        ),
        3 => array(
            'tid' => '14009',
            'itemNum' => '50',
        ),
        4 => array(
            'tid' => '2000211',
            'itemNum' => '100',
        ),
    );

    $items8 = array(

        0 => array(
            'tid' => '2000008',
            'itemNum' => '5000',
        ),
        1 => array(
            'tid' => '15002',
            'itemNum' => '80',
        ),
        2 => array(
            'tid' => '15005',
            'itemNum' => '80',
        ),
        3 => array(
            'tid' => '2000013',
            'itemNum' => '120',
        ),
        4 => array(
            'tid' => '2000205',
            'itemNum' => '50',
        ),
    );

    $items9 = array(

        0 => array(
            'tid' => '2000002',
            'itemNum' => '10000',
        ),
        1 => array(
            'tid' => '14207',
            'itemNum' => '100',
        ),
        2 => array(
            'tid' => '14306',
            'itemNum' => '100',
        ),
        3 => array(
            'tid' => '15103',
            'itemNum' => '100',
        ),
        4 => array(
            'tid' => '15102',
            'itemNum' => '100',
        ),
    );

    $items10 = array(

        0 => array(
            'tid' => '14105',
            'itemNum' => '300',
        ),
        1 => array(
            'tid' => '15004',
            'itemNum' => '300',
        ),
        2 => array(
            'tid' => '15105',
            'itemNum' => '350',
        ),
        3 => array(
            'tid' => '15202',
            'itemNum' => '400',
        ),
        4 => array(
            'tid' => '15106',
            'itemNum' => '200',
        ),
    );

    $user = array(
        0 => array(
            'rmbNum'    => "10",
            'items'  => $items0,
        ),
        1 => array(
            'rmbNum'    => "50",
            'items'  => $items1,
        ),
        2 => array(
            'rmbNum'    => "100",
            'items'  => $items2,
        ),
        3 => array(
            'rmbNum'    => "300",
            'items'  => $items3,
        ),
        4 => array(
            'rmbNum'    => "500",
            'items'  => $items4,
        ),
        5 => array(
            'rmbNum'    => "1000",
            'items'  => $items5,
        ),
        6 => array(
            'rmbNum'    => "2000",
            'items'  => $items6,
        ),
        7 => array(
            'rmbNum'    => "3000",
            'items'  => $items7,
        ),
        8 => array(
            'rmbNum'    => "5000",
            'items'  => $items8,
        ),
        9 => array(
            'rmbNum'    => "10000",
            'items'  => $items9,
        ),
        10 => array(
            'rmbNum'    => "30000",
            'items'  => $items10,
        ),
    );
    $get_data['req']['chargeAward'] = $user;

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