<!doctype html>
<?php
include "top.php";
include "config.php";
?>
<script type="text/javascript" src="./js/jquery-1.7.1.min.js"></script>
<script type="text/javascript">
    function query(thisObj) {
        $.post("./gm/act.php", { "t": "chongzhi",serverId: $("#serverId").val() }, function (data) {
            alert(data);
            $("#Msg").html(data);
        });
    }
    function query1(thisObj) {
        $.post("./gm/act.php", { "n": "xiaofei",serverId: $("#serverId").val() }, function (data) {
            alert(data);
            $("#Msg").html(data);
        });
    }
    function addRoll(thisObj) {
        $.post("./gm/AddRoll.php", { "t": "add" }, function (data) {
            alert(data);
            $("#Msg").html(data);
        });
    }
    function delRoll(thisObj) {
        $.post("./gm/AddRoll.php", { "t": "del" }, function (data) {
            alert(data);
            $("#Msg").html(data);
        });
    }
    function addemail(thisObj) {
        $.post("./gm/addemail.php", { "t": "add" }, function (data) {
            alert(data);
            $("#Msg").html(data);
        });
    }
    function addGift(thisObj) {
        $.post("./gm/gift.php", { "g": "xinshoulibao" }, function (data) {
            alert(data);
            $("#Msg").html(data);
        });
    }
    function addGift2(thisObj) {
        $.post("./gm/gift.php", { "g": "gaojilibao" }, function (data) {
            alert(data);
            $("#Msg").html(data);
        });
    }
    function addGift3(thisObj) {
        $.post("./gm/gift.php", { "g": "zhuanshulibao" }, function (data) {
            alert(data);
            $("#Msg").html(data);
        });
    }
    function addGift4(thisObj) {
        $.post("./gm/gift.php", { "g": "dujialibao" }, function (data) {
            alert(data);
            $("#Msg").html(data);
        });
    }
    function delGift(thisObj) {
        $.post("./gm/gift.php", { "g": "del" }, function (data) {
            alert(data);
            $("#Msg").html(data);
        });
    }
    function delRedis(thisObj) {
        $.post("./gm/redis.php", { "t": "del" }, function (data) {
            alert(data);
            $("#Msg").html(data);
        });
    }
</script>

<div class="container clearfix">
    <?php 
	 include "memu.php"
	?>
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">活动管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="result-content">
                <table class="search-tab">

                    <div class="result-title">
                        <form action="/activity.php" method="get">

                        <?php
                        $get_data['cmd'] = '10110';
                        $get_data['sign'] = 'asdfasdf';
                        $get_data['type'] = 'json';
                        $get_data['operatorid'] = '1';


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
                        curl_close($ch);
                        ?>

                            服务器ID：
                            <select class="form-control" id="serverId" name='serverId'>
                                <?php
                                foreach ($response['res']['arr'] as $value){
                                    ?>
                                    <option value = <?php echo $value['zid'];?> selected="selected" ><?php echo $value['name']?></option>
                                    <?php
                                }
                                ?>
                            </select>&nbsp;
                        </form>
                    </div>

                    <tr>
                        <td><span><input class="btn btn-primary btn2" id="sub1" value="累计充值" type="button" onclick="query()"></span>
                        </td>
                        <td><span><input class="btn btn-primary btn2" id="sub2" value="累计消费" type="button" onclick="query1()"></span>
                        </td>
                        <td><span><input class="btn btn-primary btn2" id="sub3" value="添加走马灯" type="button" onclick="addRoll()"></span>
                        </td>
                        <td><span><input class="btn btn-primary btn2" id="sub4" value="新手礼包" type="button" onclick="addGift()"></span>
                        </td>
                        <td><span><input class="btn btn-primary btn2" id="sub5" value="高级礼包" type="button" onclick="addGift2()"></span>
                        </td>
                        <td><span><input class="btn btn-primary btn2" id="sub6" value="专属礼包" type="button" onclick="addGift3()"></span>
                        </td>
                        <td><span><input class="btn btn-primary btn2" id="sub6" value="独家礼包" type="button" onclick="addGift4()"></span>
                        </td>
                        <td><span><input class="btn btn-primary btn2" id="sub7" value="删除礼包码" type="button" onclick="delGift()"></span>
                        </td>
                        <td><span><input class="btn btn-primary btn2" id="sub8" value="删除走马灯" type="button" onclick="delRoll()"></span>
                        </td>
                        <td><span><input class="btn btn-primary btn2" id="sub9" value="删除redisKeys" type="button" onclick="delRedis()"></span>
                        </td>
                    </tr>
                </table>
                <div class="Msg"></div>
            </div>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>
