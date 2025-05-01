<?php
    // session_start();
    include 'controller/config.php';
    include 'controller/header.php';

    if (!isset($_SESSION['name']) && $_SESSION['name'] == '') {
        header("Location: http://localhost/pharma-master/admin/index.php");
    }

    $sql = mysqli_query($conn,"SELECT * FROM products ");

    $products = array();
    while ($result = mysqli_fetch_array($sql)) {
        $products[] = array(
            'id' => $result['id'],
            'name' => $result['name'],
            'price' => $result['price'],
            'sale_price' => $result['sale_price'],
            'image' => $result['image'],
            'cat_id' => $result['cat_id'],
            'dash_id' => $result['dash_id'],
            'material' => $result['material'],
            'description' => $result['description'],
            'packaging' => $result['packaging'],
            'hpis' => $result['hpis'],
            'hprovider' => $result['hprovider'],
            'latex' => $result['latex'],
            'medication_r' => $result['medication_r'],
        );
    }
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
            <h2>Product List</h2><?php if ($_SESSION['type']=='A') { ?>
             <a href="form.php" style="float: right;margin-right: 5px;"  type="submit" class="btn btn-primary">ADD NEW</a>
            <?php  } ?><hr>
            <table id="user-table" class="display" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>price</th>
                        <th>image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js" charset="utf8" type="text/javascript"></script>
<script>
$(document).ready(function() {
    $('#user-table').DataTable({
        "ajax": "controller/products.php",
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

        </div>
    </div>
</body>
</html>

