<?php
$fav = get_field('favicon', 'option');
$fav = $fav['id'];

$fav16 = wp_get_attachment_image_src($fav, 'fav16');
$fav32 = wp_get_attachment_image_src($fav, 'fav32');
$fav96 = wp_get_attachment_image_src($fav, 'fav96');
$fav196 = wp_get_attachment_image_src($fav, 'fav196');

$fav57 = wp_get_attachment_image_src($fav, 'fav57');
$fav60 = wp_get_attachment_image_src($fav, 'fav60');
$fav72 = wp_get_attachment_image_src($fav, 'fav72');
$fav76 = wp_get_attachment_image_src($fav, 'fav76');
$fav114 = wp_get_attachment_image_src($fav, 'fav114');
$fav120 = wp_get_attachment_image_src($fav, 'fav120');
$fav144 = wp_get_attachment_image_src($fav, 'fav144');
$fav152 = wp_get_attachment_image_src($fav, 'fav152');
$fav180 = wp_get_attachment_image_src($fav, 'fav180');
$fav192 = wp_get_attachment_image_src($fav, 'fav192');
?>