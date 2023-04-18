<?php
$pg = 3;
include "includes/header.php";
include "../includes/connect.php";
include "includes/sessions.php";


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

  if($ordrow['order_status'] == 0){
        $order_status = "<span class='text-danger'>Pending Printing</span>";
    }elseif($ordrow['order_status'] == 1){
        $order_status = "<span class='text-warning'>Shipping</span>";
    }elseif($ordrow['order_status'] == 2){
        $order_status = "<span class='text-success'>Complete</span>";
    }
?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  

<?php
include "includes/navbar.php";
?>

  <!-- Main Sidebar Container -->
  <?php
include "includes/sidebar.php";
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Card Order</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Admin</a></li>
              <li class="breadcrumb-item active">Card Order</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <!-- Main content -->
    <section class="content">
                    <div class="container-fluid">
                        <!-- Default box -->
                        <div class="card">
                            
                            <div class="card-body">
                            <h2 class="mb-3">ICE Medical Card Order</h2>
                            <p><strong>Order Status:</strong> <?php echo $order_status;?> <button class="btn btn-default btn-sm float-right" data-toggle="modal" data-target="#modal-change-state">Change Order Status</button></p>

                            <div class="offset-sm-3 float-center ibody iwatermark" align="center mt-2" >
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
                            <!-- /.card-body -->
                            <div class="card-footer">
                            <a href="print-card.php?ord=<?php echo $ord_id;?>" target="_blank" class="btn btn-success"><i class="fas fas-print"></i>Print Card</a>
                            </div>

                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.container-fluid -->
                </section>
                <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
include "includes/footer.php";
?>

 
</div>
<!-- ./wrapper -->


<!--MODALS-->
<div class="modal fade" id="modal-change-state">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Change Order Status</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
            
            <div class="modal-body text-center">
            <p>Change Status to:</p>
            <div class="row">
                <span class="col-sm-6">
                    <a href="processes/processes.php?changestate=1&ord=<?php echo $ord_id;?>" class=" btn btn-warning btn-flat btn-block">Shipping</a>
                </span>
                <span class="col-sm-6">
                    <a href="processes/processes.php?changestate=1&ord=<?php echo $ord_id;?>" class=" btn btn-success btn-flat btn-block">Complete</a>
                </span>
            </div>
            </div>
          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->




<?php
include "includes/scripts.php";
?>

<script >  
 $(document).ready(function(){  
      $('.editstd').click(function(){  
          var lecid = $(this).attr("id");
          $.ajax({  
                  url:"processes/processes.php",  
                  method:"POST",  
                  data:{fetch_single_lec:lecid}, 
                  dataType: 'json',
                  success:function(data){
                    $('#fname').val(data.firstname);
                    $('#lname').val(data.lastname);
                    $('#email').val(data.email);
                    $('#lecid').val(data.lecturer_id);
                  }  
          }); 
		  
      });  
 });  
 </script>

</body>
</html>
