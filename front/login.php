<style>
.form-control {
    background-color: transparent !important;
}

</style>
<?php include('layout/header.php'); 

if(isset($_POST['login'])){
    
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM tblusers WHERE `email`='$email' AND `visible_pass`='$pass' AND `is_delete`=0 AND `is_active`=1";
    $result = mysqli_query($conn,$sql) or die ("query unscsessfull");
    if (mysqli_num_rows($result) > 0) {

            $row = mysqli_fetch_assoc($result);
            $_SESSION['userData'] = array(
                'username'=>$row['username'],
                'email'=>$row['email'],
                'mobile'=>$row['mobile'],
                'user_id'=>$row['user_id'],
                'visible_pass'=>$row['visible_pass'],
                'user_role'=>$row['user_role'],
            );

            redirect('index.php');

    } else {
        $error = "Email and password is invelid";
    }
}

if(isset($_POST['register'])){
    // $postdata = $_POST;

    $_SESSION['reguserData'] = array(
        'username'=>$_POST['username'],
        'email'=>$_POST['email'],
        'mobile'=>$_POST['mobile'],
        'password'=>$_POST['password'],
        'otp'=>'1111'
    );
    // if(!isset($_SESSION['reguserData'])){
    // }else{
    //     $column = 'username,email,mobile,password,visible_pass,otp';
    //     $data = "'".$_POST['username']."','".$_POST['email']."','".$_POST['mobile']."','".md5($_POST['password'])."','".$_POST['password']."','1111'";
    //     $sql = "INSERT INTO `tblusers` (".$column.") VALUES (".$data.")";
    //     $result = mysqli_query($conn, $sql);
    //     if (mysqli_num_rows($result) > 0) {
    
    //         $row = mysqli_fetch_assoc($result);
    //         $_SESSION['userData'] = array(
    //             'username'=>$row['username'],
    //             'email'=>$row['email'],
    //             'mobile'=>$row['mobile'],
    //             'user_id '=>$row['user_id'],
    //             'visible_pass'=>$row['visible_pass'],
    //             'user_role'=>$row['user_role'],
    //         );
    //         redirect('index.php');
    //     } else {
    //         $regerror = "Error: " . $sql . "<br>" . mysqli_error($conn);
    //     }
    // }

}

if(isset($_POST['otpbtn'])){
    
    $otp = $_POST['otp'];
    $reguserData = $_SESSION['reguserData'];

    if($otp == $reguserData['otp']){
        $column = 'username,email,mobile,password,visible_pass,is_active';
        $data = "'".$reguserData['username']."','".$reguserData['email']."','".$reguserData['mobile']."','".md5($reguserData['password'])."','".$reguserData['password']."','1'";
        $sql = "INSERT INTO `tblusers` (".$column.") VALUES (".$data.")";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            unset($_SESSION["reguserData"]);
            // echo $result;
            $row = mysqli_insert_id($conn);
            // $_SESSION['userData'] = array(
            //     'username'=>$row['username'],
            //     'email'=>$row['email'],
            //     'mobile'=>$row['mobile'],
            //     'user_id '=>$row['user_id'],
            //     'visible_pass'=>$row['visible_pass'],
            //     'user_role'=>$row['user_role'],
            // );
            // redirect('index.php');
            $regsuc = "Login Your Account";
        } else {
            $regerror = "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }else{
        $regerror = "otp is invelid";
    }
}

if(isset($_SESSION['userData'])){
    // header("location: ".$base_url."index.php");
    redirect('index.php');
    
}

?>

<section id="HomeBanner" class="slider" style="margin: 40px 0px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12 br-color">
                <div class="container">
                    <?php if(!empty($error)){ ?> 
                        <div class="alert">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                            <span class="error"><?php echo isset($error)?$error:''; ?></span>
                        </div>
                    <?php } ?>
                    <h4 class="text-center text-white">Login</h4>
                    <form  method="post">
                        <div class="form-group text-white mb-2">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control text-white" value="<?= isset($_POST['email'])?$_POST['email']:''; ?>" id="email" name="email"
                                placeholder="Enter your email" required>
                        </div>
                        <div class="form-group text-white mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control text-white" id="password" name="password" value=""
                                placeholder="Enter your password" required>
                        </div>
                        <button type="submit" name="login" value="login"
                            class="btn btn-outline-primary text-white loginBtn">submit</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 registrationDiv">
                <div class="container">
                    <?php if(!empty($regerror)){ ?> 
                        <div class="alert">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                            <span class="error"><?php echo isset($regerror)?$regerror:''; ?></span>
                        </div>
                    <?php } ?>
                    <?php if(!empty($regsuc)){ ?> 
                        <div class="suc_alert">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                            <span class="error"><?php echo isset($regsuc)?$regsuc:''; ?></span>
                        </div>
                    <?php } ?>
                    <?php if(!isset($_SESSION['reguserData'])){ ?>
                        <h4 class="text-center text-white">Registration</h4>
                        <form method="post">
                            <div class="form-group text-white mb-2">
                                <label for="username" class="form-label">Name</label>
                                <input type="text" class="form-control text-white" id="username" name="username"
                                    placeholder="Enter your Name" required>
                            </div>
                            <div class="form-group text-white mb-2">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control text-white" id="email" name="email"
                                    placeholder="Enter your email" required>
                            </div>
                            <div class="form-group text-white mb-2">
                                <label for="mobile" class="form-label">Mobile</label>
                                <input type="number" class="form-control text-white" id="mobile" maxlanth="10" name="mobile"
                                    placeholder="Enter your Mobile" autocomplete="off" required>
                            </div>
                            <div class="form-group text-white mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control text-white" id="password" name="password"
                                    placeholder="Enter your password" required>
                            </div>
                            <button type="submit" name="register"
                                class="btn btn-outline-primary text-white loginBtn">submit</button>
                        </form>
                    <?php }else{ ?> 
                        <h4 class="text-center text-white">OTP</h4>
                        <form method="post">
                            <div class="form-group text-white mb-2">
                                <!-- <label for="username" class="form-label">otp</label> -->
                                <input type="text" class="form-control text-white" id="otp" name="otp"
                                    placeholder="Enter your otp" required>
                            </div>
                            <button type="submit" name="otpbtn"
                                class="btn btn-outline-primary text-white loginBtn">submit</button>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('layout/footer.php'); ?>