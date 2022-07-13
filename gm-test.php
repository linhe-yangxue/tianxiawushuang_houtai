<!doctype html>
<?php
include "top.php"
?>
<script type="text/javascript" src="./js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" >
 function mail()
 {
  $.ajaxSetup({
    contentType: "application/x-www-form-urlencoded; charset=utf-8"
  });
  $.post("./gm/mail2.php", {PlatformUID:$("#PlatformUID").val(),roledb:$("#roledb").val(),item:$("#item").val()},function(data)
  {
   $("#Msg").html(data);
 }
 );
}

 function a()
 {  
  if($("#item").val() == ''){
        $("#item").val( '"'+ $("#itemID1").val()+'":'+$("#mailnum1").val());
  }else{
        $("#item").val($("#item").val()+',"'+$("#itemID1").val()+'":'+$("#mailnum1").val());
  }
}
 function b()
 {  
  $("#item").val('');
}


function selectOne(myselectid,keywords)//参数myselectid是select的id，参数keywords输入的keyword
{    	      
     keywords=keywords.replace(/ /g,"")   //去掉空格
     var myselect=document.getElementById(myselectid) //得到select对象
     for(i=0;i<myselect.length;i++)// 循环option
     {
         if(myselect.options[i].text.indexOf(keywords)!=-1) //判断option的text是否包含keyword
         {
             myselect.options[i].selected=true;//选中
             break;
         }
         else
         {
             myselect.options[i].selected=false; //不包含keywords的取消选中
         }
     }
}
</script>
<div class="container clearfix">
  <?php 
  include "memu.php"
  ?>
  <!--/sidebar-->
  <div class="main-wrap">

    <div class="crumb-wrap">
      <div class="crumb-list"><i class="icon-font"></i><a href="#">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">发放管理</span></div>
    </div>
    <div class="search-wrap">
      <div class="search-content">
        <table class="search-tab">
            <tr><td><input type="hidden" name="roledb" id = "roledb" value="<?php echo $_GET['roledb'];?>"></td></tr>
            <tr><td>角色ID:<input class="common-text" value="<?php echo $_GET['PlatformUID'];?>" name="PlatformUID"  id="PlatformUID" type="text" disabled></td></tr>
         <tr><td>角色名称:<input class="common-text" value="<?php echo $_GET['name'];?>" name="name"  id="name"  type="text" disabled></td></tr>

                <!--邮件-->
         <tr><td>
          <hr>
          发送邮件：（一次最好不要超过5种物品）</td></tr> 
		  <tr><td>快速定位：<input type="text" id="search" value="" /> <input type="button" value="搜索物品" onclick="selectOne('itemID1',$('#search').val());" /></td></tr>
          <tr><td>
          物品1：
          <select name="itemID1" id="itemID1" onchange="$('#describe_html').html('&nbsp;&nbsp;&nbsp;&nbsp;说明：'+$(this).find('option:selected').attr('desc'));"> 
<?php 
            header('Content-Type:text/html; charset=utf-8');
$handler1 = fopen('item.txt','r'); //打开文件
while(!feof($handler1)){
    $m1[] = fgets($handler1); //fgets逐行读取，4096最大长度，默认为1024
  }
fclose($handler1); //关闭文件
for($i=0;$i<count($m1);$i++){  
    $info = explode("\t", $m1[$i]);  //仅分割前三个数据
    $id = $info[0];
    $name = $info[1];
	$des = $info[2];
    echo "<option value='{$id}' desc='{$des}'>{$name}</option>";
  }  
  ?>																		</select>
数量1：<input class="common-text" value="1" name="mailnum1"  id="mailnum1"  type="text" size="7">
<input class="btn btn-primary btn2" id="sub" value="添加" type="button" onclick="a()"> 
<input class="btn btn-primary btn2" id="sub" value="清空" type="button" onclick="b()"></td></tr> 
<tr><td><font color="#ff8887"><span id="describe_html"></font></span></td></tr> 
<tr>
<td>物品：<input class="common-text" value="" name="item"  id="item"  type="text" size="140" disabled></td></tr> 

<tr><td><span><input class="btn btn-primary btn2" id="sub" value="执行" type="button" onclick="mail()"></span></td></tr> 


</table>

<div id="Msg"> </div>
</div>
</div>

</div>
<!--/main-->
</div>
</body>
</html>
