
<?php  
//�����ݿ�����ȡ������֤
//��test���ݿ�����ȡ����
  
function collect_data(){  
require_once("mysql_connect.php");
$conn = sql_connect();

//����ı������������д�
$sql = "select * from student";  
$result = mysqli_query($conn,$sql);  
  
$colum= mysqli_fetch_array($result);  
  
return $colum;  
}  
  
?>  