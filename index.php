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
    header("Location: login.php");
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
    <div>
        <!--<h1>welcome!</h1>-->
        <div class="d-flex justify-content-end"> 
            <a href="logout.php" class="btn btn-dark">Logout</a>
        </div>
    </div>
    <div>
    <p style = "font-family: Times New Roman, Times,serif;font-size:42px;font-style:italic; color:#07aaeb"><strong>&nbsp Here are the trips we provide!</strong></p>
    </div>
    <div class="column">
        <div class="card">
            <img src="Coorg.jpeg" alt="Coorg" style="width:100%">
            <h1>Coorg</h1>
            <p class="price">10000rs</p>
            <p><strong>Misty hills, coffee plantations, waterfalls, and warm hospitality combine for an enchanting escape.</strong><br>Five days' trip!<br>Departure date:1/10/23<br>transport mode:Bus<br>accomodation:Hotel Taj</p>
            <p><button><a href="BookandPay.php?Trip=1&price=10000" >Book and Pay</a></button></p>
        </div>
    </div>
    <div class="column">
        <div class="card">
            <img src="Darjeeling-1.jpg" alt="Darjeeling" style="width:100%">
            <h1>Darjeeling</h1>
            <p class="price">20000rs</p>
            <p><strong>Himalayan haven, tea-covered hills, nostalgic toy train. Sip renowned tea in this picturesque paradise.</strong><br><br>Five days' trip!<br>Departure date:13/10/23<br>transport mode:Train<br>accomodation:King hotel</p>
            <p><button><a href="BookandPay.php?Trip=3&price=20000" >Book and Pay</a></button></p>
        </div>
    </div>
    <div class="column">
        <div class="card">
            <img src="Ooty.jpeg" alt="Ooty" style="width:100%">
            <h1>Ooty</h1>
            <p class="price">5000rs</p>
            <p><strong>Nilgiri Hills retreat, tea plantations, scenic toy train. Explore markets, embrace nature's beauty and colonial charm.</strong><br>Four days' trip!<br>Departure date:6/10/23<br>transport mode:Tempo Traveller<br>accomodation:star hotel</p>
            <p><button><a href="BookandPay.php?Trip=2&price=5000" >Book and Pay</a></button></p>
        </div>
    </div>
    <div class="column">
        <div class="card">
            <img src="sikkim.jpg" alt="Sikkim" style="width:100%">
            <h1>Sikkim</h1>
            <p class="price">23000rs</p>
            <p><strong>Cradled in the Himalayas, Himalayan gem, peaks, valleys, monasteries. Trek, witness rituals,find serenity.</strong><br>Four days' trip!<br>Departure date:27/10/23<br>transport mode:Train<br>accomodation:Raj hotel</p>
            <p><button><a href="BookandPay.php?Trip=4&price=23000" >Book and Pay</a></button></p>
        </div>
    </div>
</body>
</html>
