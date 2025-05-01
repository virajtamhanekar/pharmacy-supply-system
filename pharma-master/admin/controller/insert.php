<?php 

    include 'config.php';
    
// echo "<pre>"; print_r($_POST); 
// echo "<pre>"; print_r($_FILES); exit;

    if(isset($_POST['submit'])) {

    	if (isset($_POST['name'])) {
	        $name=$_POST['name'];
	    }else{
	        $name='';
	    }

    	if (isset($_POST['price'])) {
	        $price=$_POST['price'];
	    }else{
	        $price='';
	    }

    	if (isset($_POST['saleprice'])) {
	        $saleprice=$_POST['saleprice'];
	    }else{
	        $saleprice='';
	    }

    	if (isset($_POST['image'])) {
	        $image=$_POST['image'];
	    }else{
	        $image='';
	    }

    	if (isset($_POST['material'])) {
	        $material=$_POST['material'];
	    }else{
	        $material='';
	    }

    	if (isset($_POST['description'])) {
	        $description=$_POST['description'];
	    }else{
	        $description='';
	    }

    	if (isset($_POST['package'])) {
	        $package=$_POST['package'];
	    }else{
	        $package='';
	    }

    	if (isset($_POST['hpis'])) {
	        $hpis=$_POST['hpis'];
	    }else{
	        $hpis='';
	    }

    	if (isset($_POST['provider'])) {
	        $provider=$_POST['provider'];
	    }else{
	        $provider='';
	    }

    	if (isset($_POST['medication'])) {
	        $medication=$_POST['medication'];
	    }else{
	        $medication='';
	    }



	    if (isset($_POST['id']) && $_POST['id'] !='' ) {
	    	if (isset($_FILES["image"]["name"]) && $_FILES["image"]["name"] !='' ) {
	    		$target_dir = "C:/xampp/htdocs/pharma-master/images/Uploads/";
			    $target_dir2 = "images/Uploads/";
			    $unique = uniqid();
				$target_file = $target_dir . $unique . basename($_FILES["image"]["name"]);
				$target_file2 = $target_dir2 . $unique . basename($_FILES["image"]["name"]);
	    		// echo "<pre>"; print_r($target_file);
	    		// echo "<pre>"; print_r($target_file2); exit;
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
			    	$sql2 = "UPDATE `products` set `image` = '".$target_file2."' WHERE id = '".$_POST['id']."' ";
			        $query2=mysqli_query($conn,$sql2);
			      // echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
			    } else {
			      echo "Sorry, there was an error uploading your file.";
			    }
	    	}
		    $sql = "UPDATE `products` set `name` = '".$name."',`price` = '".$price."',`sale_price` = '".$saleprice."',`material` = '".$material."',`description` = '".$description."',`packaging` = '".$package."',`hpis` = '".$hpis."',`hprovider` = '".$provider."' ,`medication_r` = '".$medication."' WHERE id = '".$_POST['id']."' ";

	    } else{
	    	if (isset($_FILES["image"]["name"]) && $_FILES["image"]["name"] !='' ) {
			    $target_dir = "C:/xampp/htdocs/pharma-master/images/Uploads/";
			    $target_dir2 = "images/Uploads/";
			    $unique = uniqid();
				$target_file = $target_dir .$unique . basename($_FILES["image"]["name"]);
				$target_file2 = $target_dir2 .$unique . basename($_FILES["image"]["name"]);
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
			      echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
			    } else {
			      echo "Sorry, there was an error uploading your file.";
			    }
	    	}
	    	else{
	    		$target_file = '';
	    	}
			    
		    $sql = "INSERT INTO `products` set `name` = '".$name."',`price` = '".$price."',`sale_price` = '".$saleprice."',`material` = '".$material."',`description` = '".$description."',`packaging` = '".$package."',`hpis` = '".$hpis."',`hprovider` = '".$provider."',`image` = '".$target_file2."' ,`medication_r` = '".$medication."' ";

	    }

        $query=mysqli_query($conn,$sql);
        header('location: http://localhost/pharma-master/admin/product.php');
    }

?>