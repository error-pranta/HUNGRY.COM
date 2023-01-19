
<?php
	$firstName = $_POST['fname'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	// Database connection
	$conn = mysqli_connect('localhost','root','','hungry');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into login(fname, email, password) values(?, ?, ?)");
		$stmt->bind_param("sss",$fname, $email, $password);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>