<?php
    // session_start();
    include 'controller/config.php';
    include 'controller/header.php';
    
    if (!isset($_SESSION['name']) && $_SESSION['name'] == '') {
        header("Location: http://localhost/pharma-master/admin/index.php");
    }
    
    $sql = mysqli_query($conn,"SELECT * FROM orders WHERE done != '0' ");
    $products = array();
    while ($result = mysqli_fetch_assoc($sql)) {

        $cart_ids = explode(",", $result['cart_ids']);
        $qnty = 0;
        $products_my = array();

        foreach($cart_ids as $id){
            $sql3 = mysqli_query($conn,"SELECT * FROM cart WHERE id = '".$id."' ");
            $res = mysqli_fetch_assoc($sql3); 
            $qnty += $res['qnty'];
            $sql4 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM products WHERE id = '".$res['product_id']."' "));
            if($sql4['sale_price'] > 0){
                $price = $sql4['sale_price'];
            } else{
                $price = $sql4['price'];
            }
            $products_my[] = array(
                'name' => $sql4['name'],
                'image' => $sql4['image'],
                'price' => $price,
                'qnty' => $res['qnty'],
            );
        }

        if ($result['status'] == '1') {
            $status = 'On process';
        } elseif ($result['status'] == '2') {
            $status = 'Approved';
        } elseif ($result['status'] == '3') {
            $status = 'Dispatch';
        } elseif ($result['status'] == '4') {
            $status = 'Ready to Ship';
        } elseif ($result['status'] == '5') {
            $status = 'Out for Delivery';
        } elseif ($result['status'] == '6') {
            $status = 'Dilvered';
        } elseif ($result['status'] == '7') {
            $status = 'Cancelled';
        } elseif ($result['status'] == '8') {
            $status = 'Hold';
        } else{
            $status = 'On process';
        }

        $products[] = array(
            'id' => $result['id'],
            'order' => 'ORDER-'.$result['id'],
            'qnty' => $qnty,
            'total' => $result['total'],
            'products_my' => $products_my,
            'date' => $result['date'],
            'status' => $result['status'],
            'done' => $result['done'],
            'status1' => $status,
        );
    } //echo "<pre>"; print_r($products);  exit;
    ?>
<!DOCTYPE html>
<html>
    <head>
        <style type="text/css">
            h2{
            display: inline-flex;
            margin-left: 550px;
            }
        </style>
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
    </head>
    <body>
        <div>
            <div style="border-radius: 5px" class="p-3">
                <div class="container first-container col-sm-12 pull-left">
                    <h2>Order History</h2>
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th>Sr.No</th>
                                <th>Order-ID</th>
                                <th>Qnty</th>
                                <th>Total</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; foreach ($products as $pkey => $pvalue) { ?>
                                <tr class="sub-container">
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $pvalue['order']; ?></td>
                                    <td><?php echo $pvalue['qnty']; ?></td>
                                    <td><?php echo $pvalue['total']; ?></td>
                                    <td><?php echo $pvalue['date']; ?></td>
                                    <td><?php echo $pvalue['status1']; ?></td>
                                    <td style="color: <?php if($pvalue['done'] == '1'){ echo 'green'; } else { echo 'red'; } ?>" ><?php if($pvalue['done'] == '1'){ echo 'Success'; } else { echo 'Failed'; } ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>