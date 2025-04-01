
<!DOCTYPE html>
<html>
<head>
<title>Oasis</title>
<style>
   
    body{
        background-image: url('photo.jpg');
        background-repeat: no-repeat;
        background-size: cover;
    }
   
</style>
</head>
<body>
    <img src="oasis.png" alt="logo" width="250" height="150" style="background-origin: padding-box;">
    <!--<p style = "font-family: Times New Roman, Times,serif;font-size:42px;font-style:italic;">
         <strong>Holiday Paradise</strong>-->
</p>
</body>
</html>
<?php
session_start();
if(isset($_SESSION["customer"])){
    header("Location: index.php");
}
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
</div>
    <?php 
    if(isset($_POST["login"])){
        $uname=$_POST["login_id"];
        $password=$_POST["password"];
        require_once "database.php";
        $query=mysqli_query($conn,"call login('$uname','$password')");
        $num=mysqli_fetch_array($query);
        if($num>0)
        {
            session_start();
            $_SESSION["customer"] = "yes";
            $_SESSION["login_id"] = $uname;
            header("Location:index.php");
            die();
        }
        else
        {
            echo "<div class='alert alert-danger'>User does not exist! </div>";
        }
    }
    ?>
    <div class="container">
        <form action="login.php" method="post">
            <p style="color:#07aaeb;"><strong> Login here! </strong></p>
            <div class="form-group">
                <input type="text" style="width: 150px;" placeholder="Enter Username:" name="login_id" class="form-control" >
            </div>
            <div class="form-group">
                <input type="password" style="width: 150px;" placeholder="Enter Password:" name="password" class="form-control">
            </div>
            <div class="form-btn">
                <input type="submit" value="login" name="login" class="btn btn-primary">
            </div>                                                                                                                    
        </form>
        <div><p style="color:blue;"><strong>Not Registered?</strong> <a href="registration.php"><strong>Register here</strong></a></p></div>
    </div>
</body>
</html>