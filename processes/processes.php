<?php
    session_start();
	require "../includes/connect.php";
	date_default_timezone_set("Africa/Nairobi");
    $date = date("m/d/Y g:iA");
    $ddate = date("Y_m_d_H_i_s");

	//Login Page
if(isset($_POST['create-card'])){
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

    $uqry = "INSERT INTO user (fname, lname, email, dob, date_created) VALUES ('$fname', '$lname', '$email', '$dob', '$date')";
    $ures = $conn->query($uqry);
    $user_id = $conn->insert_id;

    $hqry = "INSERT INTO history (user_id, medical, surgical, drug, allergy) VALUES ('$user_id', '$med', '$surg', '$drug', '$allergies')";
    $hres = $conn->query($hqry);

    $eqry = "INSERT INTO emergency_contact (user_id, name, phone) VALUES ('$user_id', '$ec1name', '$ec1phone'), ('$user_id', '$ec2name', '$ec2phone')";
    $eres = $conn->query($eqry);

    $_SESSION["card_create_success"] = "";

    header('location: ../payment.php');
    exit();


}
