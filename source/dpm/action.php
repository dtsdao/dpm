<?php 
//DTSDAO's Password Manager
//action
//2015.11.15,20,21,22

session_start();

//title
$zh_title = "ע��";
$en_title = "Notice";

include("include/header.php");
include("include/passwords.php");

switch ($_REQUEST['action']) {
	case "login":
		if ($_SESSION['wrong'] == 4){
			lang_put(format_ap("����!��û������!"),format_ap("Go away!You used all your chances!"));
			
			back_index_link();
			
			break;
		}
		
		if ($_POST['password'] == $ad_pw){
			$_SESSION['login'] = true;
			$_SESSION['user'] = "admin";
			
			lang_put(format_ap("��¼�ɹ�!ʮ���ת������ҳ��..."),format_ap("Logged in successfully!You will go to manage page in 10 seconds..."));
			echo '<script>setTimeout(window.location.href="manage.php?';
			lang_put("lang=zh","lang=en");
			echo '",10000);</script>';
			break;
		} else {
			if (!$_SESSION['wrong']){
				$_SESSION['wrong'] = 0;
			}
			
			$_SESSION['wrong']++;
			
			lang_put('<p align="center">' . "������!�������!�㻹ʣ ",'<p align="center">' . "Fuck you!Wrong password!You've got ");
			echo 5-$_SESSION['wrong'];
			lang_put(" �λ���!" . '</p>'," chance(s) left!" . '</p>');
			echo "<br>";
			
			back_index_link();
		}
		break;
	case "logout":
		if ($_SESSION['login'] == true){
			if ($_SESSION['user'] == "visitor"){
				$con = db_connect($db_host,$db_user,$db_pswd,$db_iname,$db_vname);
				$result = $con->query("delete from password;");
				if (!$result) error_manage("���˵����⣬���޸����ݿ⡣","There is something wrong.Please repair your database");
			}
			
			unset($_SESSION['login']);
			unset($_SESSION['user']);
			session_destroy;
			
			lang_put(format_ap("�ǳ��ɹ�!"),format_ap("Logged out successfully!"));
			
			back_index_link();
		} else {
			lang_put(format_ap("����쵰����¼����ǳ�?"),format_ap("You a big bitch without logging in want to log out?"));
		}
		break;
	case "�޸�":
		if ($_SESSION['login'] != true) error_manage("�������!�㶼û��¼�����������?","Go away!You didn't log in!");
		
		$con = db_connect($db_host,$db_user,$db_pswd,$db_iname,$db_vname);
		$postid = $_GET['id'];
		$postuser = $_POST['username'];
		$postpswd = $_POST['password'];
		
		if (!get_magic_quotes_gpc()) $postpswd = addslashes($postpswd);
		if ((!$postid) || (!$postpswd) || (!$postuser)) error_manage("ȱ���޸���Ŀ������Ϣ!������","Can not find the important information.Please try again");
		
		$result = $con->query("update password set password = '" . $postpswd . "' where id = " . $postid);
		if (!$result) error_manage("���˵����⣬�����������ݺ����ݿ�","There is something wrong.Please check your inputs and database");
	
		$result = $con->query("update password set user = '" . $postuser . "' where id = " . $postid);
		if (!$result) error_manage("���˵����⣬�����������ݺ����ݿ�","There is something wrong.Please check your inputs and database");
		
		lang_put(format_ap("�޸�����ɹ�!"),format_ap("Change the password successfully!"));
		
		back_index_link();
		
		$con->close();
		break;
	case "�½�":
		if ($_SESSION['login'] != true) error_manage("�������!�㶼û��¼�����������?","Go away!You didn't log in!");
		
		$con = db_connect($db_host,$db_user,$db_pswd,$db_iname,$db_vname);
		$postid = $_GET['id'];
		$postsite = $_POST['site'];
		$postuser = $_POST['username'];
		$postpswd = $_POST['password'];
		if ((!$postid) || (!$postsite) || (!$postuser) || (!$postpswd)) error_manage("ȱ���޸���Ŀ������Ϣ!������","Can not find the important information.Please try again");
		if (strpos($postpswd,"()")) $postpswd = str_replace("()",strtoupper($postsite[0]),$postpswd);
		if (!get_magic_quotes_gpc()){
			$postpswd = addslashes($postpswd);
			$postsite = addslashes($postsite);
		}
		$query = "insert into password values(" . $postid . ",'" . $postsite . "','" . $postuser . "','" . $postpswd . "')";
		$result = $con->query($query);
		if ((!$result) || ($con->affected_rows < 1)) error_manage("���˵����⣬�����������ݺ����ݿ�","There is something wrong.Please check your inputs and database");
	
		lang_put(format_ap("�����Ŀ�ɹ�!"),format_ap("Insert the log successfully!"));
		
		back_index_link();
		
		$con->close();
		break;
	case "ɾ��":
		if ($_SESSION['login'] != true) error_manage("�������!�㶼û��¼�����������?","Go away!You didn't log in!");
		
		$con = db_connect($db_host,$db_user,$db_pswd,$db_iname,$db_vname);
		$postid = $_GET['id'];
		
		if (!$postid) error_manage("ȱ���޸���Ŀ������Ϣ!������","Can not find the important information.Please try again");
		
		$result = $con->query("delete from password where id = " . $postid);
		if ((!$result) || ($con->affected_rows < 1)) error_manage("���˵����⣬�����������ݺ����ݿ�","There is something wrong.Please check your inputs and database");
	
		lang_put(format_ap("ɾ����Ŀ�ɹ�!"),format_ap("Delete the log successfully!"));
		
		back_index_link();
		
		$con->close();
		break;
	case "Change":
		if ($_SESSION['login'] != true) error_manage("�������!�㶼û��¼�����������?","Go away!You didn't log in!");
		
		$con = db_connect($db_host,$db_user,$db_pswd,$db_iname,$db_vname);
		$postid = $_GET['id'];
		$postuser = $_POST['username'];
		$postpswd = $_POST['password'];
		
		if (!get_magic_quotes_gpc()) $postpswd = addslashes($postpswd);
		if ((!$postid) || (!$postpswd) || (!$postuser)) error_manage("ȱ���޸���Ŀ������Ϣ!������","Can not find the important information.Please try again");
		
		$result = $con->query("update password set password = '" . $postpswd . "' where id = " . $postid);
		if (!$result) error_manage("���˵����⣬�����������ݺ����ݿ�","There is something wrong.Please check your inputs and database");
	
		$result = $con->query("update password set user = '" . $postuser . "' where id = " . $postid);
		if (!$result) error_manage("���˵����⣬�����������ݺ����ݿ�","There is something wrong.Please check your inputs and database");
		
		lang_put(format_ap("�޸�����ɹ�!"),format_ap("Change the password successfully!"));
		
		back_index_link();
		
		$con->close();
		break;
	case "New":
		if ($_SESSION['login'] != true) error_manage("�������!�㶼û��¼�����������?","Go away!You didn't log in!");
		
		$con = db_connect($db_host,$db_user,$db_pswd,$db_iname,$db_vname);
		$postid = $_GET['id'];
		$postsite = $_POST['site'];
		$postuser = $_POST['username'];
		$postpswd = $_POST['password'];
		if ((!$postid) || (!$postsite) || (!$postuser) || (!$postpswd)) error_manage("ȱ���޸���Ŀ������Ϣ!������","Can not find the important information.Please try again");
		if (strpos($postpswd,"()")) $postpswd = str_replace("()",strtoupper($postsite[0]),$postpswd);
		if (!get_magic_quotes_gpc()){
			$postpswd = addslashes($postpswd);
			$postsite = addslashes($postsite);
		}
		$query = "insert into password values(" . $postid . ",'" . $postsite . "','" . $postuser . "','" . $postpswd . "')";
		$result = $con->query($query);
		if ((!$result) || ($con->affected_rows < 1)) error_manage("���˵����⣬�����������ݺ����ݿ�","There is something wrong.Please check your inputs and database");
	
		lang_put(format_ap("�����Ŀ�ɹ�!"),format_ap("Insert the log successfully!"));
		
		back_index_link();
		
		$con->close();
		break;
	case "Delete":
		if ($_SESSION['login'] != true) error_manage("�������!�㶼û��¼�����������?","Go away!You didn't log in!");
		
		$con = db_connect($db_host,$db_user,$db_pswd,$db_iname,$db_vname);
		$postid = $_GET['id'];
		
		if (!$postid) error_manage("ȱ���޸���Ŀ������Ϣ!������","Can not find the important information.Please try again");
		
		$result = $con->query("delete from password where id = " . $postid);
		if ((!$result) || ($con->affected_rows < 1)) error_manage("���˵����⣬�����������ݺ����ݿ�","There is something wrong.Please check your inputs and database");
	
		lang_put(format_ap("ɾ����Ŀ�ɹ�!"),format_ap("Delete the log successfully!"));
		
		back_index_link();
		
		$con->close();
		break;
	case "visit":
		if ($if_visit) {
			$_SESSION['login'] = true;
			$_SESSION['user'] = "visitor";
			
			lang_put(format_ap("ע��!������ʹ�÷ÿ��û�!�����������ʹ�����ݿ����ӿ���ʧ��!"),format_ap("Notice:You are using visitor account.If somebody is also using it you may be not able to connect to database."));
			lang_put(format_ap("��������Ե�¼"),format_ap("Click the link to login."));
			
			back_index_link();
			break;
		} else {
			error_manage("�ÿ�ģʽ�ѹر�","Visit mod is off.");
		}
		break;
	default:
		lang_put(format_ap("��������!"),format_ap("Bad request!"));
		
		back_index_link();
		break;
}

include("include/footer.php");
?>