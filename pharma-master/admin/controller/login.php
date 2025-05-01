<?php 
	session_start();
    include 'config.php';

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

	$select_user1= mysqli_query($conn,"SELECT * FROM users WHERE email='".mysqli_real_escape_string($conn, $email)."' AND password='".mysqli_real_escape_string($conn, $password)."' AND type = 'A' ");
	$user_data=mysqli_fetch_assoc($select_user1);
	// echo "<pre>"; print_r($user_data); exit;

	$data = '';

	if ($select_user1->num_rows < 0) {
		$data['status'] = '1';
		header("Location: http://localhost/pharma-master/admin?status=".$data['status']);
	}else{
		$_SESSION['user_id'] = $user_data['id'];
		$_SESSION['user_email'] = $user_data['email'];
		$_SESSION['name'] = $user_data['name'];
		$_SESSION['type'] = $user_data['type'];
		header('Location: http://localhost/pharma-master/admin/product.php');
	}

?>