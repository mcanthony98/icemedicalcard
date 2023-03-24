<?php 
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ICE</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
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
        <h4 class="alert-heading">Success!</h4>
        <p>Your Details have been submitted successfully.  </p>
        <hr> 
        <p class="mb-0">Your ICE Medical Card is only one step away. Make your payment below to finish up.</p>
    </div>
    <?php unset($_SESSION['card_create_success']);} ?>

    <div class="offset-sm-3 col-sm-8 text-center mt-5">
        <h4 class="mb-3">Make your Payment</h4>
        <p>Complete your application process with peace of mind! We offer secure PayPal payment for this final step, only <strong style="">$10</strong> and get your <span style="background-color: #245639;color: white">ICEⒸ</span> Medical Card shipped to you.</p>
    </div>
    <div class="offset-sm-3 col-sm-8 text-center mt-4">
        <div id="smart-button-container">
            <div style="text-align: center;">
              <div id="paypal-button-container"></div>
            </div>
          </div>
        <script src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
        <script>
          function initPayPalButton() {
            paypal.Buttons({
              style: {
                shape: 'rect',
                color: 'gold',
                layout: 'vertical',
                label: 'pay',
                
              },
      
              createOrder: function(data, actions) {
                return actions.order.create({
                  purchase_units: [{"description":"ICE Medical Card Payment.","amount":{"currency_code":"USD","value":10}}]
                });
              },
      
              onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {
                  
                  // Full available details
                  console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
      
                  // Show a success message within this page, e.g.
                  const element = document.getElementById('paypal-button-container');
                  element.innerHTML = '';
                  element.innerHTML = '<h3>Thank you for your payment!</h3>';
      
                  // Or go to another URL:  actions.redirect('thank_you.html');
                  
                });
              },
      
              onError: function(err) {
                console.log(err);
              }
            }).render('#paypal-button-container');
          }
          initPayPalButton();
        </script>
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
      
  </body>
</html>