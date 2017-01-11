
<?php  
//数据库连接页面
// 连接服务器，并且选择test数据库
  
function sql_connect(){  
 
$conn = mysqli_connect("localhost:3306","root","")   
    or die("连接数据库失败！"); 

mysqli_set_charset($conn,'utf8');

//mysqli_query($conn, "set fullname 'utf8'");
  
mysqli_select_db($conn,"test")  
    or die ("不能连接到test".mysql_error());  
      
return $conn;  
}  
      
?>  