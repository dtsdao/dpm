<?php
//DTSDAO's Password Manager
//passwords
//2015.11.15,20,21,22

///////////请自行更改//////////
//Please change by your self.//
$ad_pw = "";
$if_visit = true;//是否启用访客模式

//注意!请新建一个名为$db_user . "_vs"且密码相同的用户,否则数据库连接可能出错
//为了安全起见，请只给予主/访客数据库的权限!
$db_host = "localhost";
$db_user = "";
$db_pswd = "";
$db_port = "3306";

$db_iname = "dpm";//主数据库
$db_vname = "dpm_visit";//访客数据库
?>