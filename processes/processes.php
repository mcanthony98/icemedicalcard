<?php
    session_start();
	require "../includes/connect.php";
    include "../includes/mailler.php";
	date_default_timezone_set("Europe/London");
    $date = date("m/d/Y g:iA");
    $ddate = date("Y_m_d_H_i_s");
    if(isset($_SESSION['iceid'])){
        $iceid = $_SESSION['iceid'];
    }


/*if(isset($_POST['create-card'])){
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
    $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
    $dob = mysqli_real_escape_string($conn, $_POST["dob"]);
    $med = mysqli_real_escape_string($conn, $_POST["med"]);
    $surg = mysqli_real_escape_string($conn, $_POST["surg"]);
    $drug = mysqli_real_escape_string($conn, $_POST["drug"]);
    $allergies = mysqli_real_escape_string($conn, $_POST["allergies"]);

    $ec1name = mysqli_real_escape_string($conn, $_POST["ec1name"]);
    $ec1phone = mysqli_real_escape_string($conn, $_POST["ec1phone"]);
    $ec2name = mysqli_real_escape_string($conn, $_POST["ec2name"]);
    $ec2phone = mysqli_real_escape_string($conn, $_POST["ec2phone"]);

    $set = "0123456789";
    $pin = substr(str_shuffle($set), 0, 4);

    $uqry = "INSERT INTO user (fname, lname, email, dob, pin, date_created) VALUES ('$fname', '$lname', '$email', '$dob', '$pin', '$date')";
    $ures = $conn->query($uqry);
    $user_id = $conn->insert_id;

    $hqry = "INSERT INTO history (user_id, medical, surgical, drug, allergy) VALUES ('$user_id', '$med', '$surg', '$drug', '$allergies')";
    $hres = $conn->query($hqry);

    $eqry = "INSERT INTO emergency_contact (user_id, name, phone) VALUES ('$user_id', '$ec1name', '$ec1phone'), ('$user_id', '$ec2name', '$ec2phone')";
    $eres = $conn->query($eqry);

    $subject = "Thanks for registering your ICE Medical Card";
    $body = '
    <div style="margin-left: 50px;">
        <h2 >Thanks for registering your ICE Medical Card</h2>
        <p>Your details have been submitted to ICE Medical Card. </p>
    
        <p>To check your details later click the link below: </p>
        <p><a href="https://ice.finytex.com/login.php">Check My Details</a></p>
        <p>
            Email: '.$email.'  <br>
            Pin: '.$pin.'
        </p>
    </div>
    ';

    mailling($email, $subject, $body);

    $_SESSION["card_create_success"] = "";

    header('location: ../payment.php');
    exit();


}


else*/
if(isset($_POST['create-card-basic-info'])){
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
    $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
    $dob = mysqli_real_escape_string($conn, $_POST["dob"]);
    $set = "0123456789";
    $set2 = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $pin = substr(str_shuffle($set), 0, 4);
    $encpin = md5($pin);

    $chkqry = "SELECT * FROM user WHERE email = '$email'";
    $chkres = $conn->query($chkqry);
    if($chkres->num_rows > 0){
        $_SESSION['error'] = "Email already exists!";
    }else{

        $uqry = "INSERT INTO user (fname, lname, email, dob, pin, date_created) VALUES ('$fname', '$lname', '$email', '$dob', '$encpin', '$date')";
        $ures = $conn->query($uqry);
        $user_id = $conn->insert_id;
        $code = substr(str_shuffle($set2), 0, 12).$user_id;

        $codeqry = "UPDATE user SET user_code = '$code' WHERE user_id = '$user_id'";
        $coderes = $conn->query($codeqry);

        $hqry = "INSERT INTO history (user_id) VALUES ('$user_id')";
        $hres = $conn->query($hqry);

        $cqry = "INSERT INTO contacts (user_id) VALUES ('$user_id')";
        $cres = $conn->query($cqry);

        $subject = "Thanks for registering your ICE Medical Card";
        $body = '
        <div style="margin-left: 50px;">
            <h2 >Thanks for registering your ICE Medical Card</h2>
            <p>Your details have been submitted to ICE Medical Card. </p>
        
            <p>To check your details later click the link below: </p>
            <p><a href="https://ice.finytex.com/login.php">Check My Details</a></p>
            <p>
                Email: '.$email.'  <br>
                Pin: '.$pin.'
            </p>
        </div>
        ';

       mailling($email, $subject, $body);

        $_SESSION["iceid"] = $user_id;

    }

    header('location: ../create-a-card.php#startPoint');
    exit();

   
}

elseif(isset($_POST['med'])){
    $info = mysqli_real_escape_string($conn, $_POST["med"]);

    $hqry = "UPDATE history SET medical = '$info' WHERE user_id = '$iceid'";

    if($conn->query($hqry) === TRUE){
        $output = 1;
    }else{
        $output = 0;
    }

    echo $output;
}

elseif(isset($_POST['surg'])){
    $info = mysqli_real_escape_string($conn, $_POST["surg"]);

    $hqry = "UPDATE history SET surgical = '$info' WHERE user_id = '$iceid'";

    if($conn->query($hqry) === TRUE){
        $output = 2;
    }else{
        $output = 0;
    }

    echo $output;
}

