<?php
require('../../Model/db.php');
$conn = getConnection();

$f_id=  $_POST['f_id'];
$s_id = $_POST['s_id'];
$title= $_POST['title'];;
$marks= $_POST['marks'];
$c_id= $_POST['c_id'];
$exam= $_POST['exam'];

    
    
        $sql2 = "INSERT INTO result (stu_id,course_id,faculty_id,title,marks,exam) VALUES('$s_id','$c_id','$f_id','$title',
    '$marks','$exam')";
        $result2 = mysqli_query($conn, $sql2); 
        if($result2)
        {
            echo 'Uploaded';
        }
       
    


?>