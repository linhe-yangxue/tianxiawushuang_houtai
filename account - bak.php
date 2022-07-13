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
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">账号管理</span></div>
        </div>

        <div class="result-wrap">

                <div class="result-title">
                    <form action="/account.php" method="get">
                        关键字：<input type="text" id="keyword" name="keyword"style="width: 100px" value="<?php echo isset($_GET['keyword'])?trim($_GET['keyword']) : ""; ?>">&nbsp;<input type="submit" value = "查 询">（账号名）
                    </form>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%" >
                        <tr>
                            <th >账号ID</th>
                            <th>账号名</th>
                            <th>密码</th>
							<th>账号状态</th>
							<th>渠道id</th>
							<th>登录次数</th>
							<th>有角色服务器</th>
                            <th>注册时间</th>
                        </tr>
                        <?php 
                            $conn = mysql_connect($config["DB_HOST"],$config["DB_USER"],$config["DB_PWD"]);
                            mysql_query("set names 'utf8'");
                            if(!$conn){
                                die("连接数据库失败，请配置好config.php文件！！！");
                            }
                            $db_select = mysql_select_db($config["DB_NAME1"]);
                            if(!$db_select){
                                die("连接数据库".$config["DB_NAME1"]."失败！请填写好数据库名~~~~");
                            }
                            $sql = "select * from uw_account order by id asc";
                            if(isset($_GET['keyword'])) {
                                $keyword = addslashes(trim($_GET['keyword']));
                                if(strlen($keyword) > 0){
                                    $sql = "select * from uw_account where `name` like '%".$keyword."%' order by id asc";
                                }
                            }


                            $result = mysql_query($sql,$conn);
							$sp = array('正常','普通封号','设备封号','测试账号','GM账号');
                            while($row = mysql_fetch_array($result))
 
                                {
 
                         ?>

                        <tr>
                            <td id="userId" name="userId"><?php echo $row['id'];?></td>
                            <td id="userName" name="userName"><?php echo $row['name'];?></td>
                            <td id="passWord" name="passWord"><?php echo $row['pwd'];?></td>
							<td id="status" name="status"><font color='#00ff00'><?php echo $sp[$row['status']];?></font></td>                             
							<td id="channelId" name="channelId"><?php echo $row['channelId'];?></td>
                            <td id="loginCount" name="loginCount"><?php echo $row['loginCount'];?></td>
                            <td id="userServers" name="userServers"><?php echo $row['userServers'];?></td>
							<td id="c_time" name="c_time"><?php echo $row['createTime'];?></td>
                        </tr> 
                         <?php
                                }
                        ?>
                    </table>
                    <div class="list-page"> 1/1 页</div>
                </div>

        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>