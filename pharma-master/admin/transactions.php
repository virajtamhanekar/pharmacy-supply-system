<?php
    // session_start();
    include 'controller/config.php';
    include 'controller/header.php';
    
    if (!isset($_SESSION['name']) && $_SESSION['name'] == '') {
        header("Location: http://localhost/pharma-master/admin/index.php");
    }
    
    $sql = mysqli_query($conn,"SELECT * FROM orders WHERE done = '0' OR status = '8' ");
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
                    <h2>Sales / Transations Status</h2>
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
                                    <td>
                                        <select onchange="change('<?php echo $pvalue['id']; ?>',this)" class="form-select" aria-label="Default select example">
                                            <option <?php if($pvalue['status'] == '1'){ echo 'selected'; } ?> value="1">On process</option>
                                            <option <?php if($pvalue['status'] == '2'){ echo 'selected'; } ?> value="2">Approved</option>
                                            <option <?php if($pvalue['status'] == '3'){ echo 'selected'; } ?> value="3">Dispatch</option>
                                            <option <?php if($pvalue['status'] == '4'){ echo 'selected'; } ?> value="4">Ready to Ship</option>
                                            <option <?php if($pvalue['status'] == '5'){ echo 'selected'; } ?> value="5">Out for Delivery</option>
                                            <option <?php if($pvalue['status'] == '6'){ echo 'selected'; } ?> value="6">Dilvered</option>
                                            <option <?php if($pvalue['status'] == '7'){ echo 'selected'; } ?> value="7">Cancelled</option>
                                            <option <?php if($pvalue['status'] == '8'){ echo 'selected'; } ?> value="8">Hold</option>
                                        </select>
                                    </td>
                                    <td><button type="button" class="btn btn-success exploder">
                                        <span class="glyphicon glyphicon-search">+</span>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="explode hide">
                                    <td colspan="7" style="background: #CCC; display: none;">
                                        <table class="table table-condensed">
                                            <thead>
                                                <tr>
                                                    <th>Product Name</th>
                                                    <th>image</th>
                                                    <th>price</th>
                                                    <th>Qnty</th>
                                                    <th>Total price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $total = 0;
                                                 foreach ($pvalue['products_my'] as $prkey => $prvalue) { ?>
                                                <tr>
                                                    <td><?php echo $prvalue['name']; ?></td>
                                                    <td><img src="../<?php echo $prvalue['image']; ?>" width="50px;"></td>
                                                    <td><?php echo $prvalue['price']; ?></td>
                                                    <td><?php echo $prvalue['qnty']; ?></td>
                                                    <td><?php echo $prvalue['price'] * $prvalue['qnty']; ?></td>
                                                    <?php $total += $prvalue['price'] * $prvalue['qnty']; ?>
                                                </tr>
                                                <?php } ?>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>Total => <?php echo $total; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
                <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js" charset="utf8" type="text/javascript"></script>
                <script>
                    $(document).ready(function() {
                        $('#user-table').DataTable({
                            "ajax": "controller/transactions.php",
                            "columns": [
                                { "data": "id" },
                                { "data": "name" },
                                { "data": "price" },
                                { "data": "image" },
                                {
                                    "data": null,
                                    "render": function(data, type, row) {
                                        return '<a href="form.php?product_id=' + row.id + '">Edit</a>';
                                    }
                                },
                            ],
                            columnDefs:
                            [{
                                "targets": 3,
                                "data": 'image',
                                "render": function (data, type, row, meta) {
                                    return '<img src="../' + data + '" alt="' + data + '"height="100" width="100"/>';
                                }
                            }],
                        });
                    });
                </script>
                <script type="text/javascript">
                    $(".exploder").click(function(){
                    
                    $(this).toggleClass("btn-success btn-danger");
                    
                    $(this).children("span").toggleClass("glyphicon-search glyphicon-zoom-out");  
                    
                    $(this).closest("tr").next("tr").toggleClass("hide");
                    
                    if($(this).closest("tr").next("tr").hasClass("hide")){
                    $(this).closest("tr").next("tr").children("td").slideUp();
                    }
                    else{
                    $(this).closest("tr").next("tr").children("td").slideDown(350);
                    }
                    });
                </script>
                <script type="text/javascript">
                    function change(id,val) {
                        var value = val.value; 
                        $.ajax({
                            url: "controller/mytransactions.php",
                            type: "POST",
                            data: {
                                id: id,
                                value: value,
                            },
                            success: function(response) {
                                console.log(response);
                            }
                        });
                    }
                </script>
            </div>
        </div>
    </body>
</html>