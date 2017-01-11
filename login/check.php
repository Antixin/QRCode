
<?php  
header("Content-Type: text/html; charset=UTF-8");
//验证界面
//这里验证教师登陆的，所以查询的teacher表单

require_once("../mysql/ms_login.php");  
require_once("../mysql/mysql_connect.php");
$conn = sql_connect();  
$nameNumber = $_POST['nameNumber'];  
$password = $_POST['password']; 
$course	= $_POST['course'];
$bol = false;

 
if($nameNumber == "")  
{  
  
    echo "请填写编号<br>";  
     echo"<script type='text/javascript'>alert('请填写编号');location='../login/';  
            </script>";  
       
  
}  
else if($password == "")  
{  
  
     //echo "请填写密码<br><a href='index.php'>返回</a>";  
    echo"<script type='text/javascript'>alert('请填写密码');location='../login/';</script>";  
      
}  
else  
{  
	$sql = "select * from teacher";  
	$result = mysqli_query($conn,$sql); 
	mysqli_data_seek($result,0);
	while($row=mysqli_fetch_array($result)){
		if($row['teaNumber']==$nameNumber){
			$bol=true;
			break;
		}
	}
	if(!$bol){
		 //echo "用户名错误<br>";  
        echo"<script type='text/javascript'>alert('编号错误');location='../login/';</script>"; 
		return;
	}
	
	$bol = false;
	if($row['teaPassword']==$password){
		$bol=true;
	}
	if(!$bol){
		 //echo "密码错误<br>";  
        echo"<script type='text/javascript'>alert('密码错误');location='../login/';</script>"; 
		return;
	}
	
	if($bol){
		$sql = "update teacher set isSign=1 where teaNumber=".$nameNumber;  
		mysqli_query($conn,$sql);
		echo "<script type='text/javascript'>location='../scan/scan.php';</script>"; 
	}
//
  
}  
?>  