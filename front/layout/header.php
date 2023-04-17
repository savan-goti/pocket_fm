<?php 
session_start();
include('config.php');
include('model/functions.php'); 
$base_url = "http://localhost/pocket_fm-master/front/";
$main_base_url = "http://localhost/pocket_fm-master/";
$userData = isset($_SESSION['userData'])?$_SESSION['userData']:'';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $base_url; ?>image/navbar.png">
    <title>Document</title>
    <!-- <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'> -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap"
        rel="stylesheet">

    <!-- <link rel="stylesheet" href="<?= $base_url; ?>css/boxicons.min.css"> -->
    <link rel="stylesheet" href="<?= $base_url; ?>css/boxicons.css">
    <link rel="stylesheet" href="<?= $base_url; ?>css/fontawesome.css">
    <link rel="stylesheet" href="<?= $base_url; ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $base_url; ?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= $base_url; ?>css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= $base_url; ?>css/main.css">
    <link rel="stylesheet" href="<?= $base_url; ?>css/style.css">
    <script src="<?= $base_url; ?>js/jquery.min.js"></script>
    <style>
    .sticky {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 9999;
    }
    </style>
</head>

<body>
    <!-- <div class="firstnavbar text-end bg-dark text-light fixed-top mobile_view">
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div> -->
    <header class="py-3  border-bottom bg_color">
        <!-- <div class="container d-flex flex-wrap justify-content-center"> -->
        <div class="container d-flex flex-wrap  justify-content-between">
            <a href="#" class="d-flex align-items-center mb-lg-0 me-lg-auto text-light text-decoration-none">
                <!-- <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg> -->
                <span class="fs-4"><img src="<?= $base_url; ?>image/logo-default.jpg" alt="homepage" width="187"
                        height="40" he class="dark-logo headerLogo" /></span>
            </a>
            <div>
              <!-- <button class="btn btn-info  mobilenavbarBtn" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo"> -->
                <i class="bx bx-menu btn btn-info mobilenavbarBtn" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo"></i>
              <!-- </button> -->
            </div>
            <!-- <form class="col-12 col-lg-auto mb-3 mb-lg-0">
            <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
          </form> -->
        </div>
    </header>

    <div class="offcanvas offcanvas-start mobileNavbar" id="demo">
      <div class="offcanvas-header">
        <h1 class="offcanvas-title">Heading</h1>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" style="background: none;">
          <i class="fa fa-remove text-light"></i>
        </button>
      </div>
      <div class="offcanvas-body">
        <?php 
          $sql2 = "SELECT * FROM tblcategory ";
          $result2 = mysqli_query($conn,$sql2) or die ("query unscsessfull");
          if (mysqli_num_rows($result2) > 0) {
              while($caterow = mysqli_fetch_assoc($result2)) { ?>
            <p>
              <a href="<?= $base_url."show_list.php?category=".$caterow['id'] ?>" class="px-2" style="color: #ffffff;">
                <?= $caterow['name'] ?>
              </a>
            </p>
          <?php } } ?>
          <div class="mt-5">
            <?php if($userData){ ?>
              <a href="logout.php" class="btn btn-outline-danger px-5 mobileNavBtn">Logout</a>
              <a href="profile.php" class="btn btn-outline-danger px-5 mobileNavBtn">profile</a>
            <?php }else{ ?>
              <a href="login.php" class="btn btn-outline-danger px-5 mobileNavBtn">Login</a><br>
              <p style="margin-top: 1rem;margin-left: 60px;"><b>OR</b></p>
              <a href="login.php" class="btn btn-outline-danger px-5 mobileNavBtn">Sign up</a>
            <?php } ?>
          </div>
      </div>
    </div>

    <nav class="py-2 bg_color desktopnavbar" id="myHeader">
        <div class="container d-flex flex-wrap">
            <ul class="nav me-auto">
                <li class="nav-item"><a href="<?= $base_url; ?>" class="nav-link link-light px-2 active"
                        aria-current="page">Home</a></li>
                <?php 
              $sql2 = "SELECT * FROM tblcategory ";
              $result2 = mysqli_query($conn,$sql2) or die ("query unscsessfull");
              if (mysqli_num_rows($result2) > 0) {
                  while($caterow = mysqli_fetch_assoc($result2)) { ?>
                <li class="nav-item"><a href="<?= $base_url."show_list.php?category=".$caterow['id'] ?>"
                        class="nav-link link-light px-2"><?= $caterow['name'] ?></a></li>
                <?php } } ?>
                <!-- <li class="nav-item"><a href="#" class="nav-link link-light px-2">Features</a></li>
            <li class="nav-item"><a href="#" class="nav-link link-light px-2">Pricing</a></li>
            <li class="nav-item"><a href="#" class="nav-link link-light px-2">FAQs</a></li>
            <li class="nav-item"><a href="#" class="nav-link link-light px-2">About</a></li> -->
            </ul>
            <ul class="nav">
                <?php if($userData){ ?>
                <li class="nav-item"><a href="profile.php" class="nav-link link-light px-2"><i class="fa fa-solid fa-user"></i> Profile</a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link link-light px-2">Logout</a></li>
                <?php }else{ ?>
                <li class="nav-item"><a href="login.php" class="nav-link link-light px-2">Login</a></li>
                <li class="nav-item"><a href="login.php" class="nav-link link-light px-2">Sign up</a></li>
                <?php } ?>
            </ul>
        </div>
    </nav>
