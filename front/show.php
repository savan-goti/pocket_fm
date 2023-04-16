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
        display:none;
    }

    audio::-webkit-media-controls-play-button:hover {
        background-color: rgba(177,212,224, .7);
    }
    audio::-webkit-media-controls-timeline {
        margin-left: 10px;
        margin-right: 10px;
    }
    audio::-webkit-media-controls-current-time-display {
        color:white;   
    }
    audio::-webkit-media-controls-time-remaining-display {
        color:white;
    }
    audio::-webkit-media-controls-mute-button {
        /* background-color: #B1D4E0; */
        /* border-radius: 50%; */
    }
</style>
<?php include('layout/header.php'); ?>
<?php 
$story_id = $_GET['story'];
$storysql = "SELECT * FROM tblstorys WHERE id={$story_id}";
$storyresult = mysqli_query($conn, $storysql) or die("query unscsessfull");
$storydata = mysqli_fetch_assoc($storyresult);
?>

<section id="HomeBanner" class="slider" style="margin: 40px 0px;">
    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <div class="card card_bg border border-light">
                    <img src="<?= $main_base_url . 'story_image/' . $storydata['image']; ?>" class="card-img-top p-2" alt="...">
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
                                    <td colspan="2"><button class="btn btn-info" style="width:100%"><!--<i class="bx bx-plus-circle"></i>--><b>Add Library</b></button></td>
                                </tr>
                                <!-- <tr class="card_table_text">
                                    <td colspan="2">
                                        <audio src="https://www.zapsplat.com/wp-content/uploads/2015/sound-effects-61905/zapsplat_multimedia_alert_chime_short_musical_notification_cute_child_like_001_64918.mp3?_=1" controls="true" class="audio-1"></audio>
                                    </td>
                                </tr> -->
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
                        while ($row = mysqli_fetch_assoc($result)) { ?> 
                        <!-- <audio class="podcast_<?= $row['id'] ?>" id="podcast_<?= $row['id'] ?>">
                            <source src="<?= $main_base_url . 'episode_audio/' . $row['audio'] ?>" type="audio/mpeg">
                        </audio>  -->
                        <div class="card mt-2 play_button_bg border-0 " id="active_class_<?= $row['id'] ?>">
                            <div class="card-body ">
                                <div class="col-sm-12 d-flex align-items-center justify-content-between text-light">
                                    <?= $row['name'] ?> 
                                    <button type="button" class="btn btn-dark play_icone border-0 " data-id="<?= $row['id'] ?>">
                                        <i class='bx bx-play-circle'></i>
                                    </button>
                                </div>
                                <div class="mt-3" id="active_audio_<?= $row['id'] ?>" style="display:none;">
                                    <audio class="podcast_<?= $row['id'] ?> w-100" id="podcast_<?= $row['id'] ?>" controls style="height: 30px;">
                                        <source src="<?= $main_base_url . 'episode_audio/' . $row['audio'] ?>" type="audio/mpeg">
                                    </audio> 
                                </div>
                            </div>
                        </div>
                    <?php }
                } else { ?>
                    <h1 class="text-white">No Episodes</h1>
                <?php } ?> 
            </div>
        </div>
    </div>
</section>


<script>
        $(document).ready(function () {
            $(document).delegate(".play_icone", "click", function (e) {

                var el_ = $(this);
                var id = $(this).attr('data-id');
                var audio = document.getElementById('podcast_' + id);

                if (audio.paused) {
                    $(".play_icone").each(function () {
                        var ids = $(this).attr('data-id');
                        var audios = document.getElementById('podcast_' + ids);

                        audios.pause();
                        $(this).html('<i class="bx bx-play-circle"></i>');
                        $('#active_class_'+ids).removeClass('play_active');
                        $('#active_audio_'+ids).removeClass('audio_active');
                    });
                    audio.play();
                    el_.html('<i class="bx bx-pause-circle"></i>');
                    $('#active_class_'+id).addClass('play_active');
                    $('#active_audio_'+id).addClass('audio_active');
                } else {
                    audio.pause();
                    el_.html('<i class="bx bx-play-circle"></i>');
                    $('#active_class_'+id).removeClass('play_active');
                    $('#active_audio_'+id).removeClass('audio_active');
                }
            });
        });

    </script>

<?php include('layout/footer.php'); ?>