<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Administrator Panel - ICE Medical Card</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="../plugins/fullcalendar/main.css">

<link rel="icon" href="../icon.png" sizes="32x32" />
<link rel="icon" href="../icon2.png" sizes="192x192" />
<link rel="apple-touch-icon" href="../icon3.png" />

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