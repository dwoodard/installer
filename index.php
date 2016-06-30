<!DOCTYPE html>
<html>
<head>
	<title>Demo</title>
	<meta charset="utf-8">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.js"></script>
	<script src="js/jquery.steps/jquery.steps.js"></script>
	<link rel="stylesheet" href="js/jquery.steps/jquery.steps.css">
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<h1>Installer</h1>
	<div id="wizard">

		<h3>Keyboard</h3>
		<section>
			<p>Make sure directories are writable:</p>
			<?php
				$project_root_path = realpath(dirname(dirname(dirname(__file__))));
				$app_config = realpath($project_root_path."/app/config");
				$app_config_app = realpath($project_root_path."/app/config/app.php");
				$app_storage = realpath($project_root_path."/app/storage");
				$app_storage_cache = realpath($project_root_path."/app/storage/cache");
				$app_storage_logs = realpath($project_root_path."/app/storage/logs");
				$app_storage_meta = realpath($project_root_path."/app/storage/meta");
				$app_storage_sessions = realpath($project_root_path."/app/storage/sessions");
				$app_storage_views = realpath($project_root_path."/app/storage/views");

			?>


			<ul class="checklist">
				<li class="<?php echo is_writable($app_config) ? "checkmark" : "error" ?>">app/config</li>
				<li class="<?php echo is_writable($app_config_app) ? "checkmark" : "error" ?>">app/config/app.php</li>
				<li class="<?php echo is_writable($app_storage) ? "checkmark" : "error" ?>">app/storage</li>
				<li class="<?php echo is_writable($app_storage_cache) ? "checkmark" : "error" ?>">app/storage/cache</li>
				<li class="<?php echo is_writable($app_storage_logs) ? "checkmark" : "error" ?>">app/storage/logs</li>
				<li class="<?php echo is_writable($app_storage_meta) ? "checkmark" : "error" ?>">app/storage/meta</li>
				<li class="<?php echo is_writable($app_storage_sessions) ? "checkmark" : "error" ?>">app/storage/sessions</li>
				<li class="<?php echo is_writable($app_storage_views) ? "checkmark" : "error" ?>">app/storage/views</li>
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


