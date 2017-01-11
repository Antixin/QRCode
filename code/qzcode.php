
<?php
 
 function qzCode($content){
//引入核心库文件
include "phpqrcode/phpqrcode.php";
//定义纠错级别
$errorLevel = "L";
//定义生成图片宽度和高度;默认为3
$size = "20";

$isSave = false;

//表单传参生成内容
//$content=$_POST['numStu'];

//先创建一个文件夹，判断是否存在先
if(!is_dir('../images/codeimg/')){
	mkdir('../images/codeimg/');
}
//图片生成路径名；
$url="../images/codeimg/$content.png";
//调用QRcode类的静态方法png生成二维码图片
QRcode::png($content, $url, $errorLevel, $size);

require_once("../code/sacode.php");
$isSave = code_save($content);
return $isSave;
}

?>