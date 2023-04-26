<?php
session_start();
require('../../../Model/db.php');
$conn=getConnection();
$user = $_GET['id'];
$sql="select * from user where id='{$user}'";
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
    <link rel="stylesheet" href="/University-Management/Resources/css/Student/facultyDetails.css">
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
                    <li><a href="/University-Management/Resources/view/Student/Dashboard.php">Home</a> </li>
                    <li><a href="../../../Controller/Public/logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
        <!-- top-nav ended -->
        <!-- main-content started -->
        <div class="main-content">
            <div class="fcontent">
                <h3 style="text-align:center;">FACULTY INFORMATION</h3>
                <?php while($r=mysqli_fetch_array($result)){?>
                    <h4>Name: <?=$r['name']?></h4>
                    <h4>Email: <?=$r['email']?></h4>
                    <h4>Phone: <?=$r['phone']?></h4>
                    <?php }?>
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