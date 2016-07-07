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

$result['env'] = array();



//if env file don't exisit create it
if (!file_exists($project_root_path. '/.env')) {

	//copy file from default .env.example
	$result['env']['file_copied'] = copy($project_root_path . '/.env.example', $project_root_path . '/.env');
	$result['env']['has_env'] = true;
} else{
	$result['env']['has_env'] = true;
	$result['env']['file_copied'] = false;
}

$result['env']['app_key'] = str_replace(array("\r", "\n"), '', shell_exec("cat {$project_root_path}'/.env'|grep APP_KEY"));

if($result['env']['app_key'] == "APP_KEY=SomeRandomString"){
	$result['env']['app_key'] = shell_exec("php $project_root_path/artisan key:generate");
}



