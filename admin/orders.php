<?php
$pg = 3;
include "includes/header.php";
include "../includes/connect.php";
include "includes/sessions.php";

$stqry = "SELECT * FROM card_order JOIN payment ON card_order.order_id=payment.order_id JOIN delivery_address ON card_order.order_id = delivery_address.order_id ORDER BY card_order.order_id DESC";
$stres = $conn->query($stqry);
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
            <h1 class="m-0">Card Orders</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Admin</a></li>
              <li class="breadcrumb-item active">Orders</li>
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
                            <div class="card-header">
                                
                            </div>
                            <div class="card-body">

                                <table id="example1" class="table table-bordered table-striped ">
                                    <thead>
                                        <tr>
                                            <th>Client/User</th>
                                            <th>Payment Ref</th>
                                            <th>Card Status</th>
                                            <th>Date Ordered</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($strow = $stres->fetch_assoc()){
                                            $user = $strow['user_id'];
                                            $cardqry = "SELECT * FROM user WHERE user_id = '$user'";
                                            $cardres = $conn->query($cardqry);
                                            $urow = $cardres->fetch_assoc();

                                            if($strow['order_status'] == 0){
                                                $order_status = "<span class='text-danger'>Pending Printing</span>";
                                            }elseif($strow['order_status'] == 1){
                                                $order_status = "<span class='text-warning'>Shipping</span>";
                                            }elseif($strow['order_status'] == 2){
                                                $order_status = "<span class='text-success'>Complete</span>";
                                            }
                                            
                                            ?>
                                        <tr>
                                            <td><?php echo $urow['fname']." ". $urow['lname'];?><br> <small><?php echo $urow['email'];?></small></td>
                                            <td><?php echo $strow['transaction_id'];?></td>
                                            <td><?php echo $order_status;?></td>
                                            <td><?php echo $strow['date_created'];?></td>
                                            <td class="text-nowrap">
                                                <a class="btn btn-sm bg-olive viewuser" href="card-order.php?ord=<?php echo $strow['order_id'];?>" ><i class="fas fa-eye"></i> </a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                            </div>
                            <!-- /.card-body -->

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
<div class="modal fade" id="modal-view">
        <div class="modal-dialog ">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">User Information</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
            
            <div class="modal-body">
            <dl class="row">
                  <dt class="col-sm-4">First name</dt>
                  <dd class="col-sm-8" id="ufname">first name</dd>
                  <dt class="col-sm-4">Lastname</dt>
                  <dd class="col-sm-8" id="ulname">lastname</dd>
                  <dt class="col-sm-4">Email</dt>
                  <dd class="col-sm-8" id="uemail">address</dd>
                  <dt class="col-sm-4">DOB</dt>
                  <dd class="col-sm-8" id="udob">DOB</dd>
                  <dt class="col-sm-4">Gender</dt>
                  <dd class="col-sm-8" id="ugender">gender</dd>
                  <dt class="col-sm-4">IP Address</dt>
                  <dd class="col-sm-8" id="uip"></dd>
                  <dt class="col-sm-4">Location</dt>
                  <dd class="col-sm-8" id="uloc">loc</dd>
                  <dt class="col-sm-4">Bio</dt>
                  <dd class="col-sm-8" id="ubio"></dd>
                </dl>
            </div>
            <div class="modal-footer ">
              <form method="POST" action="processes/processes.php">
                <input type="hidden" name="uid" value="" id="uid">
                <button type="submit" name="force_uname" id="fuc" class="btn btn-warning">Force Username Change</button>
                <button type="submit" name="block_user" id="blockbtn" class="btn btn-danger ">Block User</button>
                <button type="submit" name="activate_user" id="unblockbtn" class="btn btn-outline-danger ">Unblock User</button>
              </form>  
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
