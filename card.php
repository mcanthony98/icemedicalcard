<head>
  <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
<link rel="icon" href="icon.png" sizes="32x32" />
<link rel="icon" href="icon2.png" sizes="192x192" />
<link rel="apple-touch-icon" href="icon3.png" />
<style>
    body{
    font-family:Roboto;
}
.icard{
  height: 310px;
  width: 500px;
  background-image: white;
  border-radius: 20px;
  color:black;
  margin:90px;
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
  font-size: 15px;
  font-weight:550;
}
.icard-title-small-text{
  font-size: 12px;
  font-weight:400;
  color:#707070;
}
.iouter{
    margin: 20px;
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
}
.contacts-text{
  font-size: 13px;
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
        <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=https://ice.finytex.com" width="65px">
      </span>
    </div>
    <div class="iouter">
        <div class='icard-title top-line-text'>
            Hate You | 13/11/1111
            <span class='icard-title-small-text'>
              (dd/mm/yyyy)
            </span>
        </div>

        
        
       <div class='imedical-description contacts-text'>
          Jack Will: 07123456789 | Joe Bloggs: 07987654321
       </div>
       

        <div class='icard-title'>
           Past Medical History
        </div>
        <div class='imedical-description'>
            Myocardial Infarction 1981, Asthma, Hypertension, Emphacema, Asthma, Hypertension
        </div>

        <div class='icard-title'>
            Past Surgical History
         </div>
         <div class='imedical-description'>
            Cardiac Bypass 1982, Repair of knee injury, Removal of cardiac stent 1983, Cardiac Bypass 1982
         </div>

         <div class='icard-title'>
            Drug History
         </div>
         <div class='imedical-description'>
            Asprin 300mg, Clopidogrel 300mg, Atorvastatin 5mg, Lipitor 25mg, Clopidogrel 300mg, Atorvastatin 5mg
         </div>

         <div class='icard-title ired-title'>
            Allergies
         </div>
         <div class='imedical-description'>
            Penicillin,
         </div>

         
    </div>
     
  </div>
</body>