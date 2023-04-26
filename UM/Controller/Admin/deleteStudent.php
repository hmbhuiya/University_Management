<?php
    require('../../Model/db.php');
    $conn = getConnection();
    
    $id = $_GET['id'];
   
    
    $sql3 = "DELETE FROM user  WHERE id='{$id}' and type='student'";
        $result3 = mysqli_query($conn, $sql3); 
        if ($conn->query($sql3) === TRUE) {
            header('location:/University-Management/Resources/view/Admin/studentList.php');
        }


?>