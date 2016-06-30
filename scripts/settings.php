<?php
/*
* Settings
*/

if (!$_POST || !$project_root_path) {
	die("missing Data");
}


$settings_path = $project_root_path.'/app/config/settings.php'; 

$settings_content = <<<CONTENT
<?php

return  array(
'auth-type' =>  '',
'auth-login' => '',
'auth-logout' => '',
);

CONTENT;

file_put_contents($settings_path, $settings_content);

 ?>