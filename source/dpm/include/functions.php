<?php
//DTSDAO's Password Manager
//functions
//2015.11.15,20,21,22

function lang_put($zh_put,$en_put){
	switch ($_REQUEST['lang']) {
		case "en":
			echo $en_put;
			break;
		case "zh":
			echo $zh_put;
			break;
		default:
			echo $zh_put;
			break;
	}
}

function format_ap($type){
	return '<p align="center">' . $type . '</p>';
}

function back_index_link(){
	echo '<p align="center">' . '<a href="';
	lang_put("index.php?lang=zh","index.php?lang=en");
	echo '">';
	lang_put("点我跳转到主页","Click me to back to the index page.");
	echo '</a>' . '</p>';
}

function error_manage($zh_msg,$en_msg){
	lang_put(format_ap($zh_msg),format_ap($en_msg));
	include("include/footer.php");
	exit;
}

function random_str($length,$kind){
	//感谢原作者:露兜
	//Thanks for the author of this -- 露兜.
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	if ($kind == "char"){
		$chars = "~!@#$%^&*_+-=";
	}
	$password = '';
	
	for ($i=0;$i<$length;$i++){
		$password .= $chars[mt_rand(0,strlen($chars) - 1)];
	}
	
	return $password;
}

function db_connect($db_host,$db_user,$db_pswd,$db_iname,$db_vname){
	if ($_SESSION['user'] == "admin"){
		$db_name = $db_iname;
	} elseif ($_SESSION['user'] == "visitor"){
		$db_name = $db_vname;
		$db_user .= "_vs";
	} else {
		if ($_SESSION['login'] != true) error_manage("滚你妈的!你都没登录就想管理密码?","Go away!You didn't log in!");		
	}
	
	@$con = new mysqli($db_host,$db_user,$db_pswd,$db_name);
	
	if (mysqli_connect_errno()) error_manage("数据库连接失败!检查配置是否正确!错误代码:" . mysqli_connect_errno(),"Can't connect to database.Please check your settings.The error code is " . mysqli_connect_errno());
	
	return $con;
}

function art($zh,$en){
	lang_put(format_ap($zh),format_ap($en));
}

function logu($date,$zh,$en){
	lang_put(format_ap($date . " " . $zh),format_ap($date . " " . $en));
}
?>