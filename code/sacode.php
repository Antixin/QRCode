<?php  
//����ά��洢·���ļ������洢�����ݿ�
//$url�洢�����ļ�����������׺
require_once("../mysql/ms_login.php");  
require_once("../mysql/mysql_connect.php");

function code_save($url){
	$conn = sql_connect();  
		
	$sql = "select * from student";
	$result = mysqli_query($conn,$sql); 
	mysqli_data_seek($result,0);
	while($row=mysqli_fetch_array($result)){
		if($row['stuNumber']==$url){
		//	$sql = "update student set bool=1 where name='".$url."'";  
			$url_2=$url.".png";
			$sql = "update student set codeurl='".$url_2."' where stuNumber='".$url."'";  
			mysqli_query($conn,$sql);
			return true;
			break;
		}
	}
	return false;
}

?>