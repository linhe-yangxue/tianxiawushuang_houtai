<?php
include "top.php"
?>
<script type="text/javascript" src="./js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" >
 function Pay()
 {
  $.ajaxSetup({
  contentType: "application/x-www-form-urlencoded; charset=utf-8"
  });
  $.post("./gm/pay.php", {playerID:$("#ID").val(),rmb:$("#rmb").val()},function(data)
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
                            <tr><td>角 色 ID:<input class="common-text" value="<?php echo $_GET['PlatformUID'];?>" name="ID"  id="ID" type="text" disabled></td></tr>
                            <tr><td>角色名称:<input class="common-text" value="<?php echo $_GET['name'];?>" name="name"  id="name"  type="text" disabled></td></tr>
                            <tr><td>充值金额:<input class="common-text" value="0" name="rmb"  id="rmb"  type="text"></td></tr>
                            
                            <td><input class="btn btn-primary btn2" id="sub" value="充值" type="button" onclick="Pay()"></td>
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