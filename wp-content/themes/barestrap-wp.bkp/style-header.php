<?php 
include "lessc.inc.php";
$less = new lessc($_SERVER["PATH"] . "/assets/css/header.less");
$css = $less->parse();
echo $css;
?>