<?php
include "top.php"
?>
<script type="text/javascript" src="./js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" >
    function gift()
    {
//        $.ajaxSetup({
//            contentType: "application/x-www-form-urlencoded; charset=utf-8"
//        });
//        $.post("./gm/gift.php",
//            {
//                xin:$("#xin").val(),
//                te:$("#te").val(),
//                zs:$("#zs").val(),
//                num:$("#num").val()
//            },function(data)
//            {
//                $("#divMsg").html(data);
//            }
//        );
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

                    <tr><td>新手礼包:<input class="common-text" value="2000013:体力丹:5,2000014:精力丹:8" name="xin"  id="xin" type="text" size="80" disabled></td></tr>
                    <tr><td>特权礼包:<input class="common-text" value="2000010:银符令:5,2000002:突破石:100,2000008:技能秘籍:10" name="te"  id="te"  type="text" size="80" disabled></td></tr>
                    <tr><td>专属礼包:<input class="common-text" value="2000011:金符令:5,2000002:突破石:200,2000008:技能秘籍:50" name="zs" id="zs"  type="text" size="80" disabled></td></tr>
                    数量：<input class="common-text" value="1" name="num"  id="num"  type="text" size="7">
                    <tr>
                        <td><input class="btn btn-primary btn2" id="sub" value="执行" type="button" onclick="gift()"></td>
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
