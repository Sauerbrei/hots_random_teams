<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Empty Title</title>

	<link rel="stylesheet" href="assets/css/normalize.css" />
	<link href="https://fonts.googleapis.com/css?family=Exo:400,600,700" rel="stylesheet">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
		  integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
		  crossorigin="anonymous">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
		  integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
		  crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/main.css" />
</head>


<body>

	<nav>
		<div class="row">
			<nav class="navbar navbar-default">
				<div class="container-fluid">

					<div class="col-md-1">
						<div class="navbar-header">
							<img src="assets/img/hots_logo.png"/>
						</div>
					</div>

					<div class="col-md-4">
						<div id="navbar" class="navbar-collapse collapse">
							<ul class="nav navbar-nav">
								<li><a href="#">Spielen</a></li>
								<li><a href="#">Shop</a></li>
								<li><a href="#">Replays</a></li>
							</ul>
						</div>
					</div>

					<div class="col-md-3 nav-height">
						<div class="row nav-vertical-align">
							<div id="front_messages">
								<div id="clock" class="box">
									<span class="thetime" id="eutime"></span>
									<span class="thetime hidden" id="ustime"></span>
								</div>
								<div class="box">
									<span><img src="assets/img/ico_msg.png" class="nav_ico"/></span>
								</div>

								<div class="box">
									<span><img src="assets/img/ico_msg.png" class="nav_ico"/></span>
								</div>
								<div class="box">
									<span><img src="assets/img/ico_msg.png" class="nav_ico"/></span>
								</div>
								<div class="box">
									<span><img src="assets/img/ico_msg.png" class="nav_ico"/></span>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-4" id="front_players">
						<div class="row">
							<div class="box big">
								<div class="add_player">
									<span>&nbsp;</span>
								</div>
							</div>
							<div class="box big">
								<div class="add_player">
									<span>&nbsp;</span>
								</div>
							</div>
							<div class="box big">
								<div class="add_player">
									<span>&nbsp;</span>
								</div>
							</div>
							<div class="box big" style="background: url(assets/img/avatars/av1.jpg) no-repeat scroll 0 0 / 100% auto;">
								<div class="">
									<span>&nbsp;</span>
								</div>
							</div>
							<div class="box bigger" style="background: url(assets/img/avatars/av2.jpg) no-repeat
								scroll 0 0 / 100% auto;">
								<span>&nbsp;</span>
							</div>
						</div>
					</div>
				</div>
			</nav>
		</div>
	</nav>



	<main>
		{include file=$template}
	</main>



	<footer>

	</footer>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://momentjs.com/downloads/moment.min.js"></script>

<script type="text/javascript" src="assets/js/custom.jquery.js"></script>
</body>
</html>
