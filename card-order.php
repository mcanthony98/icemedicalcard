<?php 
session_start();
require "includes/connect.php";

if(!isset($_GET['ord'])){
  header ("Location: index.php");
	exit ();
}else{
  $ord_id = $_GET['ord'];
}

$ordqry = "SELECT * FROM card_order JOIN payment ON payment.order_id=card_order.order_id JOIN delivery_address ON delivery_address.order_id=card_order.order_id WHERE card_order.order_id = '$ord_id'";
$ordres = $conn->query($ordqry);
$ordrow = $ordres->fetch_assoc();

$u_id = $ordrow["user_id"];

$hqry = "SELECT * FROM user JOIN history ON user.user_id=history.user_id JOIN contacts ON user.user_id=contacts.user_id WHERE user.user_id = '$u_id'";
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
   <div class="jumbotron pb-1" style="background-image: linear-gradient(#0D190E, #1e6442);border-radius:0px; padding: 30px;"></div>

<div class="container row">
    <?php if(isset($_SESSION['card_create_success'])){?>
    <div class="alert alert-success offset-sm-3 col-sm-8 mb-4" role="alert">
        <h4 class="alert-heading">Success!</h4>
        <p>Your Details have been submitted successfully.  </p>
        <hr> 
        <p class="mb-0">Your ICE Medical Card is only one step away. Make your payment below to finish up.</p>
    </div>
    <?php unset($_SESSION['card_create_success']);} ?>

  </div>


    <div class="offset-sm-2 col-sm-8 text-center mt-5">
        <h2 class="mb-3">ICE Medical Card Order</h2>
    </div>



    <div class="offset-sm-4 float-center ibody iwatermark" align="center" >
      <div class='icard ' >
      <div class='itop-block'>
        
      </div>
      <div class="icard-chip">
        <span class="">
          <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=https://ice.finytex.com/medical-history.php?us=<?php echo $hrow['user_code'];?>" width="65px">
        </span>
      </div>
      
      <div class="iouter">
      <div class='icard-title top-line-text'>
        <?php echo $hrow['fname'] . " " . $hrow['lname'] . " | " . date('d/m/Y', strtotime($hrow['date_created']));?>
            <span class='icard-title-small-text'>
              (dd/mm/yyyy)
            </span>
        </div>

        
        
       <div class='imedical-description contacts-text'>
        <?php echo $hrow['name'] . ": " . $hrow['phone'] . " | " . $hrow['name_two'] . ": " . $hrow['phone_two'];?>
       </div>
       

        <div class='icard-title'>
           Past Medical History
        </div>
        <div class='imedical-description'>
          <?php echo $hrow['medical'];?>
        </div>

        <div class='icard-title'>
            Past Surgical History
         </div>
         <div class='imedical-description'>
          <?php echo $hrow['surgical'];?>
         </div>

         <div class='icard-title'>
            Drug History
         </div>
         <div class='imedical-description'>
          <?php echo $hrow['drug'];?>
         </div>

         <div class='icard-title ired-title'>
            Allergies
         </div>
         <div class='imedical-description'>
          <?php echo $hrow['allergy'];?>
         </div>
      </div>
    </div>
    </div>




    <div class="offset-sm-2 col-sm-8 text-center mt-4 mb-4">
        <h3>Delivery Address</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Date Ordered</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row"><?php echo $ordrow['name'];?></th>
                <td><?php echo $ordrow['address_line_1'] . " " . $ordrow['admin_area_2'] . " " . $ordrow['admin_area_1']. " ". $ordrow['postal_code'].", ". $ordrow['country_code'];?></td>
                <td><?php echo date('d M Y H:i', strtotime($ordrow['date_created']));?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="offset-sm-2 col-sm-8 text-center mt-4 mb-4 py-3 bg-light">
        <a href="print-card.php?ord=<?php echo $ord_id;?>" target="_blank" class="btn btn-success"><i class="fas fas-print"></i>Print Card</a>
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


