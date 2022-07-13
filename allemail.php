<?php
include "top.php"
?>
<script type="text/javascript" src="./js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" >
    function Pay2()
    {
        $.ajaxSetup({
            contentType: "application/x-www-form-urlencoded; charset=utf-8"
        });
        $.post("./gm/pay2.php", {serverId:$("#serverId").val(),tile:$("#tile").val(),name:$("#name").val(),items:$("#items").val()},function(data)
            {
                $("#divMsg").html(data);
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
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">充值管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <table class="search-tab">

                    <div class="result-title">

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

<!--                        服务器ID：-->
<!--                        <select class="form-control" id="serverId" name='serverId'>-->
<!--                            <option value = '0' <>选择服务器</option>-->
<!--                            <option value = '4' <>不动如山</option>-->
<!--                            <option value = '5' <>倩女幽魂</option>-->
<!--                            <option value = '3' <>侵掠如火</option>-->
<!--                            <option value = '2' <>其徐如林</option>-->
<!--                            <option value = '1' <>其疾如风</option>-->
<!--                        </select>&nbsp;-->
                    </div>

                    <tr><td>邮件标题:<input class="common-text" value="全服邮件" name="tile"  id="tile" type="text" ></td></tr>
                    <tr><td>邮件内容:<input class="common-text" value="返利道具" name="name"  id="name"  type="text" ></td></tr>
                    <tr><td>邮件道具:<input class="common-text" value="银币:1000002:100,元宝:1000001:100" name="items"  id="items"  type="text" size="50">名称：ID：数量</td></tr>
                    <tr>
                        <td><input class="btn btn-primary btn2" id="sub" value="执行" type="button" onclick="Pay2()"></td>
                    </tr>
                </table>

                <div  id="divMsg"> </div>
            </div>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>
