<!doctype html>
<?php
include "top.php";
include "config.php";
?>

<script type="text/javascript" src="./js/jquery-1.7.1.min.js"></script>
<script type="text/javascript">
    function group() {
        $.ajaxSetup({
            contentType: "application/x-www-form-urlencoded; charset=utf-8"
        });
        $.post("./gm/group.php", {
                id: $("#id").val(),
                roledb: $("#roledb").val(),
                type: $("#type").val(),
                name: $("#name").val(),
                serverArr: $("#serverArr").val(),
                isDelete: $("#isDelete").val(),
                case: $("#case").val(),
                tp: 'edit'
            }, function (data) {
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
            <div class="crumb-list"><i class="icon-font"></i><a href="#">首页</a><span
                    class="crumb-step">&gt;</span><span class="crumb-name">修改服务器配对</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <table class="search-tab">
                    <tr>
                        <td>ID:<input class="common-text" value="<?php echo $_GET['id']; ?>" name="id" id="id"
                                      type="text" disabled></td>
                    </tr>
                    <?php
                    $conn = mysql_connect($config["DB_HOST"], $config["DB_USER"], $config["DB_PWD"]);
                    mysql_query("set names 'utf8'");
                    if (!$conn) {
                        die("连接数据库失败，请配置好config.php文件！！！");
                    }
                    $roledb = $_GET['roledb'];
                    $db_select = mysql_select_db($roledb);
                    if (!$db_select) {
                        die("连接数据库" . $roledb . "失败！请填写好数据库名~~~~");
                    }
                    $sql = "select * from uw_servers_group where id = '{$_GET['id']}' limit 1";
                    $result = mysql_query($sql, $conn);
                    $row = mysql_fetch_array($result);


                    ?>
                    <tr>
                        <td>
                            <hr>
                            Servers Group - 服务器配对
                        </td>
                    </tr>
                    <tr>
                        <td><input type="hidden" name="roledb" id="roledb" value="<?php echo $_GET['roledb']; ?>"></td>
                    </tr>
                    <tr>
                        <td>
                            type：<input class="common-text" value="<?php echo $row['type']; ?>" name="type" id="type"
                                        type="text" size="20">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            name：<input class="common-text" value="<?php echo $row['name']; ?>" name="name" id="name"
                                        type="text" size="20">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            serverArr：<input class="common-text" value='<?php echo $row['serverArr']; ?>'
                                             name="serverArr" id="serverArr" type="text" size="20">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            isDelete：<input class="common-text" value="<?php echo $row['isDelete']; ?>" name="isDelete"
                                            id="isDelete" type="text" size="20">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            case：<input class="common-text" value="<?php echo $row['case']; ?>" name="case" id="case"
                                        type="text" size="20">
                        </td>
                    </tr>

                    <tr>
                        <td><span><input class="btn btn-primary btn2" id="sub" value="修改数据" type="button"
                                         onclick="group()"></span></td>
                    </tr>
                </table>
                <?php
                @mysql_close($conn);
                ?>
                <div id="Msg"></div>
            </div>
        </div>

    </div>
    <!--/main-->
</div>
</body>
</html>
