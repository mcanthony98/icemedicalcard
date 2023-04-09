<?php 
session_start();
require "includes/connect.php";

if(!isset($_GET['us'])){
    header ("Location: index.php");
      exit ();
  }else{
    $user_code = $_GET['us'];
  }

$hqry = "SELECT * FROM user JOIN history ON user.user_id=history.user_id JOIN contacts ON user.user_id=contacts.user_id WHERE user.user_code = '$user_code'";
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
    
  
  </head>
  <body>
    <main role="main">
        
    <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron pb-1" style="background-image: linear-gradient(#0D190E, #1e6442);border-radius:0px; padding: 30px;"></div>
        <div class="container row">
            <div class="offset-sm-2 col-sm-8 text-center mt-3">
                <h4 class="mb-3">Medical History</h4>
                
                <dl class="row">
                    <dt class="col-sm-4">Name</dt>
                    <dd class="col-sm-8"><?php echo $hrow['fname'] . " " . $hrow['lname'];?>  </dd>
                    <dt class="col-sm-4">Date of Birth</dt>
                    <dd class="col-sm-8"><?php echo date('d M Y', strtotime($hrow['date_created']));?></dd>
                    <dt class="col-12">Past Medical History</dt>
                    <dd class="col-12"><?php echo $hrow['medical'];?></dd>
                    <dt class="col-12">Past Surgical History</dt>
                    <dd class="col-12"><?php echo $hrow['surgical'];?> </dd>
                    <dt class="col-12">Past Drug History</dt>
                    <dd class="col-12"><?php echo $hrow['drug'];?> </dd>
                    <dt class="col-12">Allergies</dt>
                    <dd class="col-12"><?php echo $hrow['allergy'];?> </dd>
                  </dl>


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

      
  </body>
</html>


