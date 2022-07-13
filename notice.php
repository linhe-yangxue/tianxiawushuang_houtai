<!doctype html>
<?php
include "top.php";
include "config.php";
?>

<script type="text/javascript" src="./js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" >
 function xg()
 {
  $.ajaxSetup({
    contentType: "application/x-www-form-urlencoded; charset=utf-8"
  });
  $.post("./gm/gg.php", {gid:$("#gid").val(),sid:$("#sid").val(),snr:$("#snr").val(),st:$("#st").val(),sjg:$("#sjg").val(),stp:$("#stp").val(),ss:$("#ss").val(),sed:$("#sed").val(),t:'xg'},function(data)
  {
   $("#Msg").html(data);
   history.go(-1);
 }
 );
}

 function add()
 {
  $.ajaxSetup({
    contentType: "application/x-www-form-urlencoded; charset=utf-8"
  });
  $.post("./gm/gg.php", {sid:$("#sid").val(),snr:$("#snr").val(),st:$("#st").val(),sjg:$("#sjg").val(),stp:$("#stp").val(),ss:$("#ss").val(),sed:$("#sed").val(),t:'add'},function(data)
  {
   $("#Msg").html(data);
   history.go('notice.php');
 }
 );
}

 function del(id)
 {
  $.ajaxSetup({
    contentType: "application/x-www-form-urlencoded; charset=utf-8"
  });
  $.post("./gm/gg.php", {gid:id,t:'del'},function(data)
  {
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
      <div class="crumb-list"><i class="icon-font"></i><a href="#">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">系统公告</span></div>
    </div>
	<div class="result-content">
                    
                        <?php 
                            $conn = mysql_connect($config["DB_HOST"],$config["DB_USER"],$config["DB_PWD"]);
                            mysql_query("set names 'utf8'");
                            if(!$conn){
                                die("连接数据库失败，请配置好config.php文件！！！");
                            }
                            $db_select = mysql_select_db($config["DB_NAME2"]);
                            if(!$db_select){
                                die("连接数据库".$config["DB_NAME2"]."失败！请填写好数据库名~~~~");
                            }
							if(isset($_GET['id'])){
								$sql = "select * from uw_system_message where id ='{$_GET['id']}'";
								$result = mysql_query($sql,$conn);
								$row = mysql_fetch_array($result);
							}else{
								echo <<<EOF
								<table class="result-tab" width="100%">
                        <tr>
                            <th>ID</th>
							<th>区号</th>
                            <th>内容</th>
                            <th>次数</th>
                            <th>间隔</th>
							<th>类型</th>
                            <th>状态</th>
                            <th>结束时间</th>
                            <th>操作</th>
                        </tr>
EOF;
								$sql = "select * from uw_system_message order by id desc";
							
                            
                            $result = mysql_query($sql,$conn);
                            while($row = mysql_fetch_array($result))
 
                                {
 
                         ?>

                        <tr>
                            <td id="ggid" name="ggid"><?php echo $row['id'];?></td>
                            <td id="serverId" name="serverId"><?php echo $row['serverId'];?></td>
                            <td id="message" name="message"><?php echo $row['message'];?></td>
                            <td id="times" name="times"><?php echo $row['times'];?></td>
                            <td id="interval" name="interval"><?php echo $row['interval'];?></td>
							<td id="ggtype" name="ggtype"><?php echo $row['type'];?></td>
                            <td id="ggstatus" name="ggstatus"><?php echo $row['status'];?></td>
                            <td id="expireTime" name="expireTime"><?php echo $row['expireTime'];?></td>
                          
                            <td>
                                <a class="link-update" href="notice.php?id=<?php echo $row['id'];?>">修改</a>
								<a class="link-update" href="javascript:del(<?php echo $row['id'];?>)">删除</a>
                            </td>
                        </tr> 
                         <?php
                                }
							}
                        ?>
                    <?php
                    @mysql_close($conn);
                    ?>
                    </table>
             
                </div>
    <div class="search-wrap">
      <div class="search-content">
        <table class="search-tab">
         <tr><td>
          <hr>
          添加/修改公告</td></tr> 
		            <tr><td>
<input class="common-text" value="<?php echo $row['id'];?>" name="gid"  id="gid"  type="text" size="6" hidden> 
</td></tr>
          <tr><td>
区号：<input class="common-text" value="<?php echo $row['serverId'];?>" name="sid"  id="sid"  type="text" size="6"> 0:全服
</td></tr>
          <tr><td>
内容：</tr></td><tr><td>
      <textarea class="common-text" name="snr"  id="snr" style="margin: 0px; width: 900px; height: 172px;">
	  <?php echo $row['message'];?>
	  </textarea>
</td></tr>
          <tr><td>
次数：<input class="common-text" value="<?php echo $row['times'];?>" name="st"  id="st"  type="text" size="6">
</td></tr>
          <tr><td>
间隔：<input class="common-text" value="<?php echo $row['interval'];?>" name="sjg"  id="sjg"  type="text" size="6">秒
</td></tr>
          <tr><td>
类型：<input class="common-text" value="<?php echo $row['type'];?>" name="stp"  id="stp"  type="text" size="6">公告类型： 
1 跑马灯公告
2 即时公告
</td></tr>
          <tr><td>
状态：<input class="common-text" value="<?php echo $row['status'];?>" name="ss"  id="ss"  type="text" size="6" disabled>0:未发送 1:已发送
</td></tr> <tr><td>
结束时间：<input class="common-text" value="<?php echo $row['expireTime'];?>" name="sed"  id="sed"  type="text" size="20">  如：2027-10-30 16:18:00
</td></tr>
             
<tr><td><span><input class="btn btn-primary btn2" id="sub" value="修改公告" type="button" onclick="xg()"></span> <span><input class="btn btn-primary btn2" id="sub" value="添加公告" type="button" onclick="add()"></span></td></tr> 
</table>

<div id="Msg"> </div>
</div>
</div>

</div>
<!--/main-->
</div>
</body>
</html>