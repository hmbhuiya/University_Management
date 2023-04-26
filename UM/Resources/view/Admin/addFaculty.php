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
    <link rel="stylesheet" href="/University-Management/Resources/css/Admin/addStudent.css">
    <title>Add Student</title>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="/University-Management/Resources/js/Admin/addFaculty.js"></script>
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
                <input type="text" placeholder="Faculty name" id="fname">
                <input type="text" placeholder="Address" id="address">
                <input type="text" placeholder="Email" id="email">
                <input type="text" placeholder="Phone" id="phone">
                <input type="text" placeholder="Password" id="password">
                <button id="add_stu">SUBMIT</button>
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