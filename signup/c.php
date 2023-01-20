<?php
	$fname = $_POST['fname'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	// Database connection
	$conn = new mysqli('localhost','root','','hungry');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into login(fname, email, password) values(?, ?, ?)");
		$stmt->bind_param("sss", $fname, $email, $password);
		$execval = $stmt->execute();


		$stmt->close();
		$conn->close();
	}
?>