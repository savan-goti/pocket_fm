<?php 

function redirect($location){
    // header("Location: ".$location);
    echo "<script>
        window.location.assign('".$location."')
    </script>";
    exit;
}

function pr($print_r){
    echo"<pre>";
    print_r($print_r);
    echo"</pre>";
}

?>