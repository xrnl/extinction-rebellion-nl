<?php

$body = <<<EOF
Name: {$_POST['name']}
Email: {$_POST['email']}
Message:
{$_POST['message']}
EOF;

mail('xr-nl-contact@protonmail.com', 'contact form from XR-NL', $body);
?>
<html>
<head>
	<title>Extinction Rebellion - De Opstand Begint</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="extinctionrebellion-icon" href="images/favicon.png"/>
	<link rel="icon" href="images/favicon.png" type="image/x-icon"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="css/app.css" />
	<style>
		@font-face {
			font-family: 'FucXed';
			src: url('fonts/fucxedcaps-webfont.woff2') format('woff2'),url('fonts/fucxedcaps-webfont.woff') format('woff'),url('fonts/fucxedcaps-webfont.otf') format('otf');
			font-weight: normal;
			font-style: normal
		}
	</style>
</head>
<body>

<div class="container">

	<header class="row">
		<div class="col-sm-12 col-md-6 col-lg-8">
			<h1>WHO ARE WE?</h1>


		</div>

		<div class="col-sm-12 col-md-6 col-lg-4">
			<div class="logo">
				<img src="images/extinctionrebellion-logo_240.png">
				<span>NEDERLAND</span>
			</div>
		</div>
	</header>
	<div class="row">
		<div class="col-sm-12">
			<img src="images/extinctionsymbol_800.png">
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 block">

			<p>Thanks for registering</p>
		</div>
	</div>


	<div class="row">
		<div class="col-sm-12">
			<a href="https://rebellion.earth/" style="display:block; text-align: center">
				<img src="images/extinctionrebellion-logo_240.png" />
			</a>
		</div>
	</div>

</div>

<script src="js/app.js"></script>
</body>
</html>
