<?php
session_start();
require('../../../Model/db.php');
$conn=getConnection();
$sql="select * from user where type='student'";
$result= mysqli_query($conn, $sql);
 if(isset($_SESSION['flag']))
{
?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/University-Management/Resources/css/Admin/studentList.css">
    <title>Student List</title>
</head>
<body>
<div class="container">
        <!-- top-nav started -->
        <div class="top-nav">
            <div class="left">
                <h3>AIUB</h3>
            </div>
            <div class="right">
                <ul>
                    <li><a href="/University-Management/Resources/view/Admin/Dashboard.php">Home</a> </li>
                    <li><a href="../../../Controller/Public/logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
        <!-- top-nav ended -->
        <!-- main-content started -->
        <div class="main-content">
            <div class="left-main">
                <ul>
                <li><a href="/University-Management/Resources/view/Admin/addStudent.php">ADD STUDENT</a> </li>
                    <li><a href="/University-Management/Resources/view/Admin/addFaculty.php">ADD FACULTY</a> </li>
                    <li><a href="/University-Management/Resources/view/Admin/studentList.php">STUDENT LIST</a> </li>
                    <li><a href="/University-Management/Resources/view/Admin/facultyList.php">FACULTY LIST</a> </li>
                    <li><a href="/University-Management/Resources/view/Admin/studentRegistration.php">STUDENT REGISTRATION</a> </li>
                </ul>
            </div>
            <div class="right-main">
            <center>
           <table>
               <tr>
                   <th width="200px">Name</th>
                   <th width="100px">Father Name</th>
                   <th width="200px">Mother Name</th>
                   <th width="200px">Email</th>
                   <th width="200px">Phone</th>
                   <th width="200px">Type</th>
                   <th>Action</th>
              </tr>
    <?php while($row=mysqli_fetch_array($result)){?>
    <tr>
     
        <td><?php echo $row['name'];?></td>
        <td ><?php echo $row['fname'];?></td>
        <td><?php echo $row['fname'];?></td>
        <td><?php echo $row['email'];?></td>
        <td><?php echo $row['phone'];?></td>
        <td><?php echo $row['type'];?></td>
        <td width="200px"><a href="../../../Controller/Admin/deleteStudent.php?id=<?php echo $row['id'];?>">DELETE</a></td>
   
</tr>
    <?php } ?>
       
          </table>
          </center>
            </div>
        </div>
        <!-- main-content ended -->
    </div>
</body>
</html>
<?php
}
else
{
    header('location:../Public/login.php');
}

?>