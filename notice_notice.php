<!doctype html>
<?php
include "top.php";
include "config.php";
?>

<script type="text/javascript" src="./js/jquery-1.7.1.min.js"></script>
<script type="text/javascript">

    function xg() {
        $.ajaxSetup({
            contentType: "application/x-www-form-urlencoded; charset=utf-8"
        });
        $.post("./gm/nn.php", {
                ntitle: $("#ntitle").val(),
                annid: $("#annid").val(),
                ncontent: $("#ncontent").val(),
                t: 'xg'
            }, function (data) {
                alert(data);
                $("#Msg").html(data);
                //history.go(-1);
            }
        );
    }

    function add() {
        $.ajaxSetup({
            contentType: "application/x-www-form-urlencoded; charset=utf-8"
        });
        $.post("./gm/nn.php", {
                ntitle: $("#ntitle").val(),
                annid: $("#annid").val(),
            ncontent: $("#ncontent").val(),
                t: 'add'
            }, function (data) {
                alert(data);
                $("#Msg").html(data);
//                history.go('notice_notice.php');
            }
        );
    }

    function del() {
        $.ajaxSetup({
            contentType: "application/x-www-form-urlencoded; charset=utf-8"
        });
        $.post("./gm/nn.php", {t: 'del'}, function (data) {
                alert(data);
                location.reload();
            }
        );
    }
</script>
<div class="container clearfix">
    <?php
        include "memu.php"
    ?>
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="#">首页</a><span
                        class="crumb-step">&gt;</span><span class="crumb-name">系统公告</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <table class="search-tab">

                    <?php

                    $get_data['cmd'] = '10104';
                    $get_data['sign'] = 'asdfasdf';
                    $get_data['type'] = 'json';
                    $get_data['operatorid'] = '1';

                    $get_data['req']['channelId'] = '74';

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
                    $response = json_decode($response,true);

                    if ($response['code'] != 0) return;
                    $Info = $response['res'];

                    $data = $Info['arr'][0];
                    curl_close($ch);

                    ?>
                    <tr>
                        <td>
                            标题：<input class="common-text" value="<?php echo $data['title'];?>" name="ntitle" id="ntitle" type="text" size="50">
                        </td>
                    </tr>
                    <td>
                        活动ID：<input class="common-text" value="<?php echo $data['annid'];?>" name="annid" id="annid" type="text" size="3" >
                    </td>
                    <tr>
                        <td>
                            内容：
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <textarea class="common-text" name="ncontent" id="ncontent" style="margin: 0px; width: 900px; height: 172px;"><?php echo stripcslashes($data['content']); ?></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <span><input class="btn btn-primary btn2" id="sub1" value="修改公告" type="button" onclick="xg()"></span>
                            <span><input class="btn btn-primary btn2" id="sub2" value="添加公告" type="button" onclick="add()"></span>
                            <span><input class="btn btn-primary btn2" id="sub3" value="删除公告" type="button" onclick="del()"></span>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>