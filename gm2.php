<!doctype html>
<?php
include "top.php"
?>
<script type="text/javascript" src="./js/jquery-1.7.1.min.js"></script>
<script type="text/javascript">
    function mail() {
        $.ajaxSetup({
            contentType: "application/x-www-form-urlencoded; charset=utf-8"
        });
        $.post("./gm/mail2.php", {
                serverId: $("#serverId").val(),
                name: $("#name").val(),
                item: $("#item").val(),
                title: $("#title").val(),
                content: $("#content").val()
            }, function (data) {
                $("#Msg").html(data);
            }
        );
    }

    function a() {
        if ($("#item").val() == '') {
            $("#item").val($("#itemID1").val() + ':' + $("#mailnum1").val());
        } else {
            //alert('单次请发送一种道具');return;
            $("#item").val($("#item").val() + ',' + $("#itemID1").val() + ':' + $("#mailnum1").val());
        }
        //$("#item").val( $("#itemID1").val() + ':'+$("#mailnum1").val());
    }

    function b() {
        $("#item").val('');
    }

    function c() {
        if ($("#item").val() != '') {
            $("#item").val($("#item").val() + ',' + $("#itemID1").val() + ':' - $("#mailnum1").val());
        }
    }

    function selectOne(myselectid, keywords)//参数myselectid是select的id，参数keywords输入的keyword
    {
        keywords = keywords.replace(/ /g, "")   //去掉空格
        var myselect = document.getElementById(myselectid) //得到select对象
        for (i = 0; i < myselect.length; i++)// 循环option
        {
            if (myselect.options[i].text.indexOf(keywords) == 0) //判断option的text是否包含keyword
            {
                myselect.options[i].selected = true;//选中
                break;
            } else {
                myselect.options[i].selected = false; //不包含keywords的取消选中
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
            <div class="crumb-list"><i class="icon-font"></i><a href="#">首页</a><span
                        class="crumb-step">&gt;</span><span class="crumb-name">发放管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <table class="search-tab">
                    <tr>
                        <td><input type="hidden" name="roledb" id="roledb" value="<?php echo $_GET['roledb']; ?>"></td>
                    </tr>
                    <tr>
                        <td>服务器ID:<input class="common-text" value="<?php echo $_GET['serverId']; ?>" name="serverId"
                                         id="serverId" type="text" disabled></td>
                    </tr>
                    <tr>
                        <td>角色名称:<input class="common-text" value="<?php echo $_GET['name']; ?>" name="name" id="name"
                                        type="text" disabled></td>
                    </tr>
                    <tr>
                        <td>
                            <hr>

                            发送邮件：<span style="color:red">（单次请发送一种道具）</span></td>
                    </tr>
                    <tr>
                        <td>快速定位：<input type="text" id="search" value=""/> <input type="button" value="搜索物品"
                                                                                  onclick="selectOne('itemID1',$('#search').val());"/>
                        </td>
                    </tr>
                    <tr>
                        <td>物品1：
                            <select name="itemID1" id="itemID1"
                                    onchange="$('#describe_html').html('&nbsp;&nbsp;&nbsp;&nbsp;说明：'+$(this).find('option:selected').attr('desc'));">
                                <?php
                                header('Content-Type:text/html; charset=utf-8');
                                $handler1 = fopen('ItemId.csv', 'r'); //打开文件
                                while (!feof($handler1)) {
                                    $m1[] = fgets($handler1); //fgets逐行读取，4096最大长度，默认为1024
                                }
                                fclose($handler1); //关闭文件
                                for ($i = 2; $i < count($m1); $i++) {
                                    $info = explode(",", $m1[$i]);  //仅分割前三个数据
                                    $id = $info[0];
                                    $name = $info[1];
                                    $des = $info[2];
                                    echo "<option value={$id}:{$name} desc={$name}>{$name}</option>";
                                }
                                ?>
                            </select>

                            数量1：<input class="common-text" value="1" name="mailnum1" id="mailnum1" type="text" size="7">
                            <input class="btn btn-primary btn2" id="sub" value="添加" type="button" onclick="a()">
                            <input class="btn btn-primary btn2" id="sub" value="清空" type="button" onclick="b()"></td>
                    </tr>
                    <tr>
                        <td><font color="#ff8887"><span id="describe_html"></font></span></td>
                    </tr>
                    <tr>
                        <td>物品：<input class="common-text" value="" name="item" id="item" type="text" size="150"
                                      disabled></td>
                    </tr>
                    <tr>
                        <td>邮件标题：<input type="text" id="title" value=""/></td>
                    </tr>
                    <tr>
                        <td>邮件内容：<input type="text" id="content" value="" size="80"/></td>
                    </tr>
                    <tr>
                        <td><span><input class="btn btn-primary btn2" id="sub" value="执行" type="button"
                                         onclick="mail()"></span></td>
                    </tr>

                </table>

                <div id="Msg"></div>
            </div>
        </div>

    </div>
    <!--/main-->
</div>
</body>
</html>



<?php
//header('Content-Type:text/html; charset=utf-8');
//$file = fopen('ItemId.csv', 'r'); //打开文件
//var_dump($data);
//if (!$file){
//    return false;
//}
//$line = 0;
//$list = [];
//while ($data = fgetcsv($file)) {
//    $line++;
//    var_dump($data);
//    if (!$data || empty($line) || $line == 1){
//        continue;
//    }
//}
//
//fclose($file);
//?>


<?php
header('Content-Type:text/html; charset=utf-8');
$handler1 = fopen('ItemId.csv', 'r'); //打开文件
while (!feof($handler1)) {
    $m1[] = fgets($handler1); //fgets逐行读取，4096最大长度，默认为1024
}
fclose($handler1); //关闭文件
for ($i = 2; $i < count($m1); $i++) {
    $info = explode("\t", $m1[$i]);  //仅分割前三个数据
    $id = $info[0];
    $name = $info[1];
    $des = $info[2];
}
?>
