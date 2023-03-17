<?php 
include('config.php');
$base_url = "http://localhost/pocket_fm-master/front/";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/style.css">
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
        <div class="container d-flex flex-wrap justify-content-center">
          <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-light text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
            <span class="fs-4">Double header</span>
          </a>
          <!-- <form class="col-12 col-lg-auto mb-3 mb-lg-0">
            <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
          </form> -->
        </div>
      </header>

    <nav class="py-2 bg_color " id="myHeader">
        <div class="container d-flex flex-wrap">
          <ul class="nav me-auto">
            <li class="nav-item"><a href="<?= $base_url; ?>" class="nav-link link-light px-2 active" aria-current="page">Home</a></li>
            <?php 
              $sql2 = "SELECT * FROM tblcategory ";
              $result2 = mysqli_query($conn,$sql2) or die ("query unscsessfull");
              if (mysqli_num_rows($result2) > 0) {
                  while($caterow = mysqli_fetch_assoc($result2)) { ?>
                    <li class="nav-item"><a href="<?= $base_url."show_list.php?category=".$caterow['id'] ?>" class="nav-link link-light px-2"><?= $caterow['name'] ?></a></li>
              <?php } } ?>
            <!-- <li class="nav-item"><a href="#" class="nav-link link-light px-2">Features</a></li>
            <li class="nav-item"><a href="#" class="nav-link link-light px-2">Pricing</a></li>
            <li class="nav-item"><a href="#" class="nav-link link-light px-2">FAQs</a></li>
            <li class="nav-item"><a href="#" class="nav-link link-light px-2">About</a></li> -->
          </ul>
          <ul class="nav">
            <li class="nav-item"><a href="#" class="nav-link link-light px-2">Login</a></li>
            <li class="nav-item"><a href="#" class="nav-link link-light px-2">Sign up</a></li>
          </ul>
        </div>
    </nav>
