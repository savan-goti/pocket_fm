<?php include('layout/header.php'); ?>
      <!-- <main class="container">
        <div class="card bg-dark text-white border-0">
            <img src="image/banner.png" class="card-img" alt="...">
            <div class="card-img-overlay">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <p class="card-text">Last updated 3 mins ago</p>
            </div>
          </div>


        </main> -->

    <!-- ====== Start Episodes =========== -->
    <?php 
    $category = isset($_GET['category']) ?  $_GET['category'] :'';
    $sql = "SELECT * FROM tblstory_type WHERE category_id=$category ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($category_row = mysqli_fetch_assoc($result)) { 
            $sql2 = "SELECT * FROM tblstorys WHERE story_type_id=".$category_row['id']." ";
            $result2 = mysqli_query($conn, $sql2);
            if (mysqli_num_rows($result2) > 0) {
            ?>

            <section id="HomeBanner" class="slider" style="margin: 40px 0px;">
                <div class="container">
                    <div class="mb-3 text-light">
                            <h3><?= !empty($category_row['name'])?$category_row['name']:''; ?></h3>
                        
                    </div>

                    <div class="owl-carousel owl-theme">
                        <?php  while($story_row = mysqli_fetch_assoc($result2)) { ?>
                            <a href="show.php?story=<?= $story_row['id']; ?>">
                                <div class="item homeepisodeitomclass d-flex justify-content-center">
                                    <div class="pointer epiCard">
                                        <div class="episodeImage">
                                            <img  src="../story_image/<?= $story_row['image']; ?>"  alt="Thumbnail" class="homeepi_image">
                                        </div>
                                        <div class=" mt-2 rounded title_box_padding">
                                            <div class="truncate"><?= $story_row['name'];?></div>
                                            <div class="Card_Username"><?= date('M d, Y', strtotime($story_row['created_time'])); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        <?php }  ?>
                        
                    </div>
                </div>
            </section>
    <?php } } } ?>
 
    <!-- <section id="HomeBanner" class="slider" style="margin: 40px 0px;">
        <div class="container">
            <div class="mb-3 text-light">
                <h3>Ambitious Girl</h3>
            </div>
            <div class="owl-carousel owl-theme">

                <div class="item homeepisodeitomclass d-flex justify-content-center" >
                    <div class="pointer epiCard">
                        <div class="episodeImage category_shadow"><img
                            src="https://djhonz7dexnot.cloudfront.net/d6ed3233a85b9fc8f396c8bff7536126973a6a8b.webp"
                                alt="Thumbnail" class="homeepi_image"></div>
                                 <div class=" mt-2 rounded title_box_padding">
                        <div class="truncate">Truly Deeply Madly</div>
                        <div class="Card_Username">Rivansh</div>
                        </div>
                    </div>
                </div>
                <div class="item homeepisodeitomclass d-flex justify-content-center">
                    <div class="pointer epiCard">
                        <div class="episodeImage"><img
                            src="https://djhonz7dexnot.cloudfront.net/3fad2ede145d150bc5ac13053c035bfcee106ec1.webp"
                                alt="Thumbnail" class="homeepi_image"></div>
                                 <div class=" mt-2 rounded title_box_padding">
                        <div class="truncate">Fake Love | फेक लव | Author- WordsQueen</div>
                        <div class="Card_Username">RJ Sona</div>
                        </div>
                    </div>
                </div>
                <div class="item homeepisodeitomclass d-flex justify-content-center">
                    <div class="pointer epiCard">
                        <div class="episodeImage"><img
                            src="https://djhonz7dexnot.cloudfront.net/75817aeefd442b936b1b5671eaa41a41f599744b.webp"
                                alt="Thumbnail" class="homeepi_image"></div>
                                 <div class=" mt-2 rounded title_box_padding">
                        <div class="truncate">Main Teri Chandani | मैं तेरी चांदनी Author- कविता वर्मा</div>
                        <div class="Card_Username">RJ Kratika</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->


    <?php include('layout/footer.php'); ?>

