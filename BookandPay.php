<!DOCTYPE html>
<html>
<head>
<title>Oasis</title>
<style>
   
    body{
        background-image: url('indeximg.jpg');
        background-repeat: no-repeat;
        background-size: cover;
    }
   
</style>
</head>
<body> <img src="oasis.png" alt="logo" width="250" height="150" style="background-origin: padding-box;"></body>
</html>
<?php
session_start();
if(!isset($_SESSION["customer"])){
    header("Location: index.php");
}
if(isset($_GET)){
    $tripp= $_GET['Trip'];
    $amnt= $_GET['price']; 
 }
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-eqiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookandPay</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="d-flex justify-content-end"> 
            <a href="logout.php" class="btn btn-dark">Logout</a>
        </div>
    <div class="container">
        <?php
        if(isset($_POST["submit"]))
        {
            $amount=$_POST["amount"];
            $date=$_POST["date"];
            $number=$_POST["accountno"];
            $dest=$_POST["destination"];
            $errors=array();
            if(empty($date) or empty($number) or empty($dest)){
                array_push($errors,"All fields are required");
            }
            if(count($errors)!=0){
               echo "<div class='alert alert-danger'>All fields are required</div>";
            }
            else{ 
                require_once "database.php";
                $sql="insert into payment(amount,date,accountno) values('$amount','$date','$number')";
                $result=mysqli_query($conn,$sql);
                $login_id = $_SESSION["login_id"];
                $sql1="select cust_id from customers where login_id='$login_id'";
                $result1 = mysqli_query($conn, $sql1);
                $row = mysqli_fetch_assoc($result1);
                $customer_id=  $row["cust_id"];
                $sql4="select payment_id from payment where accountno='$number'";
                $result4=mysqli_query($conn,$sql4);
                $row1 = mysqli_fetch_assoc($result4);
                $payment_id= $row1["payment_id"];
                $sql2="insert into pays(cust_id,payment_id) values('$customer_id','$payment_id')";
                $result2=mysqli_query($conn,$sql2);
                $sql3="insert into selects(cust_id,trip_id) values('$customer_id','$tripp')";
                $result3=mysqli_query($conn,$sql3);
                
                if($result && $result2 && $result3){
                    echo "<div class='alert alert-success'>Payment Successfull! </div>";
                    die();
                }
                else{
                    echo "<div class='alert alert-danger'>Error occured! </div>";
                }
        }
        }
        ?>
        <form action="BookandPay.php?Trip=<?php echo $tripp ?>&price=<?php echo $amnt ?>" method="post">
        <h4 style="color:#07aaeb"><strong>Fill in Details and Pay to Ensure Booking</strong></h4>
        <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" class="form-control" id="amount" name="amount"  value="<?php echo $amnt ?>" readonly>
        </div>
        <div class="form-group">
                <label for="date">Enter the date:</label>
                <input type="date" class="form-control" id="date" name="date" placeholder="Enter today's Date"> 
        </div>
        <div class="form-group">
                <label for="no">Account number:</label>
                <input type="number" class="form-control" id="no" name="accountno" placeholder="Please make sure it is correct"> 
        </div>
        <div class="form-group">
                <label for="dest">Destination:</label>
                <input type="text" class="form-control" id="dest" name="destination"> 
        </div>
        <div class="form-btn">
            <input type="submit" class="btn btn-primary" value="PAY" name="submit">
        </div>
        </form>
    </div> 
</body>
</html>
