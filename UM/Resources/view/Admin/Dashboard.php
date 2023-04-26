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
    <link rel="stylesheet" href="/University-Management/Resources/css/Admin/Dashboard.css">
    <title>Dashboard</title>
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
                <h3>Hello Admin. Hope so you will have a good time with us..</h3>
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