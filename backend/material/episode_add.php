<?php 

$name = '';
$url = '';
$file = '';

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $category_id = $_POST['category_id'];
    $story_id = $_POST['story_id'];
    $name = $_POST['name'];
    $image = $_FILES['audio'];
    // echo "<pre>"; print_r($image);die();
    

    if(empty($image['name'])){
        $file_name = $_POST['old_image'];
    }else{
        $errors = array();
    
        unlink("../../episode_audio/" . $_POST['old_image']);
        $file_name = rand(11111,999999) .$_POST['id'] . $image['name'];
        $file_type = $image['type'];
        $tmp_name = $image['tmp_name'];
        $file_size = $image['size'];
    
        // if($file_size > 10485760)
        // {
        //     $errors[] = "file size must be 10mb or lover";
        // }
    
        if(empty($errors) == true)
        {
            $imagefolder = "../../episode_audio/" . $file_name;
            move_uploaded_file($tmp_name,$imagefolder);
        }
        else
        {
            print_r($errors);
            die();
        }
    }

    $table='tblstory_ep';
    $return = 'category.php';

    if(!empty($id)){
        $data = "name='".$name."',picture='".$file_name."'";
        $where = "id=".$id;
        include 'update_data.php';
    }else{
        $column = 'category_id,story_id,name,audio';
        $data = "'{$category_id}','{$story_id}','{$name}','{$file_name}'";
        include 'insart_data.php';
    }


}

?>

<?php include('layout/sidebar.php');?>

<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Add Banner</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="banner.php">Banner</a></li>
            <li class="breadcrumb-item active">Add Banner</li>
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
                    $sql = "SELECT * FROM tblstory_ep WHERE id='$id'";
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
                        <select class="form-control custom-select category_id" id="category_id" name="category_id" required data-validation-required-message="This field is required">
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
                        <h5>Story Name <span class="text-danger">*</span></h5>
                        <select class="form-control custom-select story_id" name="story_id" required data-validation-required-message="This field is required">
                            <option value="">Select</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <h5>Audio </h5>
                        <div class="controls">
                            <input type="file" name="audio" class="form-control file"> 
                            <input type="hidden" name="old_image" class="image" value="<?= isset($rowdata['picture'])?$rowdata['picture']:''; ?>">
                        </div>
                        <?php if(!empty($rowdata['picture'])){ ?>
                        <img src="<?PHP echo "../../episode_audio/" . $rowdata['picture']; ?>" alt="image" width="300px" height="180px">
                        <?php } ?>
                    </div>
                    <div class="text-xs-right">
                        <button type="submit" name="submit" value="submit" class="btn btn-info">Submit</button>
                        <a href="episode.php" class="btn btn-inverse">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.category_id').on('change',function(){
            var cate_id = $(this).val();
            // alert(cate_id);
            $.ajax({
                url:"category_ajax.php",
                method:"POST",
                data:{cate_id:cate_id},
                success:function(data){
                    $('.story_id').html(data);
                }
            });
        });
    });
</script>

<?php include('layout/footer.php');?>