<?php
require('../../Model/db.php');
$conn = getConnection();

$sname=  $_POST['sname'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$address = $_POST['address'];
$email= $_POST['email'];;
$phone= $_POST['phone'];
$password= $_POST['password'];
if(strlen($sname)<5)
{
    echo 'Name should be more than 5 character';
}
else if(strlen($fname)<5)
{
    echo 'Father name should be more than 5 character';
}
else if(strlen($mname)<5)
{
    echo 'Mother name should be more than 5 character';
}
else if(strlen($phone)!=11)
{
    echo 'Invalid Phone Number';
}
else if(strlen($password)<6)
{
    echo 'Password should be more than 6 character';
}
else{
    $sql1= "select * from user where email='{$email}' and type='student'";
    $result1=mysqli_query($conn, $sql1);
    if(mysqli_num_rows($result1)>0 )
    {
        echo 'This email is already registered';
   
    }
    else
    {
    
        $sql2 = "INSERT INTO user (name,fname,mname,address,email,phone,password,type) VALUES('$sname','$fname','$mname','$address','$email','$phone',
    '$password','student')";
        $result2 = mysqli_query($conn, $sql2); 
        if($result2)
        {
            echo 'Successfuly Student Registered';
        }
       
    }
}

?>