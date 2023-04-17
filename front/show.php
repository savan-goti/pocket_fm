<style>
::-webkit-media-controls {
    width: inherit;
    height: inherit;
    position: relative;
    display: -webkit-flex;
    -webkit-align-items: flex-start;
    -webkit-justify-content: flex-end;
    -webkit-flex-direction: column;
}

audio::-webkit-media-controls-panel {
    display: -webkit-flex;
    -webkit-flex-direction: row;
    -webkit-align-items: center;
    -webkit-user-select: none;
    position: relative;
    bottom: 0;
    width: 100%;
    z-index: 0;
    overflow: hidden;
    background: #8a8989;
    /* background: repeating-linear-gradient(45deg, blue, red); */
    text-align: right;
}

audio::-webkit-media-controls-play-button {
    background-color: #B1D4E0;
    border-radius: 50%;
    display: none;
}

audio::-webkit-media-controls-play-button:hover {
    background-color: rgba(177, 212, 224, .7);
}

audio::-webkit-media-controls-timeline {
    margin-left: 10px;
    margin-right: 10px;
}

audio::-webkit-media-controls-current-time-display {
    color: white;
}

audio::-webkit-media-controls-time-remaining-display {
    color: white;
}

audio::-webkit-media-controls-mute-button {
    /* background-color: #B1D4E0; */
    /* border-radius: 50%; */
}
</style>
<?php include('layout/header.php'); ?>
<?php 
if(!isset($_SESSION['userData'])){
    redirect('login.php');
}

$story_id = $_GET['story'];

$wishsql = "SELECT * FROM tblwishlist WHERE story_id={$story_id}";
$wishresult = mysqli_query($conn, $wishsql) or die("query unscsessfull");
$wishlistdata = mysqli_fetch_assoc($wishresult);

if(isset($_POST['submit'])){
    $c_date = date('Y-m-d');
    $isactive = $_POST['isactive'];
    if($isactive==1){
        $status = '0';
    }else{
        $status = '1';
    }
    if(!empty($_POST['wid'])){
        $data = "isActive='{$status}'";
        $where = "id=".$_POST['wid'];
        $sql = "UPDATE `tblwishlist` SET ".$data." WHERE ".$where."";
        $editresult = mysqli_query($conn,$sql) or die ("query unscsessfull");
        redirect('show.php?story='.$story_id);
    }else{
        $column = 'story_id,user_id,createdTime,updatedTime';
        $data = "'".$_POST['story_id']."','".$_SESSION['userData']['user_id']."','".$c_date."','".$c_date."'";
        $sql = "INSERT INTO `tblwishlist` (".$column.") VALUES (".$data.")";
        $addresult = mysqli_query($conn,$sql) or die ("query unscsessfull");
        redirect('show.php?story='.$story_id);
    }
}

$storysql = "SELECT * FROM tblstorys WHERE id={$story_id}";
$storyresult = mysqli_query($conn, $storysql) or die("query unscsessfull");
$storydata = mysqli_fetch_assoc($storyresult);


?>