elseif(isset($_POST['drug'])){
    $info = mysqli_real_escape_string($conn, $_POST["drug"]);

    $hqry = "UPDATE history SET drug = '$info' WHERE user_id = '$iceid'";

    if($conn->query($hqry) === TRUE){
        $output = 3;
    }else{
        $output = 0;
    }

    echo $output;
}

elseif(isset($_POST['allergies'])){
    $info = mysqli_real_escape_string($conn, $_POST["allergies"]);

    $hqry = "UPDATE history SET allergy = '$info' WHERE user_id = '$iceid'";

    if($conn->query($hqry) === TRUE){
        $output = 4;
    }else{
        $output = 0;
    }

    echo $output;
}


elseif(isset($_POST['em_conts'])){
    $ec1name = mysqli_real_escape_string($conn, $_POST["ec1name"]);
    $ec1phone = mysqli_real_escape_string($conn, $_POST["ec1phone"]);
    $ec2name = mysqli_real_escape_string($conn, $_POST["ec2name"]);
    $ec2phone = mysqli_real_escape_string($conn, $_POST["ec2phone"]);

   
    $eqry = "UPDATE contacts SET name = '$ec1name', phone = '$ec1phone', name_two = '$ec2name', phone_two = '$ec2phone' WHERE user_id = '$iceid'";

    if($conn->query($eqry) === TRUE){
        $output = 5;
    }else{
        $output = 0;
    }

    echo $output;
}

elseif(isset($_GET['logout'])){
    session_destroy();

    header('location: ../login.php');
    exit();
}


elseif(isset($_POST['login'])){
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $pass = mysqli_real_escape_string($conn, $_POST["pass"]);
    $encpass = md5($pass);

    $qry = "SELECT * FROM user WHERE email='$email' AND pin='$encpass'";
    $res = $conn->query($qry);
    if($res->num_rows == 0){
        $_SESSION['error'] = "Invalid Credentials!";
        header ("Location: ../login.php#loginForm");
    }else{
        $row = $res->fetch_assoc();
        
        $_SESSION['iceid'] = $row['user_id'];
        header ("Location: ../create-a-card.php");
    }
    exit();

}

elseif(isset($_POST["paymnt"])){
    $arr = $_POST["paymnt"];
    $output = [];

    $desc = $arr['purchase_units'][0]['description'];
    $tx_id = $arr['id'];
    $amount_paid = $arr['purchase_units'][0]['amount']['value'];
    
    $shipping = $arr['purchase_units'][0]['shipping'];
    $shippingName = $shipping['name']['full_name'];
    $shippingAddress = $shipping['address'];
    $address_line_1 = $shippingAddress['address_line_1'];
    $admin_area_2 = $shippingAddress['admin_area_2'];
    $admin_area_1 = $shippingAddress['admin_area_1'];
    $postal_code = $shippingAddress['postal_code'];
    $country_code = $shippingAddress['country_code'];

    

    $uqry = "SELECT * FROM user WHERE user_code = '$desc'";
    $ures = $conn->query($uqry);
    $urow = $ures->fetch_assoc();
    $user_id = $urow['user_id'];
    $email = $urow['email'];
    $uname = $urow["fname"]. " " . $urow["lname"];

    $ordqry = "INSERT INTO card_order (user_id, date_ordered) VALUES ('$user_id', '$date')";
    $conn->query($ordqry);
    $order_id = $conn->insert_id;

    $payqry = "INSERT INTO payment (transaction_id, amount, order_id, date_created) VALUES ('$tx_id', '$amount_paid', '$order_id', '$date')";
    $conn->query($payqry);

    $addqry = "INSERT INTO delivery_address (order_id, name, address_line_1, admin_area_2, admin_area_1, postal_code, country_code) VALUES ('$order_id', '$shippingName', '$address_line_1', '$admin_area_2', '$admin_area_1', '$postal_code', '$country_code')";
    $conn->query($addqry);


    //Email to user
    $subject = "Your ICE Medical Card is being processed.";
    $body = '
    <div style="margin-left: 50px;">
        <h2 >Your application for ICE Medical Card has been received.</h2>
        <p>Your card is being processed, and will be delivered to your address as soon as possible. </p>
    
        
    </div>
    ';

   mailling($email, $subject, $body);

   //Email to admin
   $emailadmin = "anotherdayinnewyork@gmail.com";
   $subjectadmin = "New ICE Medical Card Order";
   $bodyadmin = '
   <div style="margin-left: 50px;">
       <h2 >New Card request</h2>
       <p>A user has requested a card. </p>
   
       <p>To check the card details click the link below: </p>
       <p><a href="https://ice.finytex.com/card-order.php?ord='.$order_id.'">Check Order Details</a></p>
       <p>
           Name: '.$uname.'  <br>
           Email: '.$emailadmin.'
       </p>
   </div>
   ';

  mailling($emailadmin, $subjectadmin, $bodyadmin);

    $output["id"] = "";
    echo json_encode($output);

    //print_r ($arr);
}
?>