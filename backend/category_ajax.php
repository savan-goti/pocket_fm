<?php 
    include('layout/config.php'); 
    $where = $_POST['where'];
    $table = $_POST['table'];
    $output = '';

    $sql = "SELECT * FROM $table WHERE $where"; 
    // $sql = "SELECT * FROM tblstory_type WHERE category_id = '$cate_id'"; 
    $result = mysqli_query($conn,$sql) or die ("query unscsessfull");
    // echo "<pre>"; print_r($result); die();
    $output = '<option value="">select</option>';

    while($row = mysqli_fetch_array($result)) {
        $output .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
    }
    echo $output;
?>