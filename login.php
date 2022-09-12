<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="title">
        <h1>Savitribai Phule Pune University</h1>
    </div>
    <div class="main">
        <div class="login">
            <form action="" method="post" name="login">
                <fieldset>
                    <legend class="heading">Admin</legend>
                    <input type="text" name="userid" placeholder="User Id" autocomplete="off">
                    <input type="password" name="password" placeholder="Password" autocomplete="off">
                    <input type="submit" value="Login">
                </fieldset>
            </form>    
        </div>
    </div>
</body>
</html>

<?php
    include("init.php");
    session_start();

    if (isset($_POST["userid"],$_POST["password"]))
    {
        $username=$_POST["userid"];
        $password=$_POST["password"];
        if ($username == "admin" && $password =="123" ){
            $_SESSION['login']=$username;
            header("Location: dashboard.php");
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("Invalid Username or Password")';
            echo '</script>';
        }
       /* $sql = "SELECT user_id FROM user WHERE user_id='$username' and password = '$password'";
        $result=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($result);

        if($count==1) {
            $_SESSION['login']=$username;
            header("Location: dashboard.php");
        }else {
            echo '<script language="javascript">';
            echo 'alert("Invalid Username or Password")';
            echo '</script>';
        }
        */
        
    }
?>

