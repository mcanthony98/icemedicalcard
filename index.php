
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ICE</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="icon" href="icon.png" sizes="32x32" />
    <link rel="icon" href="icon2.png" sizes="192x192" />
    <link rel="apple-touch-icon" href="icon3.png" />  
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
<div class="container">
  <h1 class="mx-5">Welcome to ICE</h1>
  <div style="text-align: justify;" class="mx-5">
    <span style="background-color: #245639;color: white">ICEⒸ</span> <span style="color: black">is designed with one purpose in mind; to arm emergency care practitioners with the best chance of helping you. When a patient presents to the medical team in an emergency setting, we are only as strong as the information we have to hand.</span>

<br />
<br />
<p >Most of the time, the sickest patients present to us in a non responsive state. If someone is not responding, too short of breath to talk, found unconscious, presenting to us after trauma, the medical history of that person is limited to say the least, and more commonly non-existent to us. We are working in a battlefield with no ammunition.

<p >But this card, and you, can help us. And ultimately help you. We WANT to save lives, and if it happens to be yours, we want to save your life.
<p >
We need the information to do this. I am a medical doctor of 20 years. I love medicine. For me it remains a noble profession, and like all things based on nobility, knowledge is our major weapon in the war against disease. I would love to see the day when all disease is wiped out; that day is far, far away, if at all.
<p >
Until then help us, the doctors, the nurses, and all the allied staff help you. Make sure we have all the information you can give us to help us help you the best we can, in case of emergency.
<p >
The card talks for you when you can’t.</div>	
</div>

<div class="text-center pb-3 pt-5 bg-light">
  <p>HELP US HELP YOU</p>
  <p>ICE WILL SAVE LIVES; ONE OF THEM MIGHT BE YOURS.</p>
</div>
</div>

<footer class="footer mt-auto py-3 text-right">
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