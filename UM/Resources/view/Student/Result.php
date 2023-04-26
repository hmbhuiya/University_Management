<?php
session_start();
require('../../../Model/db.php');
$conn=getConnection();
$c_id = $_GET['id'];
$user = $_SESSION['user']['id'];
$sql="select * from result where stu_id='{$user}' and course_id='{$c_id}'";
$sql2="select * from course where id='{$c_id}'";
$course= mysqli_query($conn, $sql2);
$result= mysqli_query($conn, $sql);
$mid= mysqli_query($conn, $sql);
$result1= mysqli_query($conn, $sql);
$mid_result = 0;
$final_result =0;
$grand_total=0;
$grade = '';
$faculty_id =0;
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
    <link rel="stylesheet" href="/University-Management/Resources/css/Student/Result.css">
    <title>Result</title>
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

        <!-- course-item section started -->
        <div class="course-item">

            <?php while($c=mysqli_fetch_array($course)){?>
            <h3><?=$c['course_name']?></h3>
            <?php }?>


            <?php while($m=mysqli_fetch_array($mid)){
                    $faculty_id = $m['faculty_id'];
                    if($m['exam'] == 'mid'){
                        $mid_result = $mid_result + $m['marks'];
                    ?>

            <?php
                }
                else if($m['exam'] == 'final'){
                    $final_result = $final_result + $m['marks'];
                }
                $grand_total = ($mid_result*0.4) + ($final_result*0.6);
                if($grand_total>=90)
                {
                    $grade='A+';
                }
                else if($grand_total>=85)
                {
                    $grade='A';
                }
                else if($grand_total>=80)
                {
                    $grade='B+';
                }
                else if($grand_total>=75)
                {
                    $grade='B';
                }
                else if($grand_total>=70)
                {
                    $grade='C+';
                }
                else if($grand_total>=65)
                {
                    $grade='C';
                }
                else if($grand_total>=60)
                {
                    $grade='D+';
                }
                else if($grand_total>=55)
                {
                    $grade='D';
                }
                else if($grand_total<50)
                {
                    $grade='F';
                }
             } ?>
            <h3>
                <?=$grade ?> (<?=$grand_total ?>)
            </h3>
            <?php
            $sql3="select * from user where id='{$faculty_id}'";
            $faculty= mysqli_query($conn, $sql3);
            while($f=mysqli_fetch_array($faculty)){
            ?>
            <a href="./facultyDetails.php?id=<?=$f['id']?>">
                <h3 style="color:blue;"><?=$f['name']?></h3>
            </a>
            <?php }?>
        </div>
        <!-- course-item section ended -->
        <!-- main-content started -->
        <div class="content">
            <div class="m-left">
                <h3>Mid Term</h3>
                <?php while($row=mysqli_fetch_array($result)){
                    if($row['exam'] == 'mid'){
                        $mid_result = $mid_result + 90;
                    ?>
                <div class="marks">
                    <h4><?=$row['title']?></h4>
                    <h4><?=$row['marks']?></h4>
                </div>
                <?php
                }
             } ?>

            </div>
            <div class="m-right">
                <h3>Final Term</h3>
                <?php while($r=mysqli_fetch_array($result1)){
                    if($r['exam'] == 'final'){
                    ?>
                <div class="marks">
                    <h4><?=$r['title']?></h4>
                    <h4><?=$r['marks']?></h4>
                </div>
                <?php
                }
             } ?>
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