<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="edit.css">
    <title>Results SPPU</title>
	<style>
body{
    margin: 0;
    background-color: rgb(58, 6, 6);
    color: blanchedalmond;
    font-family: 'Roboto', sans-serif;
}

.title{
    font-size: 1em;
    text-align: center;
    margin-top: 10px;
}

.main{
    font-size: 20px;
    margin:auto;
    display:grid;
    grid-template-columns: 45% 55% ;
}
/* form */

input,select{
    width: 25vw;
    padding: 12px 20px;
    margin: 10px 0;
    box-sizing:border-box;
    display: block;

}
input::placeholder{
    padding: 5px;
    color: black;
    background-color: goldenrod;
    text-align: center;
}
input[type=text],input[type=password],select{
    background-color: rgb(58, 6, 6);
    color: blanchedalmond;
    border: 1px groove blanchedalmond;
    font-size: 100%;
    letter-spacing: 0.2em;
}

input[type=submit]{
    background-color: blanchedalmond;
    color: rgb(58, 6, 6);
    border: 1px solid blanchedalmond;
    transition-duration: 0.4s;
    cursor: pointer;
    font-size: 20px;
}

input[type=submit]:hover{
    background-color: rgb(58, 6, 6);
    color: blanchedalmond;
    font-variant: small-caps;
}

fieldset{
    font-size: 20px;
    border-radius: 30px;
    border:3px double blanchedalmond;
    padding: 20px;
    margin: 0 30%;
    text-align: center;
}
.heading{
    background-color:rgb(58, 6, 6);
    padding:10px;
    color: blanchedalmond;
    border: 2px double blanchedalmond;
    border-radius: 50%;
    

}
.error {
    color:greenyellow;
    margin: 30px 0 0 30vh;
}
.footer{margin-top:100px;}
	</style>
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
                <div class="dropdown-content">
                    <a href="add_class.php">Add Class</a>
                    <a href="edit_class.php">Edit Class</a>
                </div>
            </li>
            <li class="dropdown" >
                <a href="#" class="dropbtn">
                    <span >Students</span>
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
                <legend>Delete Result</legend>
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
                <input type="text" name="rno" placeholder="Roll No">
                <input type="submit" value="Delete">
            </fieldset>
        </form>
        <form action="" method="post">
            <fieldset>
                <legend>Update Result</legend>
                
                <?php
                    $cresult2 =mysqli_query($conn,"SELECT `cname` FROM `class`");
                        echo '<select name="class">';
                        echo '<option selected disabled>Select Class</option>';
                    while($row = mysqli_fetch_array($cresult2)){
                        $display=$row['cname'];
                        echo '<option value="'.$display.'">'.$display.'</option>';
                    }
                    echo'</select>'
                ?>
                
                <input type="text" name="rn" placeholder="Roll No">
                <input type="text" name="p1" id="" placeholder="Paper 1">
                <input type="text" name="p2" id="" placeholder="Paper 2">
                <input type="text" name="p3" id="" placeholder="Paper 3">
                <input type="text" name="p4" id="" placeholder="Paper 4">
                <input type="text" name="p5" id="" placeholder="Paper 5">
                <input type="submit" value="Update">
            </fieldset>
        </form>
    </div>

    <div class="footer">
        <span> &copy; copyright @ unipune officials</span>
    </div>
    
</body>
</html>

<?php
    if(isset($_POST['class_name'],$_POST['rno'])) {
        $class_name=$_POST['class_name'];
        $rno=$_POST['rno'];
        echo $class_name;
        echo $rno;
        $delete_sql=mysqli_query($conn,"DELETE from `result` where `rno`='$rno' and `class`='$class_name'");
        if(!$delete_sql){
            echo '<script language="javascript">';
            echo 'alert("Not available")';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Deleted")';
            echo '</script>';
        }
    }

    if(isset($_POST['rn'],$_POST['p1'],$_POST['p2'],$_POST['p3'],$_POST['p4'],$_POST['p5'],$_POST['class'])) {
        $rno=$_POST['rn'];
        $class_name=$_POST['class'];
        $p1=(int)$_POST['p1'];
        $p2=(int)$_POST['p2'];
        $p3=(int)$_POST['p3'];
        $p4=(int)$_POST['p4'];
        $p5=(int)$_POST['p5'];

        $marks=$p1+$p2+$p3+$p4+$p5;
        $percentage=$marks/5;
        

        $sql="UPDATE `result` SET `p1`='$p1',`p2`='$p2',`p3`='$p3',`p4`='$p4',`p5`='$p5',`marks`='$marks',`percentage`='$percentage' WHERE `rno`='$rno' and `class`='$class_name'";
        $update_sql=mysqli_query($conn,$sql);

        if(!$update_sql){
            echo '<script language="javascript">';
            echo 'alert("Invalid Details")';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Updated")';
            echo '</script>';
        }
    }
?>