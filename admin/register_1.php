
<?php  
//注册验证，并写入到数据库中
// require_once("../mysql/ms_login.php");  
require_once("../mysql/mysql_connect.php");
$conn = sql_connect();

$fullname=$_POST['fullname'];
$numbername=$_POST['numbername'];  
$course = $_POST['course'];
$password = $_POST['password'];
$job = $_POST['job'];
$form = '';         //数据库表单变量

if($fullname=="" || $numbername=="")  
{  
    echo"姓名、编号不能为空";  
    echo"<a href='../register/register.html'>重新输入</a>";  
}  
else   
{  
    if($password == "")
    // if($password!=$pwd_again)  
    {   
        echo"密码不能为空，请重新输入！";  
        echo"<a href='../register/register.html'>重新输入</a>";  
          
    }  

    else  
    {   
        if($job == "学生"){
            $form = "student";
            $sql="insert into student(stuName,stuNumber,stuPassword, couNumber) values('$fullname', '$numbername', '$password', '$course')"; 
        }else if ($job == "教师") {
            $form = "teacher";
            $sql="insert into teacher(teaName,teaNumber,teaPassword, couNumber) values('$fullname', '$numbername', '$password', '$course')";
        }else if($job == "管理员"){
            $form = "admin";
            $sql="insert into admin(adminName, adminNumber, adminPassword) values('$fullname', '$numbername', '$password')";
        }

        $result=mysqli_query($conn, $sql);  
        if(!$result)  
        {  
            echo"注册不成功！"; 
            echo $fullname;
            echo $numbername;
            echo $password;
            echo $course;
            echo $job;
            echo"<a href='../admin/register.html'>返回</a>";  
        }  
        else   
        {  
            //需要生成图片的，仅是学生就可以啦。
            if($form == "student"){
                require_once("../code/qzcode.php");
                $isSave = qzCode($numbername);
                if($isSave){
                    echo"注册成功!五秒之后，自动跳转.....";
                    Header('Refresh:5; url=register.html');           
                }else{
                    echo"注册不成功！";
                    echo"<a href='../admin/register.html'>返回</a>";
                }
            }else{
                echo"注册成功!五秒之后，自动跳转.....";
                Header('Refresh:5; url=register.html');  
            }
        }          
    }  
}  
?>  