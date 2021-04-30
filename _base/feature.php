<?php
include "../_config/config.php";
if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
  $uri = 'https://';
} else {
  $uri = 'http://';
}
$uri .= $_SERVER['HTTP_HOST'];

// nah kalo di include jadi gagal karena si include keknya mulai dari folder itu
// include "$url/_themes/homepage.html";

include '../_themes/feature/feature_map.php';
exit;

?>