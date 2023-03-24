
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
        <p><a class="btn bg-light" href="create-a-card.php" role="button">Create a card &raquo;</a></p>
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
    <div class="offset-sm-5 col-sm-4 row mb-3">
            <div class="col-12 mt-3 mb-2 text-center"><h3>Welcome Back</h3><p>Enter your details to proceed</p></p></div>
            
            <div class="form-group col-sm-12">
                <label><strong>Email</strong></label>
                <input class="form-control" placeholder="Enter your email" name="email" required/>
            </div>
            <div class="form-group col-sm-12">
                <label><strong>Pin</strong><br><small class="text-muted"> (Provided in the email sent when creating your card)</small></label>
                <input type="number" maxlength="4" min="0000" placeholder="Enter 4-digit pin" class="form-control"  name="dob" required/>
            </div>


            <div class="col-sm-12 my-3">
                <button type="button" name="login" class="btn btn-flat" style="background-color: #1e6442;color: white;">Check My Details</button>
            </div>
    </div>
</form>
</div>
  

<footer class="footer mt-auto py-3 text-right">
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