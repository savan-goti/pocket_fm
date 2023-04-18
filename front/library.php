<?php include('layout/header.php'); 

$sql = "SELECT * FROM tblwishlist WHERE user_id={$userData['user_id']}";
$result = mysqli_query($conn, $sql) or die("query unscsessfull");
// $rowData = mysqli_fetch_assoc($result);
?>

<section id="HomeBanner" class="slider" style="margin: 40px 0px;">
    <div class="container">
        <div class="row">
        <?php 
          if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) { 
                $storysql = "SELECT * FROM tblstorys WHERE id={$row['story_id']}";
                $storyresult = mysqli_query($conn, $storysql) or die("query unscsessfull");
                $storydata = mysqli_fetch_assoc($storyresult);
                if($storydata['image']){
                    $img = $main_base_url . 'story_image/' . $storydata['image'];
                }else{
                    $img = $main_base_url .'profile_image/placeholder-image.jpg';
                }
                if($row['isActive']==1){
                ?>
                <div class="card m-2 p-0 libraryDiv epiCard" style="width:200px;height:auto;border: 0;background: none">
                    <a href="show.php?story=<?= $storydata['id']; ?>">
                        <img class="card-img-top" src="<?= $img ?>" alt="Card image" style="width:100%;height:157.5px">
                        <div class="card-body title_box_padding mt-1" style="color: #ffffff;">
                            <div class=""><?= $storydata['name'];?></div>
                            <div class="Card_Username mt-1"><?= date('M d, Y', strtotime($storydata['created_time'])); ?></div>
                        </div>
                    </a>
                </div>
            <?php } } } ?>
        </div>
    </div>
</div>


<?php include('layout/footer.php'); ?>