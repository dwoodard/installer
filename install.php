<?php

// echo "<pre>";
// print_r($_POST);
// die();

$project_root_path = realpath(dirname(dirname(dirname(__file__))));
$install_src_path = realpath(dirname(__file__) . "/scripts/");

$result = array();

//.env need to exsist first for private variables?
include $install_src_path . '/env.php';

//
include $install_src_path . '/database.php';
include $install_src_path . '/queue.php';
include $install_src_path . '/settings.php';
// include $install_src_path . 'ffmpeg.php';

print_r( json_encode($result) );
?>
