<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="add.css">
    <title>Dashboard</title>
</head>
<body>

    <div class="title">
    <div class="navbar">
        <h1><a class="dropbtn" href="dashboard.php">Dashboard</a></h1>
        <ul>
            <li class="dropdown">
                <a href="" class="dropbtn"><span>Classes</span></a>
                <div class="dropdown-content">
                    <a href="add_class.php">Add Class</a>
                    <a href="edit_class.php">Edit Class</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="#" class="dropbtn"><span>Students</span></a>
                <div class="dropdown-content">
                    <a href="add_student.php">Add Student</a>
                    <a href="edit_student.php">Edit Student</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="#" class="dropbtn"><span>Results</span></a>
                <div class="dropdown-content">
                    <a href="add_result.php">Add Result</a>
                    <a href="edit_result.php">Edit Result</a>
                </div>
            </li>
            <li>
                <a href="logout.php" class="dropbtn">
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>
</div>
    <div class="main">
        <form action="" method="post">
            <fieldset>
            <legend>Enter Marks</legend>

                <?php
                    include("init.php");
                    include("session.php");

                    $cresult=mysqli_query($conn,"SELECT `cname` FROM `class`");

                    echo '<select name="class_name">';
                    echo '<option selected disabled>Select Class</option>';
                    
                        while($row = mysqli_fetch_array($cresult)) {
                            $display=$row['cname'];
                            echo '<option value="'.$display.'">'.$display.'</option>';
                        }
                    echo'</select>';                      
                ?>

                <input type="text" name="rno" placeholder="Roll No">
                <input type="text" name="p1" id="" placeholder="Paper 1">
                <input type="text" name="p2" id="" placeholder="Paper 2">
                <input type="text" name="p3" id="" placeholder="Paper 3">
                <input type="text" name="p4" id="" placeholder="Paper 4">
                <input type="text" name="p5" id="" placeholder="Paper 5">
                <input type="submit" value="Submit">
            </fieldset>
        </form>
    </div>

</body>
</html>

<?php
    if(isset($_POST['rno'],$_POST['p1'],$_POST['p2'],$_POST['p3'],$_POST['p4'],$_POST['p5']))
    {
        $rno=$_POST['rno'];
        if(!isset($_POST['class_name']))
            $class_name=null;
        else
            $class_name=$_POST['class_name'];
        $p1=(int)$_POST['p1'];
        $p2=(int)$_POST['p2'];
        $p3=(int)$_POST['p3'];
        $p4=(int)$_POST['p4'];
        $p5=(int)$_POST['p5'];

        $marks=$p1+$p2+$p3+$p4+$p5;
        $percentage=$marks/5;

        if (empty($class_name) or empty($rno) or $p1>100 or  $p2>100 or $p3>100 or $p4>100 or $p5>100 or $p1<0 or  $p2<0 or $p3<0 or $p4<0 or $p5<0 ) {
            if(empty($class_name))
                echo '<p class="error">Please select class</p>';
            if(empty($rno))
                echo '<p class="error">Please enter roll number</p>';
            if(preg_match("/[a-z]/i",$rno))
                echo '<p class="error">Please enter valid roll number</p>';
            if(preg_match("/[a-z]/i",$marks))
                echo '<p class="error">Please enter valid marks</p>';
            if($p1>100 or  $p2>100 or $p3>100 or $p4>100 or $p5>100 or $p1<0 or  $p2<0 or $p3<0 or $p4<0 or $p5<0)
                echo '<p class="error">Please enter valid marks</p>';
            exit();
        }

        $name=mysqli_query($conn,"SELECT `sname` FROM `student` WHERE `rno`='$rno' and `class`='$class_name'");
        while($row = mysqli_fetch_array($name)) {
            $display=$row['sname'];
            echo $display;
         }

        $sql="INSERT INTO `result` (`name`, `rno`, `class`, `p1`, `p2`, `p3`, `p4`, `p5`, `marks`, `percentage`) VALUES ('$display', '$rno', '$class_name', '$p1', '$p2', '$p3', '$p4', '$p5', '$marks', '$percentage')";
        $sql=mysqli_query($conn,$sql);

        if (!$sql) {
            echo '<script language="javascript">';
            echo 'alert("Invalid Details")';
            echo '</script>';
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("Successful")';
            echo '</script>';
        }
    }
?>