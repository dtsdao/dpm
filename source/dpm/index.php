<?php
//DTSDAO's Password Manager
//index
//2015.11.14,15,21

session_start();

if ($_SESSION['login'] == true) {
	header("Location:manage.php");
	exit;
}

//title 
$zh_title = "Ö÷Ò³";
$en_title = "Index";

include("include/header.php");
include("include/passwords.php");
?>
<!-- header -->
<h1 align="center"><?php lang_put("µÇÂ¼","Login"); ?></h1>

<table width="30%" height="20%" align="center" border="0">
	<form method="POST" action="action.php">
		<input type="hidden" name="lang" value="<?php lang_put("zh","cn"); ?>">
		<input type="hidden" name="action" value="login">
		<tr><td align="center"><?php lang_put("ÃÜÂë","Password"); ?>:<input type="password" name="password"></td></tr>
		<tr><td align="center"><input type="submit" value="<?php lang_put("µÇÂ¼","Login"); ?>"></td></tr>
	</form>
<?php if ($if_visit) { ?>
	<form method="POST" action="action.php">
		<input type="hidden" name="lang" value="<?php lang_put("zh","cn"); ?>">
		<input type="hidden" name="action" value="visit">
		<tr><td align="center"><input type="submit" value="<?php lang_put("ÓÎ¿ÍµÇÂ¼","Visitor"); ?>"></td></tr>
	</form>
<?php } ?>
</table>

<p align="center"><a href="info.php?lang=<?php lang_put("zh","en"); ?>"><?php lang_put("¹ØÓÚ","About"); ?></a></p>
<?php include("include/footer.php"); ?>