<?php
session_start();
require('../../Model/db.php');
$conn = getConnection();
$email=$_POST['email'];
$pass=$_POST['pass'];

if($email!='' && $pass!='')
{
    
    $sql= "select * from user where email='{$email}' and password='{$pass}'";
    $result=mysqli_query($conn, $sql);
   
    if(mysqli_num_rows($result)>0 )
    {
     while($row=mysqli_fetch_array($result))
     {
     
      if($row['type'] == "admin")
      {
      $user=['id'=>$row['id']];
        $_SESSION['user']=$user;
        $_SESSION['flag']='true';
        if(isset($_POST['rememberme']))
       {
       setcookie("email", $row['email'],time() + (86400 * 30), "/");
       setcookie("password", $row['password'],time() + (86400 * 30), "/");
       header('location:/University-Management/Resources/view/Admin/Dashboard.php');
       }
       else
       {
        header('location:/University-Management/Resources/view/Admin/Dashboard.php');
       }
      
     
      }
      
    
      elseif($row['type'] == "teacher")
      {
        $user=['id'=>$row['id']];
        $_SESSION['user']=$user;
        $_SESSION['flag']='true'; 
        if(isset($_POST['rememberme']))
       {
        setcookie("email", $row['email'],time() + (86400 * 30), "/");
        setcookie("password", $row['password'],time() + (86400 * 30), "/");
       header('location:/University-Management/Resources/view/Faculty/Dashboard.php');
       }
       else
       {
        header('location:/University-Management/Resources/view/Faculty/Dashboard.php');
       }
      
      }


      elseif($row['type'] == "student")
      {
        $user=['id'=>$row['id']];
        $_SESSION['user']=$user;
        $_SESSION['flag']='true';
        if(isset($_POST['rememberme']))
       {
        setcookie("email", $row['email'],time() + (86400 * 30), "/");
        setcookie("password", $row['password'],time() + (86400 * 30), "/");
       header('location:/University-Management/Resources/view/Student/Dashboard.php');
       }
       else
       {
        header('location:/University-Management/Resources/view/Student/Dashboard.php');
       }
     
      }
      else
      {
        header('location:/University-Management/Resources/view/Public/Login.php?message=invalid');
      }

      
      
    }
      
       } 
       else {
        header('location:/University-Management/Resources/view/Public/Login.php?message=invalid');
      }
}
else
{
  header('location:/University-Management/Resources/view/Public/Login.php?message=invalid');
}

?>