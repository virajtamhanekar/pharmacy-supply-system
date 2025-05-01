<?php 
    include 'config.php';

	if (isset($_POST['c_country']) && $_POST['c_country'] !='') {
        $c_country = $_POST['c_country'];
    }else{
        $c_country = '';
    }

	if (isset($_POST['c_fname']) && $_POST['c_fname'] !='') {
        $c_fname = $_POST['c_fname'];
    }else{
        $c_fname = '';
    }

	if (isset($_POST['c_lname']) && $_POST['c_lname'] !='') {
        $c_lname = $_POST['c_lname'];
    }else{
        $c_lname = '';
    }

	if (isset($_POST['c_companyname']) && $_POST['c_companyname'] !='') {
        $c_companyname = $_POST['c_companyname'];
    }else{
        $c_companyname = '';
    }

	if (isset($_POST['c_address']) && $_POST['c_address'] !='') {
        $c_address = $_POST['c_address'];
    }else{
        $c_address = '';
    }

	if (isset($_POST['apartment']) && $_POST['apartment'] !='') {
        $apartment = $_POST['apartment'];
    }else{
        $apartment = '';
    }

	if (isset($_POST['c_state_country']) && $_POST['c_state_country'] !='') {
        $c_state_country = $_POST['c_state_country'];
    }else{
        $c_state_country = '';
    }

	if (isset($_POST['c_postal_zip']) && $_POST['c_postal_zip'] !='') {
        $c_postal_zip = $_POST['c_postal_zip'];
    }else{
        $c_postal_zip = '';
    }

	if (isset($_POST['c_email_address']) && $_POST['c_email_address'] !='') {
        $c_email_address = $_POST['c_email_address'];
    }else{
        $c_email_address = '';
    }

	if (isset($_POST['c_phone']) && $_POST['c_phone'] !='') {
        $c_phone = $_POST['c_phone'];
    }else{
        $c_phone = '';
    }

	if (isset($_POST['c_order_notes']) && $_POST['c_order_notes'] !='') {
        $c_order_notes = $_POST['c_order_notes'];
    }else{
        $c_order_notes = '';
    }

	if (isset($_POST['total_amount']) && $_POST['total_amount'] !='') {
        $total_amount = $_POST['total_amount'];
    }else{
        $total_amount = '';
    }

    if (isset($_POST['cart_ids']) && $_POST['cart_ids'] !='') {
        $cart_ids = $_POST['cart_ids'];
    }else{
        $cart_ids = '';
    }

    if (isset($_POST['user_id']) && $_POST['user_id'] !='') {
        $user_id = $_POST['user_id'];
    }else{
        $user_id = '';
    }

    $date = date('Y-m-d');

    $sql = mysqli_query($conn, 'Insert INTO orders SET `country` = "'.$c_country.'", `firstname` = "'.$c_fname.'",`lastname` = "'.$c_lname.'", `company` = "'.$c_companyname.'",`address1` = "'.$c_address.'", `address2` = "'.$apartment.'",`state` = "'.$c_state_country.'", `zip` = "'.$c_postal_zip.'",`email` = "'.$c_email_address.'", `phone` = "'.$c_phone.'",`note` = "'.$c_order_notes.'", `total` = "'.$total_amount.'",`cart_ids` = "'.$cart_ids.'",`date` = "'.$date.'",`user_id` = "'.$user_id.'" ');

    if($sql){
    	$sql2 = mysqli_query($conn, 'UPDATE cart SET `status` = "1" WHERE `id` IN ('.$cart_ids.') ');
		$data['msg'] = 'Data Inserted SuccessFully';
		$data['status'] = '1';
		header("Location: http://localhost/pharma-master/thankyou.php");
	}else{
		$data['msg'] = 'Invaid Data';
		$data['status'] = '0';
		header("Location: http://localhost/pharma-master/checkout.php");
	}

?>