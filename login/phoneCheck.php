<?php  
header("Content-Type: text/html; charset=UTF-8");
//ÑéÖ¤½çÃæ

require_once("../mysql/ms_login.php");  
require_once("../mysql/mysql_connect.php");
$conn = sql_connect();
$name=$_POST['nameNumber'];  
$password=$_POST['password']; 
$course	= $_POST['course'];
$bol=false;

if($name == "")  
{  
  
    echo "请填写编号<br>";  
    echo"<script type='text/javascript'>alert('请填写编号');location='../login/index';  
            </script>";  
       
}  
else if($password == "")  
{  
  
    //echo "请填写密码<br><a href='index.php'>返回</a>"; 
    echo"<script type='text/javascript'>alert('请填写密码');location='../login/index';</script>";  
      
}  
else  
{  
	$sql = "select * from student";  
	$result = mysqli_query($conn,$sql); 
	mysqli_data_seek($result,0);
	while($row=mysqli_fetch_array($result)){
		if($row['stuNumber']==$name){
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
	if($row['stuPassword'] == $password){
		$bol=true;
	}
	if(!$bol){
		//echo "密码错误<br>";   
        echo"<script type='text/javascript'>alert('密码错误');location='../login/';</script>"; 
		return;
	}
	
	if($bol){
		$sql = "update student set isSign=1 where stuNumber=".$name;  
		mysqli_query($conn, $sql);
		echo "<script type='text/javascript'>location='../canvas/codeimg.php?kuang=$name';</script>"; 
	}
//
  
}  
?>  