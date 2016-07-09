<?php

// echo "<pre>";
// print_r($_POST);
// die();

$project_root_path = realpath(dirname(dirname(dirname(__file__))));
$install_src_path = realpath(dirname(__file__) . "/scripts/");


//used in the other install scripts exported json at the end.
$result = array();

$env = $project_root_path. '/.env';



//.env needs to exsist first for private variables
include $install_src_path . '/env.php';

// installs
include $install_src_path . '/database.php';
include $install_src_path . '/queue.php';
include $install_src_path . '/settings.php';
// include $install_src_path . 'ffmpeg.php';


if($result['all_success']){
	//delete install directory from public
}
print_r( json_encode($result) );

?>
