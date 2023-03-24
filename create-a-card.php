
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
    <form action="processes/processes.php" method="POST">
    <div class="offset-sm-2 col-8 row mb-3">
            <div class="col-12 mt-3 mb-4"><h3>Fill out your Application here to apply</h3></div>
            <div class="form-group col-sm-6">
                <label><strong>First Name</strong></label>
                <input class="form-control" placeholder="Enter First name" name="fname" required/>
            </div>
            <div class="form-group col-sm-6">
                <label><strong>Last Name</strong></label>
                <input class="form-control" placeholder="Enter Last name" name="lname" required/>
            </div>
            <div class="form-group col-sm-6">
                <label><strong>Email</strong></label>
                <input class="form-control" placeholder="Enter your email" name="email" required/>
            </div>
            <div class="form-group col-sm-6">
                <label><strong>Date of Birth</strong></label>
                <input type="date" class="form-control"  name="dob" required/>
            </div>

            <div class="form-group col-sm-12">
                <label><strong>Past Medical History</strong></label>
                <textarea class="form-control" rows="7" placeholder="Please enter medical conditions here E.g. Asthma, Diabetes, Heart Attack/Failure, Kidney Failure, Stroke, Mini-stroke" name="med" required></textarea>
            </div>
            
            <div class="form-group col-sm-12">
                <label><strong>Past Surgical History</strong></label>
                <textarea class="form-control" rows="7" placeholder="Please enter details of any previous operations" name="surg" required></textarea>
            </div>

            <div class="form-group col-sm-12">
                <label><strong>Drug History</strong></label>
                <textarea class="form-control" rows="7" placeholder="Please enter repeat medications here" name="drug" required></textarea>
            </div>

            <div class="form-group col-sm-12 text-danger">
                <label><strong>Allergies</strong></label>
                <textarea class="form-control text-light" style="background-color: #d84629;" rows="7" placeholder="Please enter any allergies you have" name="allergies" required></textarea>
            </div>
            <div class="col-12">
                <hr class="my-2">
                <h5 class="mt-2">Emergency Contacts</h5>
            </div>

            <div class="form-group col-sm-1 pt-4"><p class="text-bold">1.</p></div>
            <div class="form-group col-sm-6">
                <label><strong>Name</strong></label>
                <input class="form-control" placeholder="Enter their name" name="ec1name" required/>
            </div>
            <div class="form-group col-sm-5">
                <label><strong>Phone Number</strong></label>
                <input class="form-control" placeholder="Enter their phone no." name="ec1phone" required/>
            </div>

            <div class="form-group col-sm-1 pt-4">2.</div>
            <div class="form-group col-sm-6">
                <label><strong>Name</strong></label>
                <input class="form-control" placeholder="Enter their name" name="ec2name" required/>
            </div>
            <div class="form-group col-sm-5">
                <label><strong>Phone Number</strong></label>
                <input class="form-control" placeholder="Enter their phone no." name="ec2phone" required/>
            </div>

            <div class="col-sm-12 my-3">
                <button type="submit" name="create-card" class="btn btn-flat" style="background-color: #1e6442;color: white;">Continue to Payment</button>
            </div>
    </div>
</form>
</div>

<footer class="footer mt-auto py-3 text-right bg-light">
  <div class="container">
    <span class="text-muted"><span style="background-color: #245639;color: white">ICEⒸ</span></span>
  </div>
</footer>

  </div> <!-- /container -->

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