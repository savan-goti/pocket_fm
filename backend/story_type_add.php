<?php 

$name = '';
$url = '';
$file = '';

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $c_date = date('Y-m-d');

    $table='tblstory_type';
    $return = 'storys_type.php';

    if(!empty($id)){
        $data = 'category_id="'.$category_id.'",name="'.$name.'",updated_time="'.$c_date.'"';
        // $data = "category_id='{$category_id}',name='{$name}',updated_time='{$c_date}'";
        $where = "id=".$id;
        include 'update_data.php';
    }else{
        $column = 'category_id,name,created_time';
        $data = '"'.$category_id.'","'.$name.'","'.$c_date.'"';
        // $data = "{$category_id},{$name},{$c_date}";
        include 'insart_data.php';
    }


}

?>

<?php include('layout/sidebar.php');?>

<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Add Story & songs Type</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="storys_type.php">Story & songs Type</a></li>
            <li class="breadcrumb-item active">Add Story & songs Type</li>
        </ol>
    </div>
    <div class="col-md-7 col-4 align-self-center">
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php 
                    $id = isset($_GET['id'])?$_GET['id']:'';
                    $sql = "SELECT * FROM tblstory_type WHERE id='$id'";
                    $result = mysqli_query($conn,$sql) or die ("query unscsessfull"); 
                    $rowdata = mysqli_fetch_assoc($result); 
                ?>
                <form  method="post" enctype="multipart/form-data" novalidate>
                    <input type="hidden" name="id" value="<?= isset($_GET['id'])?$_GET['id']:''; ?>"> 
                    <div class="row">
                        <div class="form-group col-md-6">
                            <h5>Name <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="name" value="<?= isset($rowdata['name'])?$rowdata['name']:''; ?>" class="form-control name" required data-validation-required-message="This field is required"> 
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <h5>Category <span class="text-danger">*</span></h5> 
                            <select class="form-control custom-select category_id" name="category_id" required data-validation-required-message="This field is required">
                                <option value="">Select</option>
                                <?php 
                                $sql2 = "SELECT * FROM tblcategory ";
                                $result2 = mysqli_query($conn,$sql2) or die ("query unscsessfull");
                                if (mysqli_num_rows($result2) > 0) {
                                    while($caterow = mysqli_fetch_assoc($result2)) {
                                        $selected = isset($caterow['id'])&&$caterow['id']==$rowdata['category_id']?'selected':'';
                                ?>
                                    <option value="<?= $caterow['id'] ?>" <?= $selected; ?> ><?= $caterow['name'] ?></option>
                                <?php } } ?>
                            </select>
                        </div>
                    </div>
                    <div class="text-xs-right">
                        <button type="submit" name="submit" value="submit" class="btn btn-info">Submit</button>
                        <a href="storys_type.php" class="btn btn-inverse">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function(){
        $(document).delegate(".category_id","change",function(){
            var cate_id = $(this).val();
            var table = 'tblstory_type';
            var where = 'category_id = '+cate_id;
            // alert(cate_id);
            $.ajax({
                url:"category_ajax.php",
                method:"POST",
                data:{where:where,'table':table},
                success:function(data){
                    $('.story_type').html(data);
                }
            });
        });
    });
</script>


<?php include('layout/footer.php');?>