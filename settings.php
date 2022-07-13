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
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">系统设置</span></div>
        </div>

        <div class="result-wrap">
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th>ID</th>
                            <th>guildWarSign <p> [星期开始，星期结束，开始时间，结束时间]</p></th>
                            <th>guildWarOpen <p> [星期几，开始时间，结束时间]</p></th>
                            <th>guildWarHost <p>行会战服</p></th>
                            <th>guildWarPort <p>行会战服端口</p></th>
                            <th>redisHostArr <p>redis主机端口列表</p></th>
                            <th>noSignServerArr<p>报名排除的服务器列表</p></th>
                            <th>操作</th>
                        </tr>
                        <?php 
                            $conn = mysql_connect($config["DB_HOST"],$config["DB_USER"],$config["DB_PWD"]);
                            mysql_query("set names 'utf8'");
                            if(!$conn){
                                die("连接数据库失败，请配置好config.php文件！！！");
                            }
                            $db_select = mysql_select_db($config["DB_NAME2"]);
                            if(!$db_select){
                                die("连接数据库".$role_db."失败！请填写好数据库名~~~~");
                            }

			    $role_db = $config["DB_NAME2"];
                            $sql = "select * from uw_game_config";
                            $result = mysql_query($sql,$conn);
                            while($row = mysql_fetch_array($result))
 
                                {
 
                         ?>

                        <tr>
                            <td id="id" name="id"><?php echo $row['id'];?></td>
                            <td id="guildWarSign" name="guildWarSign"><?php echo $row['guildWarSign'];?></td>
                            <td id="guildWarOpen" name="guildWarOpen"><?php echo $row['guildWarOpen'];?></td>
                            <td id="guildWarHost" name="guildWarHost"><?php echo $row['guildWarHost'];?></td>
                            <td id="guildWarPort" name="guildWarPort"><?php echo $row['guildWarPort'];?></td>
							<td id="redisHostArr" name="redisHostArr"><?php echo $row['redisHostArr'];?></td>
                            <td id="noSignServerArr" name="noSignServerArr"><?php echo $row['noSignServerArr'];?></td>
                            <td>
                                <a class="link-update" href="xgconfig.php?roledb=<?php echo $role_db;?>&id=<?php echo $row['id'];?>">修改</a>
                            </td>
                        </tr> 
                         <?php
                                }
                        ?>
                        <?php
                        @mysql_close($conn);
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
