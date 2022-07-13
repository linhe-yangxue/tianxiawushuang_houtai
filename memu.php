<?php
session_start();
 if($_SESSION['admin'] == 1 & $_SESSION['user'] == "admin"){
 }
 else{

    header("location: index.php");
    exit;
 }
?>
<div class="container clearfix">
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>常用操作</a>
                    <ul class="sub-menu">
                        <li><a href="role.php"><i class="icon-font">&#xe006;</i>角色管理</a></li>
                        <li><a href="notice_notice.php"><i class="icon-font">&#xe006;</i>游戏公告</a></li>
<!--                        <li><a href="notice.php"><i class="icon-font">&#xe006;</i>系统公告</a></li>-->
						<!-- <li><a href="act.php?t=xg"><i class="icon-font">&#xe006;</i>活动全开</a></li> -->

                        <li><a href="SERVER.php"><i class="icon-font">&#xe006;</i>服务器管理</a></li>
                        <li><a href="activity.php"><i class="icon-font">&#xe052;</i>活动管理</a></li>
                        <li><a href="giftbag.php"><i class="icon-font">&#xe052;</i>生成礼包码</a></li>
                        <li><a href="allemail.php"><i class="icon-font">&#xe052;</i>全服邮件</a></li>
                        <li><a href="clearworldemail.php"><i class="icon-font">&#xe052;</i>清空世界聊天</a></li>
                        <li><a href="clearguildchat.php"><i class="icon-font">&#xe052;</i>清空宗门聊天</a></li>
                        <li><a href="whiteList.php"><i class="icon-font">&#xe052;</i>添加白名单</a></li>
                        <li><a href="queryguild.php"><i class="icon-font">&#xe052;</i>工会查询</a></li>
                        <li><a href="budan.php"><i class="icon-font">&#xe052;</i>返利</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
 
