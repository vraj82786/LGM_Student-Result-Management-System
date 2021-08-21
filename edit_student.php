<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type='text/css' href="home.css">
    <link rel="stylesheet" type='text/css' href="edit.css">
    <title>Results SPPU</title>
</head>
<body>
    <div class="title">   
    <div class="navbar">
        <h1><a class="dropbtn" href="dashboard.php">Dashboard</a></h1>
        <ul>
            <li class="dropdown">
                <a href="" class="dropbtn">Classes &nbsp
                    <span></span>
                </a>
                <div class="dropdown-content" id="1">
                    <a href="add_class.php">Add Class</a>
                    <a href="edit_class.php">Edit Class</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="#" class="dropbtn">Students &nbsp
                    <span></span>
                </a>
                <div class="dropdown-content" id="2">
                    <a href="add_student.php">Add Student</a>
                    <a href="edit_student.php">Edit Student</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="#" class="dropbtn">Results &nbsp
                    <span></span>
                </a>
                <div class="dropdown-content" id="3">
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
        <?php
            include('init.php');
            include('session.php');

            $sql = "SELECT `sname`, `rno`, `class` FROM `student`";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
               echo "<table>
                <caption>Edit Students</caption>
                <tr>
                <th>NAME</th>
                <th>ROLL NO</th>
                <th>CLASS</th>
                </tr>";

                while($row = mysqli_fetch_array($result))
                  {
                    echo "<tr>";
                    echo "<td>" . $row['sname'] . "</td>";
                    echo "<td>" . $row['rno'] . "</td>";
                    echo "<td>" . $row['class'] . "</td>";
                    echo "</tr>";
                  }

                echo "</table>";
            } else {
                echo "0 Students";
            }
        ?>
    </div>
    <div class="footer">
        <span> &copy; copyright @ unipune officials </span>
    </div>
</body>
</html>
