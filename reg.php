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
<body> <img src="oasis.png" alt="logo" width="250" height="150" style="background-origin: padding-box;"></body>
</body>
</html>
<?php
session_start();
if(isset($_SESSION["customer"])){
    header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-eqiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        if(isset($_POST["submit"]))
        {
            $name=$_POST["name"];
            $mail=$_POST["mail_id"];
            $number=$_POST["number"];
            $uname=$_POST["login_id"];
            $password=$_POST["password"];
            require_once "database.php";
            if(!empty($_POST["mail_id"])){
                $result7 =mysqli_query($conn,"call isavail('$mail')");
                $count=mysqli_num_rows($result7);
                if($count>0){ 
                    $sql="insert into customers(name,mail_id,number,login_id,password) values('$name','$mail','$number','$uname','$password')";
                    $result=mysqli_query($conn,$sql);
                    if($result){
                        session_start();
                        $_SESSION["customer"] = "yes";
                        header("Location:index.php");
                        die();
                    }
                    else{
                        echo "<div class='alert alert-danger'>Error occured! </div>";
                    }
                }
                else{
                    echo "<div class='alert alert-danger'>Email Alredy exists! </div>";
                }
            }
        }
        ?>
        <form action="registration.php" method="post">
        <div class="form-group">
                <label for="fname">Full Name:</label>
                <input type="text" class="form-control" id="fname" name="name"  placeholder="Enter your full name">
        </div>
        <div class="form-group">
                <label for="mail">Email:</label>
                <input type="email" class="form-control" id="mail" name="mail_id" placeholder="Enter a valid mail ID"> 
        </div>
        <div class="form-group">
                <label for="no">Phone Number:</label>
                <input type="text" class="form-control" id="no" name="number" placeholder="make sure its valid"> 
        </div>
        <div class="form-group">
                <label for="uname">User Name:</label>
                <input type="text" class="form-control" id="uname" name="login_id" placeholder="make it unique!"> 
        </div>
        <div class="form-group">
                <label for="pword">Password:</label>
                <input type="password" class="form-control" id="pword" name="password" placeholder="Enter a strong Password">
        </div>
        <div class="form-btn">
            <input type="submit" class="btn btn-primary" value="REGISTER" name="submit">
        </div>
        </form>
        <div><p style="color:white;"><strong> Already registered?</strong><a href="login.php"><strong>Login here!</strong></a></p></div>
    </div>
    
</body>
</html>