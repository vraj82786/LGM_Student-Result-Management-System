<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="home.css">
    <link rel="stylesheet" type="text/css" href="add.css">
    <title>Add Students</title>
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
                <a href="logout.php" class="dropbtn"><span>Logout</span></a>
            </li>
        </ul>
    </div>
</div>
    <div class="main">
        <form action="" method="post">
            <fieldset>
                <legend>Add Student</legend>
                <input type="text" name="student_name" placeholder="Student Name">
                <input type="text" name="roll_no" placeholder="Roll No">
                <?php
                    include('init.php');
                    include('session.php');
                    
                    $cresult=mysqli_query($conn,"SELECT `cname` FROM `class`");
                        echo '<select name="class_name">';
                        echo '<option selected disabled>Select Class</option>';
                    while($row = mysqli_fetch_array($cresult)){
                        $display=$row['cname'];
                        echo '<option value="'.$display.'">'.$display.'</option>';
                    }
                    echo'</select>'
                ?>
                <input type="submit" value="Submit">
            </fieldset>
        </form>
    </div>

    <div class="footer">
        <span> &copy; copyright @ unipune officials </span> 
    </div>
</body>
</html>

<?php

    if(isset($_POST['student_name'],$_POST['roll_no'])) {
        $name=$_POST['student_name'];
        $rno=$_POST['roll_no'];
        if(!isset($_POST['class_name']))
            $class_name=null;
        else
            $class_name=$_POST['class_name'];

        if (empty($name) or empty($rno) or empty($class_name) or preg_match("/[a-z]/i",$rno) or !preg_match("/^[a-zA-Z ]*$/",$name)) {
            if(empty($name))
                echo '<p class="error">Please enter name</p>';
            if(empty($class_name))
                echo '<p class="error">Please select your class</p>';
            if(empty($rno))
                echo '<p class="error">Please enter your roll number</p>';
            if(preg_match("/[a-z]/i",$rno))
                echo '<p class="error">Please enter valid roll number</p>';
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                    echo '<p class="error">Only alphabets to be in student name</p>'; 
                  }
            exit();
        }
        
        $sql = "INSERT INTO `student` (`sname`, `rno`, `class`) VALUES ('$name', '$rno', '$class_name')";
        $result=mysqli_query($conn,$sql);
        
        if (!$result) {
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