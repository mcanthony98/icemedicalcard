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
<head>
  <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

<style>
    body{
    font-family:Roboto;
}
.icard{
  height: 290px;
  width: 380px;
  background-image: white;
  border-radius: 20px;
  color:black;
  margin:0px;
  font-size: 10px;
  box-shadow: 2px 2px 20px #707070;
}
.itop-block{
  display: inline-block;
  width:250px;
}
.icard-name{
  float:left;
  margin:18px 0px 10px 18px;
  font-size: 15px;
  font-weight:550;
}
.icard-title{
  float:left;
  width: 100%;
  position:relative;
  font-size: 10px;
  font-weight:550;
  margin-bottom: 0px;
  margin-top: 4px;
  padding-bottom: 0px;
  line-height: 10px;
}
.icard-title-small-text{
  font-size: 7px;
  font-weight:400;
  color:#707070;
  margin-bottom: 3px;
}
.iouter{
    margin: 20px 0px;
    position: absolute;
    z-index: 1;
}
.imedical-description{
  float:left;
  position:relative;
  padding: 0px 0px;
  font-size: 10px;
  font-weight:450;
  color:#313030;
  word-wrap: normal;
  word-break: break-word;
  max-width: 460px;
  min-height: 30px;
  line-height: 15px;
  margin-bottom:5px;
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
  font-size: medium;
}
.contacts-text{
  font-size: 9px;
  color: #707070;
  margin-bottom: 7px;
  min-height: 0px;
}
</style>
</head>
<body>
  <div class='icard'>
    <div class='itop-block'>
      <!--<span class='icard-name'>
        ICE Medical Card
      </span>-->
    </div>
    <div class="icard-chip">
      <span class="">
        <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=https://ice.finytex.com/medical-history.php?us=<?php echo $hrow['user_code'];?>" width="55px">
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
  <script> 
    window.print();    
</script> 
</body>

