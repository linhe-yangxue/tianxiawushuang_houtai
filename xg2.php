<!doctype html>
<?php
include "top.php";
include "config.php";
?>

<script type="text/javascript" src="./js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" >
 function mail()
 {
  $.ajaxSetup({
    contentType: "application/x-www-form-urlencoded; charset=utf-8"
  });
  $.post("./gm/user2.php", {PlatformUID:$("#PlatformUID").val(),roledb:$("#roledb").val(),gold:$("#gold").val(),diamond:$("#diamond").val(),lvl:$("#lvl").val(),vip:$("#vip").val(),vipScore:$("#vipScore").val(),honor:$("#honor").val(),ispk:$("#ispk").val(),prestige:$("#prestige").val(),genuineQi:$("#genuineQi").val(),rebirthLvl:$("#rebirthLvl").val(),rebirthExp:$("#rebirthExp").val(),tp:'edit'},function(data)
  {
   $("#Msg").html(data);
 }
 );
}

 function clear1()
 {
  $.ajaxSetup({
    contentType: "application/x-www-form-urlencoded; charset=utf-8"
  });
  $.post("./gm/user2.php", {PlatformUID:$("#PlatformUID").val(),roledb:$("#roledb").val(),tp:'clear'},function(data)
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
         <tr><td>角色ID:<input class="common-text" value="<?php echo $_GET['PlatformUID'];?>" name="PlatformUID"  id="PlatformUID" type="text" disabled></td></tr>
         <tr><td>角色名称:<input class="common-text" value="<?php echo $_GET['name'];?>" name="name"  id="name"  type="text" disabled></td></tr>
 <?php 
                            $conn = mysql_connect($config["DB_HOST"],$config["DB_USER"],$config["DB_PWD"]);
                            mysql_query("set names 'utf8'");
                            if(!$conn){
                                die("连接数据库失败，请配置好config.php文件！！！");
                            }
                            $roledb = $_GET['roledb'];
                            $db_select = mysql_select_db($roledb);
                            //$db_select = mysql_select_db($config["DB_NAME3"]);
                            if(!$db_select){
                                die("连接数据库".$roledb."失败！请填写好数据库名~~~~");
                            }
                            $sql = "select * from uw_user where id = '{$_GET['PlatformUID']}'";
                            $result = mysql_query($sql,$conn);
                            $row = mysql_fetch_array($result);

 
 ?>
         <tr><td>
          <hr>
          修改属性</td></tr>
            <tr><td><input type="hidden" name="roledb" id = "roledb" value="<?php echo $_GET['roledb'];?>"></td></tr>
            <tr><td>
金币：<input class="common-text" value="<?php echo $row['gold'];?>" name="gold"  id="gold"  type="text" size="20">
</td></tr>
          <tr><td>
元宝：<input class="common-text" value="<?php echo $row['diamond'];?>" name="diamond"  id="diamond"  type="text" size="20">
</td></tr>
          <tr><td>
等级：<input class="common-text" value="<?php echo $row['lvl'];?>" name="lvl"  id="lvl"  type="text" size="20">
</td></tr>
          <tr><td>
VIP：<input class="common-text" value="<?php echo $row['vip'];?>" name="vip"  id="vip"  type="text" size="20">
</td></tr>
          <tr><td>
VIP积分：<input class="common-text" value="<?php echo $row['vipScore'];?>" name="vipScore"  id="vipScore"  type="text" size="20">
</td></tr>
          <tr><td>
荣誉值：<input class="common-text" value="<?php echo $row['honor'];?>" name="honor"  id="honor"  type="text" size="20">
</td></tr> <tr><td>
开启PK：<input class="common-text" value="<?php echo $row['isOpenPk'];?>" name="ispk"  id="ispk"  type="text" size="20"> 0：不开启 1：开启
</td></tr>
          <tr><td>
声望：<input class="common-text" value="<?php echo $row['prestige'];?>" name="prestige"  id="prestige"  type="text" size="20"> 
</td></tr>
<tr><td>
真气：<input class="common-text" value="<?php echo $row['genuineQi'];?>" name="genuineQi"  id="genuineQi"  type="text" size="20"> 
</td></tr>
<tr><td>
转生等级：<input class="common-text" value="<?php echo $row['rebirthLvl'];?>" name="rebirthLvl"  id="rebirthLvl"  type="text" size="20"> 
</td></tr>
<tr><td>
转生经验：<input class="common-text" value="<?php echo $row['rebirthExp'];?>" name="rebirthExp"  id="rebirthExp"  type="text" size="20"> 
</td></tr>            
<tr><td><span><input class="btn btn-primary btn2" id="sub" value="修改数据" type="button" onclick="mail()"></span></td></tr> 

<tr><td><span><input class="btn btn-primary btn2" id="sub" value="清空背包" type="button" onclick="clear1()"></span></td></tr> 
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