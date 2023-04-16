<style>
.form-control {
    background-color: transparent !important;
}
</style>
<?php 

include('layout/header.php'); 
if(isset($_POST['login'])){
    
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM tblusers WHERE `email`='$email' AND `visible_pass`='$pass'";
    $result = mysqli_query($conn,$sql) or die ("query unscsessfull");
    if (mysqli_num_rows($result) > 0) {

            $row = mysqli_fetch_assoc($result);

            $_SESSION['userData'] = array(
                'username'=>$row['username'],
                'email'=>$row['email'],
                'mobile'=>$row['mobile'],
                'user_id '=>$row['user_id'],
                'visible_pass'=>$row['visible_pass'],
                'user_role'=>$row['user_role'],
            );

            redirect('index.php');

    } else {
        $error = "Email and password is invelid";
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
                    <h4 class="text-center text-white">Login</h4>
                    <form  method="post">
                        <div class="form-group text-white mb-2">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control text-white" id="email" name="email"
                                placeholder="Enter your email" required>
                        </div>
                        <div class="form-group text-white mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control text-white" id="password" name="password"
                                placeholder="Enter your password" required>
                        </div>
                        <button type="submit" name="login" value="login"
                            class="btn btn-outline-primary text-white loginBtn">submit</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 registrationDiv">
                <div class="container">
                    <h4 class="text-center text-white">Registration</h4>
                    <form action="#" method="post">
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
                            <input type="number" class="form-control text-white" id="mobile" name="mobile"
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
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('layout/footer.php'); ?>