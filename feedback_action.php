<?php
include("Database.php");

if($_POST['feedbackname'] != '' && $_POST['feedbackemail'] != '' && $_POST['feedbackmessage'] != '')
{

	$feedback_name = mysqli_real_escape_string($conn,$_POST['feedbackname']);
	$feedback_email = mysqli_real_escape_string($conn,$_POST['feedbackemail']);
	$feedback_message = mysqli_real_escape_string($conn,$_POST['feedbackmessage']);
	
	$insert_record=mysqli_query($conn,"INSERT INTO feedback (`name`,`email`,`message`)VALUES('".$feedback_name."','".$feedback_email."','".$feedback_message."')");

	if(!$insert_record)
	{
		echo 2;
	}else{
		header("Location: index.php");
    exit();
	}
}

?>