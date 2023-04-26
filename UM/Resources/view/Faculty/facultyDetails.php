<?php
session_start();
require('../../../Model/db.php');
$conn=getConnection();
$user = $_SESSION['user']['id'];
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
    <link rel="stylesheet" href="/University-Management/Resources/css/Faculty/facultyDetails.css">
    <title>Profile</title>
    <script src="https://code.jquery.com/jquery-3.6.1.js"
        integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="/University-Management/Resources/js/Faculty/editFaculty.js"></script>
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
            <div class="fcontent">
                <h3 style="text-align:center;">FACULTY INFORMATION</h3>
                <?php while($r=mysqli_fetch_array($result)){?>
                <input type="text" value="<?=$r['name']?>" placeholder="Faculty name" id="fname">
                <input type="text" value="<?=$r['address']?>" placeholder="Address" id="address">
                <input type="text" value="<?=$r['email']?>" placeholder="Email" id="email">
                <input type="text" value="<?=$r['phone']?>" placeholder="Phone" id="phone">
                <input type="text" value="<?=$r['password']?>" placeholder="Password" id="password">
                <button id="add_stu">SUBMIT</button>
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