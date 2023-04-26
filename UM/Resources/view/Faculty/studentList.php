<?php
session_start();
require('../../../Model/db.php');
$conn=getConnection();
$c_id = $_GET['id'];
$user = $_SESSION['user']['id'];
$sql="select * from register_student where course_id='{$c_id}'";
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
    <script src="https://code.jquery.com/jquery-3.6.1.js"
        integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="/University-Management/Resources/js/Faculty/addMark.js"></script>
</head>

<body>
    <div class="container">
        <!-- top-nav started -->
        <div class="top-nav">
            <div class="left">
                <h3>AIUB <input type="hidden" id="faculty" value="<?=$user?>"></h3>
            </div>
            <div class="right">
                <ul>
                    <li> <a href="./facultyDetails.php"> <span>Profile</span> </a></li>
                    <li><a href="/University-Management/Resources/view/Faculty/Dashboard.php">Home</a> </li>
                    <li><a href="../../../Controller/Public/logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
        <!-- top-nav ended -->
        <!-- main-content started -->
        <div class="main-content">

            <div class="right-main">
                <center>
                    <table>
                        <tr>
                            <th width="200px">ID</th>
                            <th width="200px">Name</th>
                            <th width="200px">Status</th>
                            <th width="200px">Title</th>
                            <th width="200px">Exam</th>
                            <th width="200px">Marks</th>
                            <th width="200px">Action</th>

                        </tr>
                        <?php while($row=mysqli_fetch_array($result)){?>
                        <?php
                        $sql2="select * from user where id='{$row['stu_id']}'";
                        $result2= mysqli_query($conn, $sql2);
                     ?>
                        <tr>
                            <?php while($r=mysqli_fetch_array($result2)){?>
                            <td><span id="stu-id"><?php echo $r['id'];?></span></td>
                            <td><?php echo $r['name'];?></td>
                            <?php } ?>
                            <td><?php echo $row['status'];?> <input type="hidden" value="<?=$c_id?>" id="c_id"></td>
                            <td><input type="text" id="title" placeholder="Title"></td>
                            <td>
                                <select name="exam" id="exam">
                                    <option value="mid">Mid Exam</option>
                                    <option value="final">Final Exam</option>
                                </select>
                            </td>
                            <td><input type="number" id="marks" placeholder="Marks"></td>
                            <td><button id="add-marks">ADD MARKS</button></td>


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