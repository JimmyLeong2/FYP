
<?php 
$username=$_POST['username'];
$password=$_POST['pass'];
$link = mysqli_connect('localhost','root','','test');
if(mysqli_connect_errno()){
    echo "<script>alert('Connection Failed')</script>";
}

$query=mysqli_query($link,"SELECT username,password FROM info WHERE username = '$username'");//找到与输入用户名相同的信息，注意要取出的信息有两项
$row = mysqli_fetch_array($query);

if($_POST['submit']){    
    if($row['username']==$username &&$row['password']==$password){
        setcookie('uname',$username,time()+7200);
        echo "<script>alert('Login successfully');window.location= 'index.php';</script>";
    }
    else echo "<script>alert('Login failed');history.go(-1)</script>";//返回之前的页面
}
include('login.html');?>