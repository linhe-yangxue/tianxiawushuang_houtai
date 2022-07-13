<!doctype html>
<?php
include "top.php";
include "config.php";
?>
<script type="text/javascript" src="./js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" >

 function add()
 {
  $.ajaxSetup({
    contentType: "application/x-www-form-urlencoded; charset=utf-8"
  });
  $.post("./gm/group.php", {type:$("#gtype").val(),name:$("#gname").val(),serverArr:$("#gserverArr").val(),isDelete:$("#gisDelete").val(),case:$("#gcase").val(),tp:'add'},function(data)
  {
   $("#Msg").html(data);
  // history.go('SERVER.php');
alert(data);            
    location.reload();
 }
 );
}

 function del(id)
 {
  $.ajaxSetup({
    contentType: "application/x-www-form-urlencoded; charset=utf-8"
  });
  $.post("./gm/group.php", {id:id,tp:'del'},function(data)
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
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin">首页</a><span
                    class="crumb-step">&gt;</span><span class="crumb-name">服务器分组匹配</span></div>
        </div>

        <div class="result-wrap">
            <div class="result-content">
                <table class="result-tab" width="100%">
                    <tr>
                        <th>ID</th>
                        <th>type</th>
                        <th>name</th>
                        <th>serverArr</th>
                        <th>isDelete</th>
                        <th>case</th>
                        <th>操作</th>
                    </tr>
                    <?php
                    $conn = mysql_connect($config["DB_HOST"], $config["DB_USER"], $config["DB_PWD"]);
                    mysql_query("set names 'utf8'");
                    if (!$conn) {
                        die("连接数据库失败，请配置好config.php文件！！！");
                    }
                    $db_select = mysql_select_db($config["DB_NAME2"]);
                    if (!$db_select) {
                        die("连接数据库" . $role_db . "失败！请填写好数据库名~~~~");
                    }

                    $role_db = $config["DB_NAME2"];
                    $sql = "select * from uw_servers_group";
                    $result = mysql_query($sql, $conn);
                    while ($row = mysql_fetch_array($result)) {

                        ?>

                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['type']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['serverArr']; ?></td>
                            <td><?php echo $row['isDelete']; ?></td>
                            <td><?php echo $row['case']; ?></td>
                            <td>
                                <a class="link-update"
                                   href="xggroup.php?roledb=<?php echo $role_db; ?>&id=<?php echo $row['id']; ?>">修改</a>
								<a class="link-update" href="javascript:del(<?php echo $row['id'];?>)">删除</a>
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
		  <div class="search-wrap">
      <div class="search-content">
        <table class="search-tab">
         <tr><td>
          <hr>
          添加组</td></tr> 

          <tr><td>
type：<input class="common-text" value="1" name="gtype"  id="gtype"  type="text" size="20"> </td></tr>
          <tr><td>
name：<input class="common-text" value="" name="gname"  id="gname"  type="text" size="20">
</td></tr>
          <tr><td>
serverArr：<input class="common-text" value="" name="gserverArr"  id="gserverArr"  type="text" size="6">
</td></tr>
          <tr><td>
isDelete：<input class="common-text" value="0" name="gisDelete"  id="gisDelete"  type="text" size="6">
</td></tr>
          <tr><td>
case：<input class="common-text" value="0" name="gcase"  id="gcase"  type="text" size="6" >
</td></tr>

             
<tr><td><span><input class="btn btn-primary btn2" id="sub" value="添加" type="button" onclick="add()"></span></td></tr> 
</table>

<div id="Msg"> </div>
</div>
</div>
    </div>
    <!--/main-->
</div>
</body>
</html>
