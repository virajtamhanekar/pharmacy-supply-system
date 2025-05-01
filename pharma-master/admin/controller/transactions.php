<?php
    include 'config.php';

    $sql = mysqli_query($conn,"SELECT * FROM products ");
    $data = array();

    while ($row = mysqli_fetch_assoc($sql)) {
        $data[] = $row;
    }

    $dataset = array(
        "echo" => 1,
        "totalrecords" => count($data),
        "totaldisplayrecords" => count($data),
        "data" => $data
    );

    echo json_encode($dataset);

?>