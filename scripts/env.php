<?php

/*
*                        _
*   ___ _ ____   ___ __ | |__  _ __
*  / _ \ '_ \ \ / / '_ \| '_ \| '_ \
* |  __/ | | \ V /| |_) | | | | |_) |
*  \___|_| |_|\_(_) .__/|_| |_| .__/
*                 |_|         |_|
*/

if (!$_POST || !$project_root_path) {
	die("missing Data");
}

$result['env'] = array(
	// 'file' => __FILE__,
	// 'pwd' => shell_exec('pwd'),
	// 'project_root_path' => $project_root_path
	);



//if env file don't exisit create it
if (!file_exists($project_root_path. '/.env')) {

	//copy file from default .env.example
	copy($project_root_path . '/.env.example', $project_root_path . '/.env');

	$result['env']['has_env'] = true;
} else{
	$result['env']['has_env'] = true;

}




