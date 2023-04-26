<?php
    require('../../Model/db.php');
    $conn = getConnection();
    
    $id = $_GET['id'];
   
    
    $sql3 = "DELETE FROM result  WHERE id='{$id}'";
        $result3 = mysqli_query($conn, $sql3); 
        if ($conn->query($sql3) === TRUE) {
            header('location:/University-Management/Resources/view/Faculty/Dashboard.php');
        }


?>