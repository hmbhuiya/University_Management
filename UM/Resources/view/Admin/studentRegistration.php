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
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="/University-Management/Resources/js/Admin/studentRegistration.js"></script>
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

                            <th width="200px">Email</th>
                            <th width="200px">Phone</th>
                            <th width="200px">Type</th>
                            <th>Action</th>
                        </tr>
                        <?php while($row=mysqli_fetch_array($result)){?>
                        <?php
                        $sql2="select * from course";
                        $course= mysqli_query($conn, $sql2);
                        ?>
                        <tr>

                            <td><span id="stu_id"><?php echo $row['id'];?></span></td>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['email'];?></td>
                            <td>
                                <select name="course" id="course">
                                <?php while($c=mysqli_fetch_array($course)){?>
                                    <option value="<?php echo $c['id'];?>"><?php echo $c['course_name'];?></option>
                                    <?php } ?>
                                </select>
                            </td>

                            <td width="200px"><button id="courseReg">CONFIRM</button></td>

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