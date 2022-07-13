<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理系统</title>
    <link href="css/admin_login.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="admin_login_wrap">
    <h1>运营后台</h1>
    <div class="adming_login_border">
        <div class="admin_input">
            <form action="action.php?action=login" method="post">
                <ul class="admin_items">
                    <li>
                        <label for="user">用户名：</label>
                        <input type="text" name="username" id="user" size="40" class="admin_input_style" />
                    </li>
                    <li>
                        <label for="pwd">密码：</label>
                        <input type="password" name="pwd" id="pwd" size="40" class="admin_input_style" />
                    </li>
                    <li>
                        <input type="submit" tabindex="3" value="提交" class="btn btn-primary" />
                    </li>
                </ul>
            </form>
        </div>
    </div>
    <p class="admin_copyright"><a tabindex="5" href="#">CopyRight</a> &copy; 2018 Powered by 天游科技</a></p>
</div>
</body>
</html>
