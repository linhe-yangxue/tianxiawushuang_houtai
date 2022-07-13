<!doctype html>
<?php
include "top.php";
include "config.php";
?>

<script type="text/javascript" src="./js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" >
 function settings()
 {
  $.ajaxSetup({
    contentType: "application/x-www-form-urlencoded; charset=utf-8"
  });
  $.post("./gm/settings.php", {id:$("#id").val(),roledb:$("#roledb").val(),guildWarSign:$("#guildWarSign").val(),guildWarOpen:$("#guildWarOpen").val(),guildWarHost:$("#guildWarHost").val(),guildWarPort:$("#guildWarPort").val(),redisHostArr:$("#redisHostArr").val(),noSignServerArr:$("#noSignServerArr").val(),tp:'edit'},function(data)
  {
   $("#Msg").html(data);
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
      <div class="crumb-list"><i class="icon-font"></i><a href="#">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">修改属性</span></div>
    </div>
    <div class="search-wrap">
      <div class="search-content">
        <table class="search-tab">
         <tr><td>ID:<input class="common-text" value="<?php echo $_GET['id'];?>" name="id"  id="id" type="text" disabled></td></tr>
 <?php
                            $conn = mysql_connect($config["DB_HOST"],$config["DB_USER"],$config["DB_PWD"]);
                            mysql_query("set names 'utf8'");
                            if(!$conn){
                                die("连接数据库失败，请配置好config.php文件！！！");
                            }
                            $roledb = $_GET['roledb'];
                            $db_select = mysql_select_db($roledb);
                            if(!$db_select){
                                die("连接数据库".$roledb."失败！请填写好数据库名~~~~");
                            }
                            $sql = "select * from uw_game_config where id = '{$_GET['id']}'";
                            $result = mysql_query($sql,$conn);
                            $row = mysql_fetch_array($result);

 
 ?>
         <tr><td>
          <hr>
                 主-游戏配置(GameConfigEntity)</td></tr>
            <tr><td><input type="hidden" name="roledb" id = "roledb" value="<?php echo $_GET['roledb'];?>"></td></tr>
            <tr><td>
           guildWarSign：<input class="common-text" value="<?php echo $row['guildWarSign'];?>" name="guildWarSign"  id="guildWarSign"  type="text" size="20">[星期开始，星期结束，开始时间，结束时间]
</td></tr>
          <tr><td>
                  guildWarOpen：<input class="common-text" value="<?php echo $row['guildWarOpen'];?>" name="guildWarOpen"  id="guildWarOpen"  type="text" size="20">[星期几，开始时间，结束时间]
</td></tr>
          <tr><td>
                  guildWarHost：<input class="common-text" value="<?php echo $row['guildWarHost'];?>" name="guildWarHost"  id="guildWarHost"  type="text" size="20">行会战服
</td></tr>
          <tr><td>
                  guildWarPort：<input class="common-text" value="<?php echo $row['guildWarPort'];?>" name="guildWarPort"  id="guildWarPort"  type="text" size="20">行会战服端口
</td></tr>
          <tr><td>
                  redisHostArr：<textarea class="common-text" name="redisHostArr"  id="redisHostArr"  style="width:450px;height: 100px"><?php echo $row['redisHostArr'];?></textarea>redis主机端口列表
</td></tr>
          <tr><td>
                  noSignServerArr：<textarea class="common-text" name="noSignServerArr"  id="noSignServerArr"  style="width:450px;height: 100px"><?php echo $row['noSignServerArr'];?></textarea>报名排除的服务器列表
</td></tr>
<tr><td><span><input class="btn btn-primary btn2" id="sub" value="修改数据" type="button" onclick="settings()"></span></td></tr>
</table>
          <?php
          @mysql_close($conn);
          ?>
<div id="Msg"> </div>
</div>
</div>

</div>
<!--/main-->
</div>
</body>
</html>
