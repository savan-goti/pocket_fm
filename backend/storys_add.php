<?php 

$name = '';
$url = '';
$file = '';

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $story_type = $_POST['story_type'];
    $description = $_POST['description'];
    $image = $_FILES['image'];
    $c_date = date('Y-m-d');


    if(empty($image['name'])){
        $file_name = $_POST['old_image'];
    }else{
        $errors = array();
    
        unlink("../story_image/" . $_POST['old_image']);
        $file_name = rand(11111,999999) .$_POST['id'] . $image['name'];
        $file_type = $image['type'];
        $tmp_name = $image['tmp_name'];
        $file_size = $image['size'];
        $c_date = date('Y-m-d');
    
        if(empty($errors) == true)
        {
            $imagefolder = "../story_image/" . $file_name;
            move_uploaded_file($tmp_name,$imagefolder);
        }
        else
        {
            print_r($errors);
            die();
        }
    }

    $table='tblstorys';
    $return = 'storys.php';

    if(!empty($id)){
        $data = "category_id='{$category_id}',story_type_id='{$story_type}',name='{$name}',description='{$description}',image='{$file_name}',updated_time='{$c_date}'";
        $data = 'category_id="'.$category_id.'",story_type_id="'.$story_type.'",name="'.$name.'",description="'.$description.'",image="'.$file_name.'",updated_time="'.$c_date.'"';
        $where = "id=".$id;
        include 'update_data.php';
    }else{
        $column = 'category_id,story_type_id,name,description,image,created_time';
        $data = '"'.$category_id.'","'.$story_type.'","'.$name.'","'.$description.'","'.$file_name.'","'.$c_date.'"';
        // $data = "'{$category_id}','{$story_type}','{$name}','{$description}','{$file_name}'";
        include 'insart_data.php';
    }


}

?>

<?php include('layout/sidebar.php');?>

<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Add Storys & Music</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="storys.php">Storys & Music</a></li>
            <li class="breadcrumb-item active">Add Storys & Music</li>
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
                    $sql = "SELECT * FROM tblstorys WHERE id='$id'";
                    $result = mysqli_query($conn,$sql) or die ("query unscsessfull"); 
                    $rowdata = mysqli_fetch_assoc($result); 
                ?>
                <form  method="post" enctype="multipart/form-data" novalidate>
                    <input type="hidden" name="id" value="<?= isset($_GET['id'])?$_GET['id']:''; ?>"> 
                    <div class="form-group">
                        <h5>Name <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="name" value="<?= isset($rowdata['name'])?$rowdata['name']:''; ?>" class="form-control name" required data-validation-required-message="This field is required"> 
                        </div>
                    </div>
                    <div class="form-group">
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
                    <div class="form-group">
                        <h5>Story Type <span class="text-danger">*</span></h5>
                        <select class="form-control custom-select story_type" name="story_type" required data-validation-required-message="This field is required">
                            <option value="">Select</option>
                            <?php 
                            if(!empty($rowdata['category_id'])){
                            $sql3 = "SELECT * FROM tblstory_type WHERE category_id = {$rowdata['category_id']}";
                            $result3 = mysqli_query($conn,$sql3) or die ("query unscsessfull");
                            if (mysqli_num_rows($result3) > 0) {
                                while($story_typerow = mysqli_fetch_assoc($result3)) {
                                    $selected = isset($story_typerow['id'])&&$story_typerow['id']==$rowdata['story_type_id']?'selected':'';
                            ?>
                                <option value="<?= $story_typerow['id'] ?>" <?= $selected; ?> ><?= $story_typerow['name'] ?></option>
                            <?php } } } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <h5>Description <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <textarea name="description" class="form-control description" required data-validation-required-message="This field is required"><?= isset($rowdata['description'])?$rowdata['description']:''; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <h5>image </h5>
                        <div class="controls">
                            <input type="file" name="image" class="form-control file"> 
                            <input type="hidden" name="old_image" class="image" value="<?= isset($rowdata['image'])?$rowdata['image']:''; ?>">
                        </div>
                        <?php if(!empty($rowdata['image'])){ ?>
                        <img src="<?PHP echo "../story_image/" . $rowdata['image']; ?>" alt="image" width="300px" height="180px">
                        <?php } ?>
                    </div>
                    <div class="text-xs-right">
                        <button type="submit" name="submit" value="submit" class="btn btn-info">Submit</button>
                        <a href="storys.php" class="btn btn-inverse">Back</a>
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