<?php
$pg = 2;
include "includes/header.php";
include "../includes/connect.php";
include "includes/sessions.php";

if(!isset($_GET['user'])){
    header ("Location: clients.php");
	exit ();
}
$user = $_GET['user'];
$stqry = "SELECT * FROM user JOIN history ON user.user_id=history.user_id JOIN contacts ON user.user_id=contacts.user_id WHERE user.user_id = '$user'";
$stres = $conn->query($stqry);
$hrow = $stres->fetch_assoc();

$ordqry = "SELECT * FROM card_order JOIN payment ON card_order.order_id=payment.order_id JOIN delivery_address ON card_order.order_id = delivery_address.order_id WHERE card_order.user_id = '$user' ORDER BY card_order.order_id DESC";
$ordres = $conn->query($ordqry);
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
            <h1 class="m-0">User Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Admin</a></li>
              <li class="breadcrumb-item active">User Details</li>
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

                            <dl class="row">
                                <dt class="col-12 text-lg mb-2">Basic Information</dt>
                                <dt class="col-sm-1">Name:</dt>
                                <dd class="col-sm-5"><?php echo $hrow['fname'] . " " . $hrow['lname'];?>  </dd>
                                <dt class="col-sm-2">Date of Birth:</dt>
                                <dd class="col-sm-4"><?php echo date('d M Y', strtotime($hrow['date_created']));?></dd>
                                <dt class="col-sm-1">Email:</dt>
                                <dd class="col-sm-5"><?php echo $hrow['email'];?>  </dd>
                                <dt class="col-sm-1">Joined:</dt>
                                <dd class="col-sm-5"><?php echo $hrow['date_created'];?>  </dd>
                                <dt class="col-12 my-2"><hr/></dt>
                                <dt class="col-12 text-lg mb-2">Medical Information</dt>
                                <dt class="col-12">Past Medical History</dt>
                                <dd class="col-12"><?php echo $hrow['medical'];?></dd>
                                <dt class="col-12">Past Surgical History</dt>
                                <dd class="col-12"><?php echo $hrow['surgical'];?> </dd>
                                <dt class="col-12">Past Drug History</dt>
                                <dd class="col-12"><?php echo $hrow['drug'];?> </dd>
                                <dt class="col-12">Allergies</dt>
                                <dd class="col-12"><?php echo $hrow['allergy'];?> </dd>
                                <dt class="col-12 my-2"><hr/></dt>
                                <dt class="col-12 text-lg mb-2">Emergency Contact</dt>
                                <dt class="col-sm-1">Contact 1:</dt>
                                <dd class="col-sm-5"><?php echo $hrow['name'] . " " . $hrow['phone'];?>  </dd>
                                <dt class="col-sm-1">Contact 2:</dt>
                                <dd class="col-sm-5"><?php echo $hrow['name_two'] . " " . $hrow['phone_two'];?>  </dd>
                                <dt class="col-12 my-2"><hr/></dt>

                                <dt class="col-12 text-lg mt-4 ">ICE Medical Card Orders</dt>
                            </dl>

                            <table class="table table-bordered">
                                <thead>
                                    <tr class="text-center">
                                    <th colspan = "3">Payment</th>
                                    <th colspan = "3">Billing Information</th>
                                    <th ></th>
                                    </tr>
                                    <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">Payment Ref</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Status</th>
                                    <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($ordrow = $ordres->fetch_assoc()){
                                        if($ordrow['order_status'] == 0){
                                            $order_status = "<span class='text-danger'>Pending Printing</span>";
                                        }elseif($ordrow['order_status'] == 1){
                                            $order_status = "<span class='text-warning'>Shipping</span>";
                                        }elseif($ordrow['order_status'] == 2){
                                            $order_status = "<span class='text-success'>Complete</span>";
                                        }
                                        ?>
                                    <tr>
                                    <td><?php echo date('d M Y H:i', strtotime($ordrow['date_created']));?></td>
                                    <td scope="row"><?php echo $ordrow['transaction_id'];?></td>
                                    <td scope="row">&#163; <?php echo $ordrow['amount'];?></td>
                                    <td scope="row"><?php echo $ordrow['name'];?></td>
                                    <td><?php echo $ordrow['address_line_1'] . " " . $ordrow['admin_area_2'] . " " . $ordrow['admin_area_1']. " ". $ordrow['postal_code'].", ". $ordrow['country_code'];?></td>
                                    <td scope="row"><?php echo $order_status;?></td>
                                    <td scope="row"><a class="btn btn-sm bg-olive viewuser" href="card-order.php?ord=<?php echo $ordrow['order_id'];?>" ><i class="fas fa-eye"></i> </a></td>
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
