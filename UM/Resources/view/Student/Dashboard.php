<?php
session_start();
require('../../../Model/db.php');
$conn=getConnection();
$user = $_SESSION['user']['id'];
$sql="select * from register_student where stu_id='{$user}' and status='active'";
$sql3="select * from user where id='{$user}'";
$result= mysqli_query($conn, $sql);
$result3= mysqli_query($conn, $sql3);
 if(isset($_SESSION['flag']))
{
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/University-Management/Resources/css/Student/Dashboard.css">
    <title>Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="/University-Management/Resources/js/Student/editStudent.js"></script>
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
            <div class="left">
                <?php while($row=mysqli_fetch_array($result)){?>
                <?php
                        $sql2="select * from course where id='{$row['course_id']}'";
                        $result2= mysqli_query($conn, $sql2);
                ?>
                <div class="card">
                    <?php while($r=mysqli_fetch_array($result2)){?>
                    <a href="./Result.php?id=<?=$row['course_id'] ?>">
                        <h3><?=$r['course_name'] ?></h3>
                    </a>
                    <?php } ?>

                    <div class="bottom">
                        <span><?=$row['status'] ?></span>
                    </div>
                </div>

                <?php } ?>
            </div>
            <div class="right">
            <?php while($u=mysqli_fetch_array($result3)){?>
                
                <input type="text" value="<?=$u['name'] ?>" placeholder="Student name" id="sname">
                <input type="text" value="<?=$u['fname'] ?>" placeholder="Father name" id="fname">
                <input type="text" value="<?=$u['mname'] ?>" placeholder="Mother name" id="mname">
                <input type="text" value="<?=$u['address'] ?>" placeholder="Address" id="address">
                <input type="text" value="<?=$u['email'] ?>" placeholder="Email" id="email">
                <input type="text" value="<?=$u['phone'] ?>" placeholder="Phone" id="phone">
                <input type="text" value="<?=$u['password'] ?>" placeholder="Password" id="password">
                <?php
            }
                ?>
                <button id="add_stu">UPDATE</button>
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