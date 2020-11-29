<?php 
$username=$_POST['username'];
$password=$_POST['pass'];
$realname=$_POST['realname'];
$phonenumber=$_POST['phonenumber'];
$link = mysqli_connect('localhost','root','','test');

if(mysqli_connect_errno()){
    echo "<script>alert('Connection Failed')</script>";
}


if($_POST['submit']){
    if(mysqli_query($link,"insert into info (username,password,realname,phonenumber) values('$username','$password','$realname','$phonenumber')")){
        setcookie("uname",$username,time()+7200);
       echo "<script>alert('Creation Successfully');window.location= 'index.php';</script>";
    }else {
        echo "<script>alert('Creation Failed');history.go(-1)</script>";
    }
}
else{
    echo "<script>history.go(-1)</script>";
}
include('register.html');?>