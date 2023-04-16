<?php
class otp {
  public $name;

  function __construct($name) {
    $this->name = $name; 
  }
  function get_name() {
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') { 
        $url = "https://";   
    }else {
        $url = "http://"; 
    }  
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   

    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];

    $path = parse_url($url, PHP_URL_PATH);
    $pathFragments = explode('/', $path);
    $end = end($pathFragments);
    return $end;  

    // $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    // return $uriSegments[5];
  }
}

$apple = new otp("");
echo $apple->get_name();
?>
