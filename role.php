<!doctype html>
<?php
include "top.php";
include "config.php";
?>

<div class="container clearfix">
    <?php 
	 include "memu.php"
	?>
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">角色管理</span></div>
        </div>

        <div class="result-wrap">

<!--                <div class="result-title">-->
<!--                    <form action="/role.php" method="get">-->
<!--                        &nbsp;角色信息：<input type="text" id="acc" name="acc" style="width: 300px" value="">&nbsp;<input type="submit" value = "查 询">（角色名:服务器ID）-->
<!--                    </form>-->
<!--                </div>-->

                <div class="result-title">
                    <form action="/role.php" method="get">

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

                        角色信息：<input type="text" id="acc" name="acc"style="width: 200px" value="<?php echo isset($_GET['serverId'])?trim($_GET['acc']) : ""; ?>">&nbsp;<input type="submit" value = "查 询">（角色名）
                    </form>
                </div>

                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th>名字</th>
                            <th>银币</th>
                            <th>元宝</th>
                            <th>符魂</th>
                            <th>声望</th>
							<th>vip等级</th>
							<th>战斗力</th>
							<th>等级</th>
                            <th>最后登陆时间</th>
                            <th>公会贡献</th>
                            <th>体力</th>
                            <th>精力</th>
                            <th>降魔令</th>
                            <th>宗门ID</th>
                            <th>充值金额</th>
                        </tr>
                        <?php


                            $acc = $_GET['acc'];
                            $serverId = $_GET['serverId'];
                            if (empty($acc[0])) return;

                            $get_data['cmd'] = '10007';
                            $get_data['sign'] = 'asdfasdf';
                            $get_data['type'] = 'json';
                            $get_data['operatorid'] = '1';

                            //$get_data['req']['acc'] = '';
                            $get_data['req']['name'] = $acc;
                            $get_data['req']['zid'] = $serverId;

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

                            $playerInfo = $response['res'];

                            $lastLoginTime = date("Y-m-d H:i",$playerInfo['lastLoginTime']);
                            curl_close($ch);

                            //var_dump($playerInfo);

                        ?>
				        <tr><td colspan = '17' align='center'></tr>
                        <tr>
                            <td id="playerName" name="playerName"><?php echo $playerInfo['name'];?></td>
                            <td id="gold" name="gold"><?php echo $playerInfo['gold'];?></td>
                            <td id="diamond" name="diamond"><?php echo $playerInfo['diamond'];?></td>
                            <td id="soulPoint" name="soulPoint"><?php echo $playerInfo['soulPoint'];?></td>
                            <td id="reputation" name="reputation"><?php echo $playerInfo['reputation'];?></td>
                            <td id="vipLevel" name="vipLevel"><?php echo $playerInfo['vipLevel'];?></td>
                            <td id="power" name="power"><?php echo $playerInfo['power'];?></td>
                            <td id="level" name="level"><?php echo $playerInfo['level'];?></td>
                            <td id="lastLoginTime" name="lastLoginTime"><?php echo $lastLoginTime;?></td>
                            <td id="unionContr" name="todayWorship"><?php echo $playerInfo['unionContr'];?></td>
                            <td id="stamina" name="guildId"><?php echo $playerInfo['stamina'];?></td>
                            <td id="spirit" name="headId"><?php echo $playerInfo['spirit'];?></td>
                            <td id="beatDemonCard" name="exp"><?php echo $playerInfo['beatDemonCard'];?></td>
                            <td id="guild" name="exp"><?php echo $playerInfo['guildId'];?></td>
                            <td id="money" name="exp"><?php echo $playerInfo['money'];?></td>
                        </tr>

                        <td>
                            <a class="link-update" href="gm2.php?serverId=<?php echo $serverId;?>&name=<?php echo $playerInfo['name'];?>">[邮件]</a>
                            <a class="link-update" href="banuser.php?serverId=<?php echo $serverId;?>&name=<?php echo $playerInfo['name'];?>">[禁言]</a>
                        </td>
                    </table>
                </div>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>
