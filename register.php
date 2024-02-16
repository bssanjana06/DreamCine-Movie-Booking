
<?php
include("Database.php");
session_start();
if (isset($_POST['submit']))
 {
 	$username=$_POST['username'];
 	$email=$_POST['email'];
 	$mobile=$_POST['number'];
 	$city=$_POST['city'];
 	$password=$_POST['password'];
// 	$filename=$_FILES['image']['name'];
// 	echo $filename;
// $location='admin/image/'.$filename;



// $file_extension=pathinfo($location,PATHINFO_EXTENSION);
// $file_extension=strtolower($file_extension);
// $image_ext=array('jpg','png','jpeg','gif');

// $response=0;

// if(in_array($file_extension,$image_ext)){
// 	if(move_uploaded_file($_FILES['image']['tmp_name'],$location)){
// 		$response=$location;
// 	}
// }
// echo $response;

$status=1;

	// $insert_record=mysqli_query($conn,"INSERT INTO user (`username`,`email`,`mobile`,`city`,`password`)VALUES('".$username."','".$email."','".$mobile."','".$city."','".$password."')");
	// if(!$insert_record){
	// 	echo "not inserted";
	// 	die("Error: " . mysqli_error($conn));
	// }
	// else
	// {
	// 	echo "hii";
	//  //echo "<script>window.location = 'login_form.php';</script>";
	// }
	$check_duplicate_query = mysqli_query($conn, "SELECT id FROM user WHERE username = '$username' OR email = '$email'");

if (mysqli_num_rows($check_duplicate_query) > 0) {
    echo "Duplicate entry found";
} else {
	$insert_record = mysqli_prepare($conn, "INSERT INTO user (`username`,`email`,`mobile`,`city`,`password`) VALUES(?, ?, ?, ?, ?)");
	mysqli_stmt_bind_param($insert_record, "ssiss", $username, $email, $mobile, $city, $password);
	
	if (mysqli_stmt_execute($insert_record)) {
			echo "Inserted successfully";
	} else {
			echo "Error: " . mysqli_error($conn);
	}
	
	mysqli_stmt_close($insert_record);
	
	
	}

}
?>