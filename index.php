<?php $project_root_path = realpath(dirname(dirname(dirname(__file__)))); ///var/www/html ?>

<!DOCTYPE html>
<html>
<head>
	<title>Demo</title>
	<meta charset="utf-8">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.js"></script>
	<script src="js/jquery.steps/jquery.steps.js"></script>

	<link href="js/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="js/jquery.steps/jquery.steps.css">
	<link rel="stylesheet" href="css/main.css">

</head>
<body>
	<h1>Installer</h1>
	<div id="wizard">
		
		





		<h3>Gereal Setup</h3>

		<section>
			<h1>Gereal Setup</h1>
			<p>This wizard will guide you through the installation and configuration.</p>
			<h2><?php echo  shell_exec("php $project_root_path/artisan  --version")?></h2>


<pre>sudo chmod 775 config
sudo chmod 775 config/app.php
sudo chmod 775 storage/*
sudo chmod 775 storage
</pre>
			<p>Make sure directories are writable:</p>
			<?php
				$app_config = realpath($project_root_path."/config");
				$app_config_app = realpath($project_root_path."/config/app.php");
				$app_storage = realpath($project_root_path."/storage");
				$app_storage_cache = realpath($project_root_path."/storage/framework/sessions");
				$app_storage_cache = realpath($project_root_path."/storage/framework/cache");
				$app_storage_cache = realpath($project_root_path."/storage/framework/views");
				$app_storage_logs = realpath($project_root_path."/storage/logs");
				$app_storage_meta = realpath($project_root_path."/storage/meta");
				$app_storage_sessions = realpath($project_root_path."/storage/sessions");
				$app_storage_views = realpath($project_root_path."/storage/views");

				?>


				<ul class="checklist">
					<li class="<?php echo is_writable($app_config) ? "checkmark" : "error" ?>"><?php echo $project_root_path ?>/config</li>
					<li class="<?php echo is_writable($app_config_app) ? "checkmark" : "error" ?>"><?php echo $project_root_path ?>/config/app.php</li>
					<li class="<?php echo is_writable($app_storage) ? "checkmark" : "error" ?>"><?php echo $project_root_path ?>/storage</li>
					<li class="<?php echo is_writable($app_storage_cache) ? "checkmark" : "error" ?>"><?php echo $project_root_path ?>/storage/framework/sessions</li>
					<li class="<?php echo is_writable($app_storage_cache) ? "checkmark" : "error" ?>"><?php echo $project_root_path ?>/storage/framework/cache</li>
					<li class="<?php echo is_writable($app_storage_cache) ? "checkmark" : "error" ?>"><?php echo $project_root_path ?>/storage/framework/views</li>
					<li class="<?php echo is_writable($app_storage_logs) ? "checkmark" : "error" ?>"><?php echo $project_root_path ?>/storage/logs</li>
					<li class="<?php echo is_writable($app_storage_meta) ? "checkmark" : "error" ?>"><?php echo $project_root_path ?>/storage/meta</li>
					<li class="<?php echo is_writable($app_storage_sessions) ? "checkmark" : "error" ?>"><?php echo $project_root_path ?>/storage/sessions</li>
					<li class="<?php echo is_writable($app_storage_views) ? "checkmark" : "error" ?>"><?php echo $project_root_path ?>/storage/views</li>
				</ul>
			</section>

			<h3>Effects</h3>
			<section>
				<p>Wonderful transition effects.</p>
			</section>

			<h3>Pager</h3>
			<section>
				<p>The next and previous buttons help you to navigate through your content.</p>
			</section>

		</div>




		<script>
			$("#wizard").steps({
				headerTag: "h3",
				bodyTag: "section",
				transitionEffect: "slideLeft",
				stepsOrientation: "vertical",
				onCanceled: function (event) { console.log(event);},
				onFinishing: function (event, currentIndex) {console.log(event, currentIndex); },
				onFinished: function (event, currentIndex) {
					console.log(event, currentIndex);
				}
			});
		</script>
	</body>
	</html>


