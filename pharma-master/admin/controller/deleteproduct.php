<?php 
    include 'config.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }else{
        $id = '';
    }

    $sql="DELETE FROM products WHERE id = '".$id."' ";
	mysqli_query($conn,$sql);

    header('location: http://localhost/pharma-master/admin/product.php');

?>