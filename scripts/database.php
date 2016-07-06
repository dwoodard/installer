<?php
/*
*      _       _        _                            _
*     | |     | |      | |                          | |
*   __| | __ _| |_ __ _| |__   __ _ ___  ___   _ __ | |__  _ __
*  / _` |/ _` | __/ _` | '_ \ / _` / __|/ _ \ | '_ \| '_ \| '_ \
* | (_| | (_| | || (_| | |_) | (_| \__ \  __/_| |_) | | | | |_) |
*  \__,_|\__,_|\__\__,_|_.__/ \__,_|___/\___(_) .__/|_| |_| .__/
*                                             | |         | |
*                                             |_|         |_|
*/
if (!$_POST || !$project_root_path) {
	die("missing Data");
}

$result['database'] =  array();

$sql = 'CREATE DATABASE IF NOT EXISTS ' . $_POST['database'];


// Does Database EXIST if not make it?
$mysqli = new mysqli($_POST['host'], $_POST['user'], $_POST['password']);

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

/* Create table doesn't return a resultset */
if ($mysqli->query($sql) === TRUE) {
    $result['database']['created_status'] = "Database Created successfully.";
    $result['database']['created'] = true;
}
else{
	$result['database']['created_status'] = "Error Creating Database.";
    $result['database']['created'] = false;
}

$mysqli->close();

$_POST['port'] = ($_POST['port'] ==  '' ? 3306 : $_POST['port']);

exec("sed -i 's/DB_CONNECTION=.*/DB_CONNECTION={$_POST['database-type']}/g' ".escapeshellarg($file));
exec("sed -i 's/DB_HOST=.*/DB_HOST={$_POST['host']}/g' ".escapeshellarg($file));
exec("sed -i 's/DB_PORT=.*/DB_PORT={$_POST['port']}/g' ".escapeshellarg($file));
exec("sed -i 's/DB_DATABASE=.*/DB_DATABASE={$_POST['database']}/g' ".escapeshellarg($file));
exec("sed -i 's/DB_USERNAME=.*/DB_USERNAME={$_POST['user']}/g' ".escapeshellarg($file));
exec("sed -i 's/DB_PASSWORD=.*/DB_PASSWORD={$_POST['password']}/g' ".escapeshellarg($file));


$result['database']['success'] = true;
$result['database']['file'] = $file;
$result['database']['migration'] = shell_exec("php $project_root_path/artisan migrate ");

 ?>
