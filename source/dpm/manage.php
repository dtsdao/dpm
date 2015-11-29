<?php 
//DTSDAO's Password Manager
//manage
//2015.11.15,20,21,22

session_start();

//title
$zh_title = "����";
$en_title = "Manage";

include("include/header.php");

if ($_SESSION['login'] != true) error_manage("�������!�㶼û��¼�����������?","Go away!You didn't log in!");

include("include/passwords.php");

$con = db_connect($db_host,$db_user,$db_pswd,$db_iname,$db_vname);

$result = $con->query("select * from password");

if (!$result) error_manage("���˵����⣬���޸����ݿ⡣","There is something wrong.Please repair your database");

if ($result->num_rows > 0) $maxline = $result->num_rows + 1; else $maxline = 1;
?>
<!-- header -->
<table border=0 align="center" width="80%">
	<tr><td align="left"><h1><?php lang_put("DTSDAO�����������","DTSDAO's Password Manager"); ?></h1></td>
	<td align="right"><a href="action.php?action=logout&lang=<?php lang_put("zh","en"); ?>"><input type="submit" value="<?php lang_put("�˳�ϵͳ","Exit"); ?>"></a></td></tr>
</table>

<table border=1 align="center" width="80%">
	<tr><th><?php lang_put("���","ID"); ?></th>
		<th><?php lang_put("վ��","Site"); ?></th>
		<th><?php lang_put("�û���","Username"); ?></th>
		<th><?php lang_put("����","Password"); ?></th>
		<th><?php lang_put("����","Action"); ?></th>
	</tr>
<?php
for ($i=1;$i<$maxline;$i++){
	$row = $result->fetch_assoc();
?>
	<tr>
		<form method="POST" action="action.php?id=<?php echo $row['id']; ?>&lang=<?php lang_put("zh","en"); ?>">
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['site']; ?></td>
			<td><input name="username" value="<?php echo $row['user']; ?>"></td>
			<td><input name="password" value="<?php echo $row['password']; ?>"></td>
			<td><input type="submit"   value="<?php lang_put("�޸�","Change"); ?>" name="action">
				<input type="submit"   value="<?php lang_put("ɾ��","Delete"); ?>" name="action">
			</td>
		</form>
	</tr>
<?php
}
$random = "Ts()" . random_str(1,"char") . "p" . $maxline . "@" . random_str(2);
?>
	<tr>
		<form method="POST" action="action.php?id=<?php echo $maxline; ?>&lang=<?php lang_put("zh","en"); ?>">
			<td><?php echo $maxline; ?></td>
			<td><input name="site"></td>
			<td><input name="username" value="dtsdao"></td>
			<td><input name="password" value="<?php echo $random;?>" type="hidden"><?php lang_put("�Զ�����","Auto increment"); ?></td>
			<td><input type="submit"   value="<?php lang_put("�½�","New"); ?>" name="action"></a></td>
		</form>
	</tr>
</table>
<?php
$con->close();

include("include/footer.php");
?>