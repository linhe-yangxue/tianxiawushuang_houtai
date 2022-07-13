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
  $.post("./gm/server.php", {sname:$("#sname").val(),sstatus:$("#sstatus").val(),serverId:$("#serverId").val(),indexId:$("#indexId").val(),serverDate:$("#serverDate").val(),t:'add',type:'0'},function(data)
  {
   $("#Msg").html(data);
   //history.go(-1);
 }
 );
}

 function add()
 {
  $.ajaxSetup({
    contentType: "application/x-www-form-urlencoded; charset=utf-8"
  });
  $.post("./gm/server.php", {sname:$("#sname").val(),sstatus:$("#sstatus").val(),serverId:$("#serverId").val(),indexId:$("#indexId").val(),serverDate:$("#serverDate").val(),t:'add',type:'1'},function(data)
  {
   $("#Msg").html(data);
      alert(data);
   //location.reload();
  // history.go('SERVER.php');
 }
 );
}

 function del(id)
 {
  $.ajaxSetup({
    contentType: "application/x-www-form-urlencoded; charset=utf-8"
  });
  $.post("./gm/server.php", {zid:id,t:'del'},function(data)
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
      <div class="crumb-list"><i class="icon-font"></i><a href="#">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">服务器管理</span></div>
    </div>
	<div class="result-content">
                    
                        <?php

                        $get_data['cmd'] = '10110';
                        $get_data['sign'] = 'asdfasdf';
                        $get_data['type'] = 'json';
                        $get_data['operatorid'] = '1';


                        $url = 'http://106.75.7.149:8090/';
                        $data = json_encode($get_data);

                        $ch = curl_init(); // 启动一个CURL会话
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_HEADER, 0);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_TIMEOUT, 40);
                        curl_setopt($ch, CURLOPT_POST, true);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

                        $response = curl_exec($ch);
                        $response = json_decode($response,true);
                        if ($response['code'] != 0) return;
                        curl_close($ch);



								echo <<<EOF
								<table class="result-tab" width="100%">
                        <tr>
							<th>服务器名</th>
							<th>状态</th>
                            <th>服务器ID</th>
							<th>开服时间</th>
                        </tr>
EOF;
                        foreach ($response['res']['arr'] as $value){
                           // var_dump($data);
                         ?>

                        <tr>
                            <td id="isname" name="isname"><?php echo $value['name'];?></td>
							<td id="istatus" name="istatus"><font color='#00ff11'><?php echo $value['state'];?></font></td>
                            <td id="ierverId" name="ierverId"><?php echo $value['zid'];?></td>
							<td id="iserverDate" name="iserverDate"><?php echo $value['openDate'];?></td>
                            <td>
                                <a class="link-update" href="javascript:del(<?php echo $value['zid'];?>)">删除</a>
                            </td>
                        </tr>
                            <?php
                            }
                            ?>
                    </table>
                </div>
    <div class="search-wrap">
      <div class="search-content">
        <table class="search-tab">
         <tr><td>
          <hr>

服务器名：<input class="common-text" value="<?php echo $row['name'];?>" name="sname"  id="sname"  type="text" size="20">
</td></tr>

          <tr><td>
状态：<input class="common-text" value="<?php echo $row['status'];?>" name="sstatus"  id="sstatus"  type="text" size="6">0.维护 1:良好，2:正常，3:爆满 4.未开发
</td></tr>
          <tr><td>
服务器ID：<input class="common-text" value="<?php echo $row['serverId'];?>" name="serverId"  id="serverId"  type="text" size="6" >
        </td></tr>

 <tr><td>
开服时间：<input class="common-text" value="<?php echo $row['serverDate'];?>" name="serverDate"  id="serverDate"  type="text" size="20">  如：<?php echo date('Y-m-d');?>
</td></tr>
             
<tr><td><span><input class="btn btn-primary btn2" id="sub" value="添加服务器" type="button" onclick="add()">
        </span></td></tr>
</table>

<div id="Msg"> </div>
</div>
</div>

</div>
<!--/main-->
</div>
</body>
</html>