<?php 
session_start();
require "includes/connect.php";
$_SESSION['card_create_success'] = "";

if(!isset($_SESSION['iceid'])){
  header ("Location: create-a-card.php");
	exit ();
}else{
  $iceid = $_SESSION['iceid'];
}

$hqry = "SELECT * FROM user JOIN history ON user.user_id=history.user_id JOIN contacts ON user.user_id=contacts.user_id WHERE user.user_id = '$iceid'";
$hres = $conn->query($hqry);
$hrow = $hres->fetch_assoc();


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ICE</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
  
 .ibody{
    font-family:Roboto;
    line-height: normal;
    text-align: left;
}  

.icard{
  height: 310px;
  width: 500px;
  background-image: white;
  border-radius: 20px;
  color:black;
  font-size: 16px;
  box-shadow: 2px 2px 20px #707070;
}
.itop-block{
  display: inline-block;
  width:400px;
}
.icard-name{
  float:left;
  margin:18px 0px 10px 18px;
  font-size: 20px;
  font-weight:550;
}
.icard-title{
  float:left;
  width: 100%;
  position:relative;
  margin-top: 3px;
  font-size: 15px;
  font-weight:550;
}
.icard-title-small-text{
  font-size: 12px;
  font-weight:400;
  color:#707070;
}
.iouter{
    margin: 15px;
    position: absolute;
    z-index: 1;
}
.imedical-description{
  float:left;
  position:relative;
  padding: 0px 0px;
  font-size: 15px;
  font-weight:450;
  color:#313030;
  word-wrap: normal;
  word-break: break-word;
  max-width: 460px;
  min-height: 30px;
}
.ired-title{
    color: red;
}
.icard-chip{
  float:right;
  margin:12px 8px 0px 0px;
  z-index: 2;
}
.top-line-text{
  font-size: large;
  margin-top: 0px;
}
.contacts-text{
  font-size: 13px;
  color: #707070;
  margin-bottom: 7px;
  min-height: 0px;
}
#background{
    position:absolute;
    z-index:-1;
    background:white;
    opacity: 0.5;
    display:block;
    min-height:30%; 
    min-width:40%;
    margin-left: 80px;
}

#bg-text
{
    color:lightgrey;
    font-size:70px;
    transform:rotate(325deg);
    -webkit-transform:rotate(325deg);
}
</style>
  
  </head>
  <body>
<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron pb-1" style="background-image: linear-gradient(#0D190E, #1e6442);min-height: 365px;border-radius:0px;">
   <div class="container row"  id="coverall">
      <div class="col-sm-6 text-right" id="onleft">
        <h1 class="text-bold text-white mt-2" style="font-size:40px;">ICE Medical Card</h1>
        <p class="" style="color:rgb(228, 218, 206); font-size:18px">with purpose in mind</p>
        <p><a class="btn bg-light" href="index.php" role="button">Home &laquo;</a></p>
      </div>
      <div class="col-sm-6 text-left"  id="onright">
        <div class="mt-3 p-2 text-center" style="width:80%;border-style: solid; border-color:white; border-radius:15px; border-width: 23px 1px;min-height: 279px;" >
            <span id="imgice" style="display:none;"><img src="icemedicalcard.png"  width="345px"></span>
        </div>
      </div>
    </div>
  </div>

<div class="container row">
    <?php if(isset($_SESSION['card_create_success'])){?>
    <div class="alert alert-success offset-sm-3 col-sm-8 mb-4" role="alert">
        <h4 class="alert-heading">Thank You! Payment Received!</h4>
        <p>We're excited to inform you that your payment has been successfully received, and your order is being processed. Our team is diligently working to prepare your <b>ICE MEDICAL CARD</b> for shipment and ensure it's delivered to you as soon as possible.  </p>
        <hr> 
        <p class="mt-2">
            <a href="index.php" class="btn btn-flat" style="background-color: #1e6442;color: white;">Finish Process</a>
        </p>
    </div>
    <?php unset($_SESSION['card_create_success']);} ?>

  </div>


</div>


<footer class="footer mt-auto py-3 text-right bg-light">
  <div class="container">
    <span class="text-muted"><span style="background-color: #245639;color: white">ICEⒸ</span></span>
  </div>
</footer>


</main>



    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.6/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script> 
$(document).ready(function(){
    $("#onleft").animate({
      left: '-25px'
    }, 2000);
    $("#onright").animate({
      top: '-50px'
    }, 2000, function(){$("#imgice").fadeIn(800);});
    
});
</script> 
<script>
  function getPayDets(arr){
    
    //localStorage.setItem("testJSON", arr); 
    if(arr.status == "COMPLETED"){
      

      $.ajax({  
        url:"processes/processes.php",  
        method:"POST",  
        data:{paymnt:arr}, 
        dataType: 'json',
        success:function(data){  
            //$('#showtopinfo').html(data);  
            document.getElementById("demot").innerHTML = JSON.stringify(data.id);
        }  
      });
    }
  }
</script>
  </body>
</html>


