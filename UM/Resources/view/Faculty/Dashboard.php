<?php
session_start();
require('../../../Model/db.php');
$conn=getConnection();
$sql="select * from course";
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
    <link rel="stylesheet" href="/University-Management/Resources/css/Faculty/Dashboard.css">
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
                    <li> <a href="./facultyDetails.php"> <span>Profile</span> </a></li>
                    <li><a href="/University-Management/Resources/view/Faculty/Dashboard.php">Home</a> </li>
                    <li><a href="../../../Controller/Public/logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
        <!-- top-nav ended -->
        <!-- main-content started -->
        <div class="main-content">
            <?php while($row=mysqli_fetch_array($result)){?>

            <div class="card">
                <h3><?=$row['course_name'] ?></h3>
                <div class="bottom">
                    <a href="./Marks.php?id=<?=$row['id'] ?>"> <span>Marks</span> </a>
                    <a href="./studentList.php?id=<?=$row['id'] ?>"> <span>Students</span> </a>
                </div>
            </div>

            <?php } ?>
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