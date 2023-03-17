<?php include('layout/header.php'); ?>

<section id="HomeBanner" class="slider" style="margin: 40px 0px;">
    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <div class="card card_bg border border-light">
                    <img src="image/show_image.jpg" class="card-img-top p-2" alt="...">
                    <div class="">
                        <table class="table table-bordered mb-0">
                            <tbody>
                                <tr class="card_table_text">
                                    <th scope="row">RELEASE DATE</th>
                                    <td>SEPTEMBER 1, 2014</td>
                                </tr>
                                <tr class="card_table_text">
                                    <th scope="row">RECORD LABEL</th>
                                    <td>CHORDS RECORDS</td>
                                </tr>
                                <tr class="card_table_text">
                                    <th scope="row">CATALOG NUMBER</th>
                                    <td>CR001</td>
                                </tr>
                                <tr class="card_table_text">
                                    <th scope="row">AVAILABLE NOW AT</th>
                                    <td>AMAZON</td>
                                </tr>
                                <tr class="card_table_text">
                                    <th scope="row">AVAILABLE NOW AT</th>
                                    <td>AMAZON</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-8">

                <audio id="myAudio">
                    <source src="image/sample-6s.ogg" type="audio/ogg">
                    <source src="image/sample-6s.mp3" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
                <!-- Ep. 01 -->
                <div class="card mt-2 play_button_bg border-0">
                    <div class="card-body ">
                        <div class="col-sm-12 d-flex align-items-center justify-content-between text-light">
                            Ep. 01 - Wo Laut Aaya
                            <button type="button" id="pause" class="btn btn-dark play_icone border-0"
                                onclick="pauseAudio()">
                                <i class='bx bx-pause-circle'></i>
                            </button>
                            <button type="button" id="play" class="btn btn-dark play_icone border-0 "
                                onclick="playAudio()">
                                <i class='bx bx-play-circle'></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Ep. 02 -->
                <div class="card mt-2 play_button_bg border-0">
                    <div class="card-body ">
                        <div class="col-sm-12 d-flex align-items-center justify-content-between text-light">
                            Ep. 02 - Ulta Pada Daanv
                            <button class="btn btn-dark play_icone border-0">
                                <i class='bx bx-play-circle'></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Ep. 03 -->
                <div class="card mt-2 play_button_bg border-0">
                    <div class="card-body ">
                        <div class="col-sm-12 d-flex align-items-center justify-content-between text-light">
                            Ep. 03 - Avataar
                            <button class="btn btn-dark play_icone border-0">
                                <i class='bx bx-play-circle'></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Ep. 04 -->
                <div class="card mt-2 play_button_bg border-0">
                    <div class="card-body ">
                        <div class="col-sm-12 d-flex align-items-center justify-content-between text-light">
                            Ep. 04 - Bargad Ke Phal
                            <button class="btn btn-dark play_icone border-0">
                                <i class='bx bx-play-circle'></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Ep. 05 -->
                <div class="card mt-2 play_button_bg border-0">
                    <div class="card-body ">
                        <div class="col-sm-12 d-flex align-items-center justify-content-between text-light">
                            Ep. 05 - Rahasyamayi Yogi
                            <button class="btn btn-dark play_icone border-0">
                                <i class='bx bx-play-circle'></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Ep. 06 -->
                <div class="card mt-2 play_button_bg border-0">
                    <div class="card-body ">
                        <div class="col-sm-12 d-flex align-items-center justify-content-between text-light">
                            Ep. 06 - Divya Phal Ka Asar
                            <button class="btn btn-dark play_icone border-0">
                                <i class='bx bx-play-circle'></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<?php include('layout/footer.php'); ?>