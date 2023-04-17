<?php 
include('layout/header.php'); 

if(isset($_POST['submit'])){
  $uid = $_POST['uid'];
  $vpass = $_POST['password'];
  $pass = md5($_POST['password']);
  $mobile = $_POST['mobile'];
  $name = $_POST['username'];
  $address = $_POST['address'];
  $updated_time = date('Y-m-d');
  $email = $_POST['email'];
  $image = $_FILES['image'];

  if(empty($image['name'])){
    $file_name = $_POST['old_image'];
}else{
    $errors = array();

    if(!empty($_POST['old_image'])){
      unlink("../profile_image/" . $_POST['old_image']);
    }
    $file_name = rand(11111,999999) .$uid . $image['name'];
    $file_type = $image['type'];
    $tmp_name = $image['tmp_name'];
    $file_size = $image['size'];

    if($file_size > 10485760)
    {
        $errors[] = "file size must be 10mb or lover";
    }

    if(empty($errors) == true)
    {
        $imagefolder = "../profile_image/" . $file_name;
        move_uploaded_file($tmp_name,$imagefolder);
    }
    else
    {
        print_r($errors);
        die();
    }
}

  $table='tblusers';

  $data = "username='{$name}',email='{$email}',mobile='{$mobile}',address='{$address}',picture='{$file_name}',password='{$pass}',visible_pass='{$vpass}',updated_time='{$updated_time}'";
  $where = "user_id=".$uid;
  $sql = "UPDATE `".$table."` SET ".$data." WHERE ".$where."";

  if (mysqli_query($conn, $sql)) {
    $msg = "Your Profile is Update";
  } else {
    $msg = "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}


$sql = "SELECT * FROM tblusers WHERE user_id={$userData['user_id']}";
$result = mysqli_query($conn, $sql) or die("query unscsessfull");
$rowdata = mysqli_fetch_assoc($result);
$proImage = isset($rowdata['picture'])? "../profile_image/".$rowdata['picture']:$base_url.'image/navbar.png';
?>

<section >
  <div class="container py-5">

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="<?= $proImage; ?>" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3"><?= $userData['username'] ?></h5>
            <!-- <p class="text-muted mb-1">Full Stack Developer</p>
            <p class="text-muted mb-4">Bay Area, San Francisco, CA</p> -->
            <div class="d-flex justify-content-center mb-2">
              <!-- <button type="button" class="btn btn-primary">Profile</button>
              <button type="button" class="btn btn-outline-primary ms-1">Edit</button> -->
              <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link " id="pills-edit-tab" data-bs-toggle="pill" data-bs-target="#pills-edit" type="button" role="tab" aria-controls="pills-edit" aria-selected="true">Edit</button>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <?php if(!empty($msg)){ ?> 
          <div class="suc_alert mb-3">
              <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
              <span class="error"><?php echo isset($msg)?$msg:''; ?></span>
          </div>
        <?php } ?>
        <div class="tab-content" id="pills-tabContent">
          <div class="card tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Full Name</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?= $rowdata['username']; ?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?= $rowdata['email']; ?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Mobile</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?= $rowdata['mobile']; ?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Address</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?= $rowdata['address']; ?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Password</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?= $rowdata['password']; ?></p>
                </div>
              </div>
            </div>
          </div>
          <div class="card tab-pane fade" id="pills-edit" role="tabpanel" aria-labelledby="pills-edit-tab" tabindex="0">
            <div class="card-body">
              <form class="form-horizontal form-material" method="post" enctype="multipart/form-data" novalidate>
                <input type="hidden" name="uid" value="<?= isset($rowdata['user_id'])?$rowdata['user_id']:''; ?>"> 
                <div class="form-group">
                    <label class="col-md-12">Full Name</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Johnathan Doe" name="username" value="<?= isset($rowdata['username'])?$rowdata['username']:''; ?>"
                            class="form-control form-control-line" required data-validation-required-message="This field is required">
                    </div>
                </div>
                <div class="form-group">
                    <label for="example-email" class="col-md-12">Email</label>
                    <div class="col-md-12">
                        <input type="email" placeholder="johnathan@admin.com"
                            class="form-control form-control-line" name="email" value="<?= isset($rowdata['email'])?$rowdata['email']:''; ?>" id="example-email" required data-validation-required-message="This field is required">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Password</label>
                    <div class="col-md-12">
                        <input type="password" name="password" value="<?= isset($rowdata['visible_pass'])?$rowdata['visible_pass']:''; ?>" class="form-control form-control-line" required data-validation-required-message="This field is required">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Phone No</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="123 456 7890" name="mobile" value="<?= isset($rowdata['mobile'])?$rowdata['mobile']:''; ?>" class="form-control form-control-line" required data-validation-required-message="This field is required">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Address</label>
                    <div class="col-md-12">
                        <textarea rows="2" name="address" class="form-control form-control-line"><?= isset($rowdata['address'])?$rowdata['address']:''; ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Photo</label>
                    <div class="col-md-12">
                      <input type="file" name="image" class="form-control file"> 
                      <input type="hidden" name="old_image" class="image" value="<?= isset($rowdata['image'])?$rowdata['image']:''; ?>">
                    </div>
                </div>
                <div class="form-group mt-3">
                    <div class="col-sm-12">
                        <button type="submit" name="submit" value="submit" class="btn btn-success">Update Profile</button>
                    </div>
                </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include('layout/footer.php'); ?>