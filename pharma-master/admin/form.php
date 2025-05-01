<?php
    include 'controller/config.php';
    include 'controller/header.php';

    if (!isset($_SESSION['name']) && $_SESSION['name'] == '' &&  $_SESSION['type'] == 'A') {
        header("Location: http://localhost/pharma-master/admin/index.php");
    }

    if (isset($_GET['product_id']) && $_GET['product_id'] != '') {
        $product_id = $_GET['product_id'];
    }else{
        $product_id = '';
    }

    if (isset($_GET['product_id'])) {
        $sql = mysqli_query($conn,"SELECT * FROM products WHERE id = '".$product_id."' ");
        $result = mysqli_fetch_assoc($sql);

        $id = $result['id'];
        $name = $result['name'];
        $price = $result['price'];
        $sale_price = $result['sale_price'];
        $image = $result['image'];
        $cat_id = $result['cat_id'];
        $dash_id = $result['dash_id'];
        $material = $result['material'];
        $description = $result['description'];
        $packaging = $result['packaging'];
        $hpis = $result['hpis'];
        $hprovider = $result['hprovider'];
        $latex = $result['latex'];
        $medication_r = $result['medication_r'];
    } else{
        $id = '';
        $name = '';
        $price = '';
        $sale_price = '';
        $image = '';
        $cat_id = '';
        $dash_id = '';
        $material = '';
        $description = '';
        $packaging = '';
        $hpis = '';
        $hprovider = '';
        $latex = '';
        $medication_r = '';
    }

    // echo "<pre>"; print_r($result); exit;


?>
<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body class="">
<div class="container mt-3">
  <div style="border:solid 2px #808080;border-radius: 5px">
    <form class="p-3" action="controller/insert.php" method="post" enctype="multipart/form-data">
        <?php if($id != ''){ ?>
            <h2 style="display: inline-block;">Edit Products</h2>  <a href="controller/deleteproduct.php?id=<?php echo $id; ?>" type="cancel" class="btn btn-danger" style="float: right;">DELETE</a>
        <?php } else{ ?>
            <h2 style="display: inline-block;">Add Products</h2>
        <?php } ?>
        <hr><br>
        <div class="form-group row">
            <label for="name" class="col-sm-3 col-form-label">Product Name</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="name" name="name" required="" value="<?php echo $name; ?>" placeholder="Product Name">
            </div>
        </div>
        <div class="form-group row">
            <label for="price" class="col-sm-3 col-form-label">Price</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="price" name="price" required="" value="<?php echo $price; ?>" placeholder="Price">
            </div>
        </div>
        <div class="form-group row">
            <label for="saleprice" class="col-sm-3 col-form-label">Sale Price</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="saleprice" name="saleprice" value="<?php echo $sale_price; ?>" placeholder="Price">
            </div>
        </div> 
        <div class="form-group row">
            <label for="image" class="col-sm-3 col-form-label">Image</label>
            <div class="col-sm-8">
                <input type="file" class="form-control" id="image" name="image" value="<?php echo $image; ?>" placeholder="Price">
                <img src="../<?php echo $image; ?>" width='100px'>
            </div>
        </div>
        <div class="form-group row">
            <label for="material" class="col-sm-3 col-form-label">Material</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="material" name="material" required="" value="<?php echo $material; ?>" placeholder="Material">
            </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-sm-3 col-form-label">Description</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="description" name="description" required="" value="<?php echo $description; ?>" placeholder="Description">
            </div>
        </div>
        <div class="form-group row">
            <label for="package" class="col-sm-3 col-form-label">Packaging</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="package" name="package" required="" value="<?php echo $packaging; ?>" placeholder="Packaging">
            </div>
        </div>
        <div class="form-group row">
            <label for="hpis" class="col-sm-3 col-form-label">HPIS</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="hpis" name="hpis" required="" value="<?php echo $hpis; ?>" placeholder="HPIS">
            </div>
        </div>
        <div class="form-group row">
            <label for="provider" class="col-sm-3 col-form-label">Provider</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="provider" name="provider" required="" value="<?php echo $hprovider; ?>" placeholder="Provider">
            </div>
        </div>
        <div class="form-group row">
            <label for="latex" class="col-sm-3 col-form-label">Latex</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="latex" name="latex" required="" value="<?php echo $latex; ?>" placeholder="Latex">
            </div>
        </div>
        <div class="form-group row">
            <label for="medication" class="col-sm-3 col-form-label">Medication</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="medication" name="medication" required="" value="<?php echo $medication_r; ?>" placeholder="Medication">
            </div>
        </div>
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <button type="submit" name="submit" value="submit" class="btn btn-primary">SUBMIT</button>
        <a href="product.php" type="cancel" class="btn btn-danger">CANCEL</a>
    </form>
  </div>
</div>
</body>
</html>
<script type="text/javascript">
    
</script>