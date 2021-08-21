<?php
    include("init.php");
    
    $no_of_classes=mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM `class`"));
    $no_of_students=mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM `student`"));
    $no_of_result=mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM `result`"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <title>Results SPPU</title>
    <style>
        .main{
            border-radius: 10px;
            border-width: 5px;
            border-style: solid;
            padding: 20px;
            margin: 7% 20% 0 20%;
        }
    </style>
</head>
<body>
        
    <div class="title">
    <div class="navbar">
        <h1><a href="dashboard.php" class="dropbtn">Dashboard</a></h1>
        <ul>
            <li class="dropdown">
                <a href="" class="dropbtn">
                    <span>Classes</span>
                </a>
                <div class="dropdown-content">
                    <a href="add_class.php">Add Class</a>
                    <a href="edit_class.php">Edit Class</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="#" class="dropbtn">
                    <span >Students</span>
                </a>
                <div class="dropdown-content" >
                    <a href="add_student.php">Add Student</a>
                    <a href="edit_student.php">Edit Student</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="#" class="dropbtn">
                    <span>Results</span>
                </a>
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
    <div class="main">
        <?php
            echo '<p>Number of classes:'.$no_of_classes[0].'</p>';
            echo '<p>Number of students:'.$no_of_students[0].'</p>';
            echo '<p>Number of results:'.$no_of_result[0].'</p>';
        ?>
    </div>
</div>
    <div class="footer">
        <span> &copy; copyright @ unipune officials </span>
    </div>
</body>
</html>

<?php
   include('session.php');
?>