
<?php  
//从数据库中提取数据验证
//从test数据库中提取数据
  
function collect_data(){  
require_once("mysql_connect.php");
$conn = sql_connect();

//这里的表名变量可能有错
$sql = "select * from student";  
$result = mysqli_query($conn,$sql);  
  
$colum= mysqli_fetch_array($result);  
  
return $colum;  
}  
  
?>  