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
  $.post("./gm/banuser.php",
      {
          serverId:$("#serverId").val(),
          name:$("#name").val(),
          bendType:$("#bendType").val(),
          bendExpireAt:$("#bendExpireAt").val(),
          endExpireAt:$("#endExpireAt").val(),
          tp:'edit'},function(data)
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
         <tr><td>服务器ID:<input class="common-text" value="<?php echo $_GET['serverId'];?>" name="serverId"  id="serverId" type="text" disabled></td></tr>
         <tr><td>角色名称:<input class="common-text" value="<?php echo $_GET['name'];?>" name="name"  id="name"  type="text" disabled></td></tr>
         <?php

         $rewardEndTime = date('m/d/Y H:i');
         ?>
         <tr><td>
          <hr>
          封号-禁言</td></tr>
          <tr><td>
          </td></tr>
          <tr><td>
          禁言类型：<input class="common-text" value="" name="bendType"  id="bendType"  type="text" size="20">[0-正常，1-普通聊天，2-客服聊天']
          </td></tr>
          <tr><td>禁言开始时间：<input type='text' value="<?php echo $rewardEndTime;?>" name="bendExpireAt"  id="bendExpireAt"  size="20"></td></tr>
            <tr><td>禁言结束时间：<input type="text" value="<?php echo $rewardEndTime;?>" name="endExpireAt"  id="endExpireAt"  size="20"></td></tr>
            <tr><td><span><input class="btn btn-primary btn2" id="sub" value="提交" type="button" onclick="mail()"></span></td></tr>
        </table>

        <div id="Msg"> </div>
        </div>
    </div>

</div>
<!--/main-->
</div>
</body>
</html>
