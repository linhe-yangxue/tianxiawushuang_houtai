<!doctype html>
<?php
include "top.php";
include "config.php";
?>

<script type="text/javascript" src="./js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" >
 function xgact()
 {
  $.ajaxSetup({
    contentType: "application/x-www-form-urlencoded; charset=utf-8"
  });
  $.post("./gm/act.php", {roledb:$("#roledb").val(),id:$("#aid").val(),title:$("#atitle").val(),startTime:$("#astarttime").val(),endTime:$("#aendtime").val(),isOpen:$("#aisopen").val(),items:$("#aitems").val(),exValues:$("#aext").val(),tp:'edit'},function(data)
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
         <tr><td>活动ID:<input class="common-text" value="<?php echo $_GET['aid'];?>" name="aid"  id="aid" type="text" disabled></td></tr>
         <tr><td>
          <hr>
          修改属性</td></tr>
            <tr><td><input type="hidden" name="roledb" id = "roledb" value="<?php echo $_GET['roledb'];?>"></td></tr>
            <tr><td>
        活动：<input class="common-text" value="<?php echo $row['title'];?>" name="atitle"  id="atitle"  type="text" size="20">
        </td></tr>
          <tr><td>
        开始时间：<input class="common-text" value="<?php echo $row['startTime'];?>" name="astarttime"  id="astarttime"  type="text" size="20">
        </td></tr>
          <tr><td>
        结束时间：<input class="common-text" value="<?php echo $row['endTime'];?>" name="aendtime"  id="aendtime"  type="text" size="20">
        </td></tr>
          <tr><td>
            是否开启：<input class="common-text" value="<?php echo $row['isOpen'];?>" name="aisopen"  id="aisopen"  type="text" size="20">
            </td></tr>
            <tr><td>
            物品：<textarea class="common-text"  name="aitems"  id="aitems" style="width:450px;height:100px"><?php echo $row['items'];?></textarea>(轻易不要修改)
            </td></tr>

            <tr><td>
            物品：<textarea class="common-text"  name="aext"  id="aext" style="width:450px;height:100px"><?php echo $row['exValues'];?></textarea>(轻易不要修改)
            </td></tr>

          <tr><td>
            物品：<textarea class="common-text"  name="aext2"  id="aext2" style="width:450px;height:100px"><?php echo $row['exValues2'];?></textarea>(轻易不要修改)
            </td></tr>
 
          <tr><td>
            物品：<textarea class="common-text"  name="aext3"  id="aext3" style="width:450px;height:100px"><?php echo $row['exValues3'];?></textarea>(轻易不要修改)
            </td></tr>
            <tr><td><span><input class="btn btn-primary btn2" id="sub" value="修改数据" type="button" onclick="xgact()"></span></td></tr>

            </table>
<div id="Msg"> </div>
</div>
</div>

</div>
<!--/main-->
</div>
</body>
</html>
