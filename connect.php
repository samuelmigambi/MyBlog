<!DOCTYPE html>
<<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

<?php
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	//connection
	$conn = new mysqli('localhost','root','','myblog');
	if ($conn->connect_error) {
		die('Connection Failed'.$conn->connect_error);
	}else{
		$stmt = $conn->prepare("insert into messages(fname,lname,email,message) values(?,?,?,?)");
		$stmt->bind_param("ssss",$fname,$lname,$email,$message);
		$stmt->execute();
		echo "<script>
				window.open('http://localhost/samuel%20migambi/index.html','_self');
			</script>";
		$stmt->close();
		$conn->close();
	}
?>

</body>
</html>