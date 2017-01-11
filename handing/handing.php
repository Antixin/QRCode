<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="../bootstrap.min.css" rel="stylesheet" type="text/css">
	<title>签到效果展示</title>
	<style type="text/css">
	
	*{margin: 0px; padding: 0px;}
	.left{position: relative; float: left; width:18%; height: 100%; background: #222222; color: #ffffff; }
	.left img{ display: block; margin: 10% 15%; width: 80%; height: 25%; }
	.left div{text-indent: 15%; margin-top: 12px; }
	.numstu div{ margin-bottom: 15px; }

	.right{position: absolute; width:82%; height: 100%; top: 0px; left: 18%; }
	.top{clear: both; background: #d29153; width: 100%; height: 32%; }
	.topimg{padding-left: 5%; margin-left: 8%; width: 100%; height: 100%; }
	.topimg img{height: 100%; }

	.title{font-size: 45px;}
	.bottom{clear: both; background: #efefef; width: 100%; height: 68%; }
	.panel{width: 90%; background: #ddd1d1; margin-left: 5%;}
	.panel span{font-size: 18px; text-align: center; }
	</style>

</head>
<body>
	
	<div class="right">
		<div class="top">
		<div class="topimg">
			<img src="../images/imgpc/handingtop.jpg">
			<span class="title">签到表</span>
			<img src="../images/imgpc/handingtop.jpg">
		</div>
		</div>
		<div class="bottom">
			<div class="panel"> 
				
<?php
$kuang=$_POST['kuang']; 
if($kuang!=''){

require_once("../mysql/ms_login.php");  
require_once("../mysql/mysql_connect.php");	
	
$conn = sql_connect();   

//1.现预处理字符串，消除空格; 预处理数据库，bool全部清零先
$kuang=str_replace(' ','',$kuang);

$sql = "update student set isSign=0 where isSign=1";  
mysqli_query($conn,$sql);

//2.按字节长，切割存储在数组中
$str_len=strlen($kuang);
$array=array();            //数据存储的地方
$step=13;                   //这里的变量长度还要看学生编号的长度 -value
for($i=0;$i<$str_len;$i+=$step){
	if(strlen($kuang)>=$step){
		$array[]=substr($kuang,0,$step);
		$kuang=substr($kuang,$step);
	}else{
		$array[]=$kuang;
	}
}

//3.按照数组标识数据库 0-否，1-是；

foreach($array as $value){
	$sql = "update student set isSign=1 where stuNumber='".$value."'";  
	mysqli_query($conn,$sql);       //执行sql语句；
}

$sql = "select * from student";  
$result = mysqli_query($conn,$sql); 

$num=0;
$comestu=0;

mysqli_data_seek($result,0);
while($row=mysqli_fetch_array($result)){
	if($row['isSign']==1){
		$num++;
		$comestu++;
		echo '<label style="margin-left:8px; border:solid 2px blue; background-color:yellow; padding:2px"><span>'.$row['stuNumber'].'</span> </br> <span>'.$row['stuName'].'</span></label>';
	}else{
		$num++;
		echo '<label style="margin-left:8px; border:solid 1px blue; color:red; padding:2px"><span>'.$row['stuNumber'].'</span> </br> <span>'.$row['stuName'].'</span></label>';
	}
	if($num%8==0){
		echo '<br/><br/>';
	}else if($num%2==0){
		echo '<label style="margin-left:10%; "></label>';
	}
}
	
}else{
	echo "<script type='text/javascript'>location='../scan/scan.php';</script>";
}
?>

			</div>
		</div>
	</div>


	<div class="left">
		<img src="../images/imgpc/headLogo.png">
		<div>班长：王sir</div>
		<div>电话：15071363790</div>
		<div class="numstu" style="margin-top: 100px; margin-bottom: 190px; ">
			<div>共有：<span id="num"><?php echo $num; ?></span>人</div>
			<div>实到：<span id="comestu"><?php echo $comestu; ?></span>人</div>
			<div>未到：<span id="decomestu"><?php echo $num-$comestu; ?></span>人</div>
		</div>
	</div>

	
</body>
</html>