<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="student.css">
    <title>SPPU Result</title>
</head>
<body>
    <?php
        include("init.php");

        if(!isset($_POST['class']))
            $class=null;
        else
            $class=$_POST['class'];
        $rno=$_POST['rno'];
        if (empty($class) or empty($rno) or preg_match("/[a-z]/i",$rno)) {
            if(empty($class))
                echo '<p class="error">Please select your class</p>';
            if(empty($rno))
                echo '<p class="error">Please enter your roll number</p>';
            if(preg_match("/[a-z]/i",$rno))
                echo '<p class="error">Please enter valid roll number</p>';
            exit();
        }

        $name_sql=mysqli_query($conn,"SELECT `sname` FROM `student` WHERE `rno`='$rno' and `class`='$class'");

        while($row = mysqli_fetch_assoc($name_sql))
        {
        $name = $row['sname'];
        }

        $result=mysqli_query($conn,"SELECT `p1`, `p2`, `p3`, `p4`, `p5`, `marks`, `percentage` FROM `result` WHERE `rno`='$rno' and `class`='$class'");
        while($row = mysqli_fetch_assoc($result))
        {
            $p1 = $row['p1'];
            $p2 = $row['p2'];
            $p3 = $row['p3'];
            $p4 = $row['p4'];
            $p5 = $row['p5'];
            $mark = $row['marks'];
            $percentage = $row['percentage'];
        }
        if(mysqli_num_rows($result)==0){
            echo "<script language='javascript'>";
	    echo "alert('no result found')";
 	    echo "</script>";
            exit();
        }
    ?>

    <div class="container">
        <div> <label class="label">Result </label></div>
        <div class="details">
            <span>Name:</span> <?php echo $name; ?> <br>
            <span>Class:</span> <?php echo $class; ?> <br>
            <span>Roll No:</span> <?php echo $rno; ?> <br>
        </div>
       
        <div class="main">
            <div class="s1">
            
                <p>Subjects</p>
                <p>Paper 1</p>
                <p>Paper 2</p>
                <p>Paper 3</p>
                <p>Paper 4</p>
                <p>Paper 5</p>
            </div>
            <div class="s2">
                <p>Marks</p>
                <?php echo '<p>'.$p1.'</p>';?>
                <?php echo '<p>'.$p2.'</p>';?>
                <?php echo '<p>'.$p3.'</p>';?>
                <?php echo '<p>'.$p4.'</p>';?>
                <?php echo '<p>'.$p5.'</p>';?>
            </div>
        </div>

        <div class="result">
            <?php echo '<p>Total Marks:&nbsp'.$mark.'</p>';?>
            <?php echo '<p>Percentage:&nbsp'.$percentage.'%</p>';?>
        </div>

        <div class="button">
            <button class="btn" onclick="window.print()">Print Result</button>
        </div>
    </div>
</body>
</html>