<?php 
//DTSDAO's Password Manager
//about
//2015.11.21,22

$zh_title = "����";
$en_title = "About";
include("include/header.php");

art("��ã����������������ߡ�","Hello!I��m the author for this.");
art("����һ������Ա�����Ҵ����Ѿ��������ҵ����������ϰ�������ı��ĵ���json��ʽ��¼�Լ������롣","I��m a programmer,and code is in my life.So I used to log my passwords in json in documents.");
art("���ܿ죬�Ҿͷ��������⡣","But soon,I find some problems.");
art("�������ֻ�ע��ʱ������Ҫ�����ֻ����ҵ��Ǹ��ı��ĵ������ǵ�����Ҳ��һ�ݣ��Ҳ�֪���ĸ������µģ��ĸ����������վ�����롣","When I registered on mobile,I had to find the document in my phone.But there was another one in my computer,I didn��t know which is the newest.");
art("Ϊ�˷��㣬�ҿ������������","For easy,I developed this program.");
art("PHP��ѧϰ���൱����һ��ʱ�䣬����ʵ�������ࡣ�����ҵ�һ��Ͷ����ʽʹ�õġ�����Դ�������Ŀ��������ʹ�ҵ������÷��㣬�����Ҷ�������֪ʶ��","I learn PHP for a long time,but I don��t use it a lot.This is the first one in use and open source program.It doesn��t only make my life easier,and it make me know how to use things I know.");
lang_put('<p align="center">' . "Դ���������" . '<a href="http://www.github.com/dtsdao/" >' . "�ҵ�Github" . '</a>' . "���ҵ�����ӭ����Ὠ�顣��Ϊ�ǵ�һ����Ŀ��������Щ���㡣" . '</p>','<p align="center">' . "You can find the source in " . '<a href="http://www.github.com/dtsdao/" >' . "my Github" . '</a>' . ".Welcome to ask some questions.There may be some problems so that this is my first program." . '</p>');
art("��֮����л��ҷ��ʱ�վ��","Finally,thanks for visit my website!");

echo "<br>";

art("������־","Update log");

$date = "2015.11.21";
logu($date,"��д���","Finish coding.");

$date = "2015.11.22";
logu($date,"��д�ÿ�ģʽ","Visit mod reburn.");

//$date = "date";
//logu($date,"��д�ÿ�ģʽ","Visit mod reburn.");

back_index_link();
include("include/footer.php");
?>