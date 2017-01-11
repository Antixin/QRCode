<?php
$conn = mysqli_connect("localhost:3306","root","")   
    or die("连接数据库失败！");  
  
mysqli_select_db($conn,"test")  
    or die ("不能连接到test".mysql_error());  

$numStu=$_GET['kuang'];
$imgurl=null;

$sql = "select * from student";  
$result = mysqli_query($conn,$sql); 
mysqli_data_seek($result,0);
while($row=mysqli_fetch_array($result)){
	if($row['stuNumber']==$numStu){
		$imgurl=$row['codeurl'];
		break;
	}
}	

if(!$imgurl){
	echo "信息输入有误,无法生成二维码!!!";
}else{
	$imgurl="../images/codeimg/".$imgurl;
	
	echo "<body style='width:70%; height:70%; background:rgb(240,245,220)'>";

	echo "<div style='text-align:center; padding:0px; margin:0px;'><img id='imgcode' src='$imgurl'/></div>";

	echo "<div style='text-align:center'><canvas id='canvas' style='text-align:center; height:50%; width:auto;'>当前浏览器不支持Canvas，请更换浏览器后再试";
	echo "</canvas></div>";
	echo "<script src='digit.js'></script>";
	echo "<script src='testCountdown.js'></script>";

	echo "</body>";
}

?>