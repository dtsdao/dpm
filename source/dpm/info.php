<?php 
//DTSDAO's Password Manager
//about
//2015.11.21,22

$zh_title = "关于";
$en_title = "About";
include("include/header.php");

art("你好！我是这个程序的作者。","Hello!I’m the author for this.");
art("我是一个程序员，并且代码已经融入了我的生活，所以我习惯于用文本文档以json方式记录自己的密码。","I’m a programmer,and code is in my life.So I used to log my passwords in json in documents.");
art("但很快，我就发现了问题。","But soon,I find some problems.");
art("当我用手机注册时，我需要在我手机中找到那个文本文档。可是电脑上也有一份，我不知道哪个是最新的，哪个包含这个网站的密码。","When I registered on mobile,I had to find the document in my phone.But there was another one in my computer,I didn’t know which is the newest.");
art("为了方便，我开发了这个程序。","For easy,I developed this program.");
art("PHP我学习了相当长的一段时间，可是实践并不多。这是我第一个投入正式使用的、开放源代码的项目。它不仅使我的生活变得方便，还让我懂得运用知识。","I learn PHP for a long time,but I don’t use it a lot.This is the first one in use and open source program.It doesn’t only make my life easier,and it make me know how to use things I know.");
lang_put('<p align="center">' . "源代码可以在" . '<a href="http://www.github.com/dtsdao/" >' . "我的Github" . '</a>' . "中找到。欢迎大家提建议。因为是第一个项目，难免有些不足。" . '</p>','<p align="center">' . "You can find the source in " . '<a href="http://www.github.com/dtsdao/" >' . "my Github" . '</a>' . ".Welcome to ask some questions.There may be some problems so that this is my first program." . '</p>');
art("总之，感谢大家访问本站！","Finally,thanks for visit my website!");

echo "<br>";

art("更新日志","Update log");

$date = "2015.11.21";
logu($date,"编写完成","Finish coding.");

$date = "2015.11.22";
logu($date,"重写访客模式","Visit mod reburn.");

//$date = "date";
//logu($date,"重写访客模式","Visit mod reburn.");

back_index_link();
include("include/footer.php");
?>