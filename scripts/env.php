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
	"path" => $env,
	"app_env"=>$_POST['app_env'],
	"app_debug"=>$_POST['app_debug'],
	"app_url"=> addslashes($_POST['app_url'])
);




//if env file don't exisit create it
if (!file_exists($envFile)) {

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

exec("sed -i 's/APP_ENV=.*/APP_ENV={$_POST['app_env']}/g' ".escapeshellarg($envFile));
exec("sed -i 's/APP_DEBUG=.*/APP_DEBUG={$_POST['app_debug']}/g' ".escapeshellarg($envFile));
exec("sed -i 's/APP_URL=.*/APP_URL={$_POST['app_url']}/g' ".escapeshellarg($envFile));

exec("sed -i 's/APP_ENV=.*/APP_ENV={$_POST['app_env']}/g'". escapeshellarg($env));
exec("sed -i 's/APP_DEBUG=.*/APP_DEBUG={$_POST['app_debug']}/g'". escapeshellarg($env));
exec("sed -i 's/APP_URL=.*/APP_URL={$result['env']['app_url']}/g'". escapeshellarg($env));