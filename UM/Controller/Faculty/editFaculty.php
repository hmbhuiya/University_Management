<?php
session_start();
require('../../Model/db.php');
$conn = getConnection();
$user = $_SESSION['user']['id'];
$sname=  $_POST['sname'];
$address = $_POST['address'];
$email= $_POST['email'];;
$phone= $_POST['phone'];
$password= $_POST['password'];
if(strlen($sname)<5)
{
    echo 'Name should be more than 5 character';
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
    
        $sql2 = "UPDATE user SET name='{$sname}',
        address='{$address}',phone='{$phone}',password='{$password}'
         WHERE id='{$user}'";
        $result2 = mysqli_query($conn, $sql2); 
        if($result2)
        {
            echo 'Successfuly Faculty Updated';
        }
       
    }


?>