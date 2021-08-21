<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="add.css">
    <title>Add Class</title>
</head>
<body>
    
    <div class="title">
        <div class="navbar">
            <h1><a class="dropbtn" href="dashboard.php">Dashboard</a></h1>
            <ul>
                
                <li class="dropdown">
                    <a href="" class="dropbtn">
                        <span>Classes</span>
                    </a>
                    <div class="dropdown-content" id="1">
                        <a href="add_class.php">Add Class</a>
                        <a href="edit_class.php">Edit Class</a>
                    </div>
                </li>
                
                <li class="dropdown" >
                    <a href="#" class="dropbtn">
                        <span>Students</span>
                    </a>
                    <div class="dropdown-content">
                        <a href="add_student.php">Add Student</a>
                        <a href="edit_student.php">Edit Student</a>
                    </div>
                </li>
                
                <li class="dropdown">
                    <a href="#" class="dropbtn">
                        <span>Results</span>
                    </a>
                    <div class="dropdown-content" id="3">
                        <a href="add_result.php">Add Result</a>
                        <a href="edit_result.php">Edit Result</a>
                    </div>
                </li>
                <li>
                    <a class="dropbtn" href="logout.php">
                        <span >Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main">
        <form action="" method="post">
            <fieldset>
                <legend><pre> <b>Add Class</b> </pre> </legend>
                <input type="text" name="class_name" placeholder="Class Name">
                <input type="text" name="class_id" placeholder="Class ID">
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
	include('init.php');
	include('session.php');

    if (isset($_POST['class_name'],$_POST['class_id'])) {
        $name=$_POST["class_name"];
        $id=$_POST["class_id"];

        if (empty($name) or empty($id) or preg_match("/[a-z]/i",$id)) {
            if(empty($name))
                echo '<p class="error">Please enter class</p>';
            if(empty($id))
                echo '<p class="error">Please enter class id</p>';
            if(preg_match("/[a-z]/i",$id))
                echo '<p class="error">Please enter valid class id</p>';
            exit();
        }

        $sql = "INSERT INTO `class` (`cname`, `cid`) VALUES ('$name', '$id')";
        $result=mysqli_query($conn,$sql);
        
        if (!$result) {
            echo '<script language="javascript">';
            echo 'alert("Invalid class name or class id")';
            echo '</script>';
        } else{
            echo '<script language="javascript">';
            echo 'alert("Successful)';
            echo '</script>';
        }
    }

?>