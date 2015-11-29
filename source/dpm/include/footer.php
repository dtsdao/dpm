
<!-- footer -->
	<p align="center">DTSDAO&copy;<?php echo date("Y"); ?></p>
<?php if($_REQUEST['lang'] == "en"){?>
	<p align="center"><a href="<?php echo $_SERVER["PHP_SELF"]?>?lang=zh">ÇÐ»»µ½ÖÐÎÄ</a></p>
<?php } elseif ((!$_REQUEST['lang'])||($_REQUEST['lang'] == "zh")){?>
	<p align="center"><a href="<?php echo $_SERVER["PHP_SELF"]?>?lang=en">Change to English</a></p>
<?php }?>
</body>
</html>