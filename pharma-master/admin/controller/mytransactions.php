<?php 

    include 'config.php';

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }else{
        $id = '';
    }

    if (isset($_POST['value'])) {
        if ($_POST['value'] == '6'){
            $value = $_POST['value'];
            $done = '1';
        } elseif ($_POST['value'] == '7'){
            $value = $_POST['value'];
            $done = '2';
        } else{
            $value = $_POST['value'];
            $done = '0';
        }
    }else{
        $value = '0';
        $done = '0';
    }

    $sql="UPDATE `orders` set `status` = '".$value."', `done` = '".$done."' WHERE id = '".$id."' ";
	mysqli_query($conn,$sql);
    return 'sucess';

?>