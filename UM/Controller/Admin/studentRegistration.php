<?php
require('../../Model/db.php');
$conn = getConnection();

$stu_id=  $_POST['stu_id'];
$c_id = $_POST['c_id'];

    $sql1= "select * from register_student where stu_id='{$stu_id}' and course_id='{$c_id}'";
    $result1=mysqli_query($conn, $sql1);
    if(mysqli_num_rows($result1)>0 )
    {
        echo 'This student is already registered for this course';
   
    }
    else
    {
    
        $sql2 = "INSERT INTO register_student (stu_id,course_id,status) VALUES('$stu_id','$c_id','active')";
        $result2 = mysqli_query($conn, $sql2); 
        if($result2)
        {
            echo 'Successfuly course Registered';
        }
       
    }


?>