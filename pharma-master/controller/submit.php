<?php 

    include 'config.php';

	if(isset($_POST['name'])) {
		$name = $_POST['name'];
	}else{
		$name = '';
	}

	if(isset($_POST['email'])) {
		$email = $_POST['email'];
	}else{
		$email = '';
	}

	if(isset($_POST['password'])) {
		$password = $_POST['password'];
	}else{
		$password = '';
	}

	$select_user1= mysqli_query($conn,"SELECT * FROM users WHERE email='".$_POST['email']."'");

	$data = '';

	if ($select_user1->num_rows > 0) {
		$data['status'] = '2';
	}else{
		$sql = mysqli_query($conn, 'Insert INTO users SET `name` = "'.$name.'",`email` = "'.$email.'",`password` = "'.$password.'"');
	}


	if($sql){
		$data['msg'] = 'Data Inserted SuccessFully';
		$data['status'] = '1';
	}else{
		$data['msg'] = 'Invaid Data';
		$data['status'] = '0';
	}

	header("Location: http://localhost/pharma-master/register.php?status=".$data['status']);
?>