<section id="HomeBanner" class="slider" style="margin: 40px 0px;">
    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <div class="card card_bg border border-light">
                    <img src="<?= $main_base_url . 'story_image/' . $storydata['image']; ?>" class="card-img-top p-2"
                        alt="...">
                    <div class="">
                        <table class="table table-bordered mb-0">
                            <tbody>
                                <tr class="card_table_text">
                                    <th scope="row">NAME</th>
                                    <td><?= $storydata['name']; ?></td>
                                </tr>
                                <tr class="card_table_text">
                                    <th scope="row">RELEASE DATE</th>
                                    <td><?= date('M d, Y', strtotime($storydata['created_time'])); ?></td>
                                </tr>
                                <tr class="card_table_text">
                                    <th scope="row">RECORD LABEL</th>
                                    <td>CHORDS RECORDS</td>
                                </tr>
                                <tr class="card_table_text">
                                    <th scope="row">CATALOG NUMBER</th>
                                    <td>FM<?= $storydata['id']; ?></td>
                                </tr>
                                <tr class="card_table_text">
                                    <th scope="row">AVAILABLE NOW AT</th>
                                    <td>RADIO FM</td>
                                </tr>
                                <tr class="card_table_text">
                                    <td colspan="2">
                                        <form method="post">
                                            <input type="hidden" name="isactive" value="<?= isset($wishlistdata['isActive'])?$wishlistdata['isActive']:''; ?>">
                                            <input type="hidden" name="wid" value="<?= isset($wishlistdata['id'])?$wishlistdata['id']:''; ?>">
                                            <input type="hidden" name="story_id" value="<?= $story_id; ?>">
                                            <?php if(isset($addresult) || isset($wishlistdata['isActive'])&&$wishlistdata['isActive']=='1'){ ?> 
                                                <button type="submit" class="btn btn-primary" name="submit" value="submit" style="width:100%;background: black;">
                                                    <i class="fa fa-sharp fa-solid fa-thumbtack" style="color: #ffffff;"></i> <b> Library</b>
                                                </button>
                                            <?php }else{ ?> 
                                                <button type="submit" class="btn btn-primary" name="submit" value="submit" style="width:100%">
                                                    <i class="fa-solid fa-bookmark" style="color: #ffffff;"></i> <b>Add Library</b>
                                                </button>
                                            <?php } ?>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-8">

                <?php
                    $sql = "SELECT * FROM tblstory_ep WHERE story_id={$story_id}";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        $cou=0;
                        while ($row = mysqli_fetch_assoc($result)) {  ?>
                    <div class="card mt-2 play_button_bg border-0 <?= $cou; ?>" id="active_class_<?= $row['id'] ?>">
                        <div class="card-body ">
                            <div class="col-sm-12 d-flex align-items-center justify-content-between text-light">
                                <?= $row['name'] ?>
                                <button type="button" class="btn btn-dark play_icone border-0 " data-count="<?= $cou; ?>" data-id="<?= $row['id'] ?>">
                                    <i class='bx bx-play-circle'></i>
                                </button>
                            </div>
                            <div class="mt-3" id="active_audio_<?= $row['id'] ?>" style="display:none;">
                                <audio class="podcast_<?= $row['id'] ?> w-100" id="podcast_<?= $row['id'] ?>" controls
                                    style="height: 30px;">
                                    <source src="<?= $main_base_url . 'episode_audio/' . $row['audio'] ?>"
                                        type="audio/mpeg">
                                </audio>
                            </div>
                        </div>
                    </div>
                <?php $cou++; }
                } else { ?>
                <h1 class="text-white">No Episodes</h1>
                <?php } ?>
            </div>
        </div>
    </div>
</section>


<script>
$(document).ready(function() {
    $(document).delegate(".play_icone", "click", function(e) {

        var el_ = $(this);
        var id = $(this).attr('data-id');
        var count = $(this).attr('data-count');
        var audio = document.getElementById('podcast_' + id);

        var settiomout = audio.duration;
        // var myTimeout = setTimeout(settiomout, 3000);
        // if(myTimeout){
            // alert(e);
        // }
        audio.ontimeupdate = function() {myFunction(audio,settiomout,id,el_,count)};
        // console.log(outlinr);
        if (audio.paused) {
            $(".play_icone").each(function() {
                var ids = $(this).attr('data-id');
                var audios = document.getElementById('podcast_' + ids);

                audios.pause();
                $(this).html('<i class="bx bx-play-circle"></i>');
                $('#active_class_' + ids).removeClass('play_active');
                $('#active_audio_' + ids).removeClass('audio_active');
                
                // alert(audios.ended);return false;
            });
            audio.play();
            el_.html('<i class="bx bx-pause-circle"></i>');
            $('#active_class_' + id).addClass('play_active');
            $('#active_audio_' + id).addClass('audio_active');
            // alert(audio.ended);return false;
        } else {
            audio.pause();
            el_.html('<i class="bx bx-play-circle"></i>');
            $('#active_class_' + id).removeClass('play_active');
            $('#active_audio_' + id).removeClass('audio_active');

            // alert(audio.ended);return false;
        }
        
    });

    function myFunction(audio,settiomout,id,el_,count) {
        // console.log(audio.currentTime);
        if(audio.currentTime == settiomout){
            // alert(count);

            el_.html('<i class="bx bx-play-circle"></i>');
            $('#active_class_' + id).removeClass('play_active');
            $('#active_audio_' + id).removeClass('audio_active');

            var nextcount = parseInt(parseInt(count) + 1);
            // console.log(nextcount);
            // console.log($(".play_button_bg").find(".play_icone[data-count='" + nextcount + "']").html());
            $(".play_button_bg").find(".play_icone[data-count='" + nextcount + "']").trigger('click');
        }
    }

    // function myGreeting() {
    //     // alert('myTimeout');
    // }

    // function myStopFunction() {
    //     clearTimeout(myTimeout);
    // }

    // const myTimeout = setTimeout(myGreeting, 3000);
});
</script>

<?php include('layout/footer.php'); ?>