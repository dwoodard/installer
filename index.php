<?php $project_root_path = realpath(dirname(dirname(dirname(__file__)))); ///var/www/html ?>

<!DOCTYPE html>
<html>
<head>
	<title>Demo</title>
	<meta charset="utf-8">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.js"></script>
	<!-- steps -->
	<script src="js/jquery.steps/jquery.steps.js"></script>
	<link rel="stylesheet" href="js/jquery.steps/jquery.steps.css">

	<!-- bootstrap -->
	<script src="js/bootstrap/js/bootstrap.min.js"></script>
	<link href="js/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

	<link rel="stylesheet" href="css/main.css">
</head>
<body>

	<h1>Installer</h1>

	<div id="wizard">
		<h3>General</h3>
		<section>
			<p>This wizard will guide you through the installation and configuration.</p>
			<h2><?php echo shell_exec("php $project_root_path/artisan --version")?></h2>
<pre>sudo chmod 775 <?php echo $project_root_path ?>/config
sudo chmod 775 <?php echo $project_root_path ?>/config/app.php
sudo chmod 775  <?php echo $project_root_path ?>/storage
sudo chmod 775 -Rf <?php echo $project_root_path ?>/storage/*
</pre>

			<p>Make sure Files exsist and directories are writable:</p>

			<?php
			$env = realpath($project_root_path."/.env");
			$vendor = realpath($project_root_path."/vendor");
			$app_config = realpath($project_root_path."/config");
			$app_config_app = realpath($project_root_path."/config/app.php");
			$app_storage = realpath($project_root_path."/storage");
			$app_storage_cache = realpath($project_root_path."/storage/framework/sessions");
			$app_storage_cache = realpath($project_root_path."/storage/framework/cache");
			$app_storage_cache = realpath($project_root_path."/storage/framework/views");
			$app_storage_logs = realpath($project_root_path."/storage/logs");
			?>


			<ul class="checklist">
				<li class="<?php echo file_exists($env) ? "checkmark" : "error" ?>"><?php echo $project_root_path ?>/.env - (This will be generated if it doesn't exsist)</li>
				<li class="<?php echo file_exists($vendor) ? "checkmark" : "error" ?>"><?php echo $project_root_path ?>/vendor</li>
				<li class="<?php echo is_writable($app_config) ? "checkmark" : "error" ?>"><?php echo $project_root_path ?>/config</li>
				<li class="<?php echo is_writable($app_config_app) ? "checkmark" : "error" ?>"><?php echo $project_root_path ?>/config/app.php</li>
				<li class="<?php echo is_writable($app_storage) ? "checkmark" : "error" ?>"><?php echo $project_root_path ?>/storage</li>
				<li class="<?php echo is_writable($app_storage_logs) ? "checkmark" : "error" ?>"><?php echo $project_root_path ?>/storage/logs</li>
				<li class="<?php echo is_writable($app_storage_cache) ? "checkmark" : "error" ?>"><?php echo $project_root_path ?>/storage/framework/sessions</li>
				<li class="<?php echo is_writable($app_storage_cache) ? "checkmark" : "error" ?>"><?php echo $project_root_path ?>/storage/framework/cache</li>
				<li class="<?php echo is_writable($app_storage_cache) ? "checkmark" : "error" ?>"><?php echo $project_root_path ?>/storage/framework/views</li>
			</ul>
		</section>
		<!-- /General -->

		<h3>App</h3>
		<section>
			<div class="row">
				<div class="span2">
					<label><strong>App Environment</strong></label>
					<select id="app_env" name='app_env' style="width:125px;">
						<option value="local">local</option>
						<option value="production">production</option>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="span2">
					<label><strong>Debug</strong></label>
					<select id="app_debug" name='app_debug' style="width:125px;">
						<option value="true">true</option>
						<option value="false">false</option>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="span2">
					<label><strong>App Url</strong></label>
					<input type="text" id="app_url" name='app_url' value="http://localhost" style="width:125px;">
				</div>
			</div>
		</section>
		<!-- /App -->

		<h3>Database</h3>
		<section>
			<h1>Database</h1>

			<div class="wizard-input-section">
				<p>
					Which database would you like to use.
				</p>
				<div class="control-group">
					<select id="database-type" name='database-type'>
						<option value="mysql">MySQL</option>
						<option value="sqlite">SQLite3</option>
						<option value="sqlsrv">MSSQL Server</option>
						<option value="pgsql">Postgres</option>
					</select>
					<div class="row">
						<div class="span3">
							<label><strong>Host</strong></label>
							<input type="text" name="host" value="<?php echo $_SERVER['SERVER_NAME']; ?>" placeholder="localhost" />
						</div>
						<div class="span1">
							<label><strong>Port</strong></label>
							<input style="width:45px;" type="text" name="port" placeholder="3306" />
						</div>
						<div class="span1">
							<label><strong>Database</strong></label>
							<input style="width:125px;" type="text" name="database" placeholder="mydb" value="mydb" />
						</div>
					</div>
					<div class="row">
						<div class="span3">
							<label><strong>Username</strong></label>
							<input type="text"  name="user" placeholder="root" value="root" />
						</div>
						<div class="span2">
							<label><strong>Password</strong></label>
							<input type="password"  name="password" placeholder="password" value="root" />
						</div>
					</div>
			</div>
		</section>
		<!-- /Database -->
	</div>

	<div id="successModal" class="modal fade" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Success!</h4>
				</div>

				<div class="modal-body">
					<p>asdf</p>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<a href="<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>" type="button" class="btn btn-primary">Done</a>
				</div><!-- /.modal-footer -->

			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

		<script>
		var data;
			$("#wizard").steps({
				headerTag: "h3",
				bodyTag: "section",
				transitionEffect: "slideLeft",
				// stepsOrientation: "vertical",
				onFinished: function (event, currentIndex) {
					console.log(event, currentIndex);

					$.ajax({
						type: "POST",
						url: "install.php",
						data: $(":input").serialize(),
						dataType: "json",
						success: function(result) {
							data = result;

							/**
							* Once finished do what?
							*/

							console.log(result);
							$('#successModal').modal({
								show: true
							});

							//window.location = window.location.protocol + "//" + window.location.host;

						},
						error: function(result){
							console.log(result);
						}

					});
				}


			});
		</script>
	</body>
	</html>


