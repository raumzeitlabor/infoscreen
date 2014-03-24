<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>RaumZeitLabor InfoScreen</title>
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- Le styles -->
		<link rel="stylesheet" href="styles/kube.min.css">
		<link rel="stylesheet" href="styles/main.css">
		
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script type="text/javascript" src="scripts/main.js"></script>

		<!-- Tumblr Foo -->
		<script type='text/javascript' src='http://raumzeitlabor.tumblr.com/api/read/json?number=1&type=photo'></script>
		<script type='text/javascript' src="scripts/tumblr.js"></script>
	</head>

	<body>
		<header>
			<div class="container">
				<span class="right unknown" id="door">Unbekannt</span>
				<span class="right" id="clock"></span>
				<h1 class="">RaumZeitLabor InfoScreen</h1>
			</div>	
		</header>
		
		<div class="container">

			<div class="units-row">
				<div class="units-100">
					<img src="graph.php" id="graph" />
				</div>
			</div>
						
			<div class="units-row">
				<div class="unit-60">
					<div class="units-row">
						<div class="unit-30">
							<h4>Stromverbrauch</h4>
							<h2><span id="power">0</span> W</h2>
						</div>
						<div class="unit-30">
							<h4>Temperatur</h4>
							<h2><span id="temperature">0</span> °C</h2>
						</div>
						<div class="unit-20">
							<h4>Ger&auml;te</h4>
							<h2><span id="devices">0</span></h2>
						</div>
						<div class="unit-20">
							<h4>Internet</h4>
							<h5>&darr;<span id="internet_down">0</span> kB/s<br>&uarr;<span id="internet_up">0</span> kB/s</h5>
						</div>
					</div>
					
					<div class="units-row">
						<div class="unit-25">
							<h4>Mitglieder</h4>
							<h2><span id="members">0</span> <span class="small">(<span id="memberratio"></span> %)</span></h2>
						</div>
						<div class="unit-25">
							<h4>Kontostand</h4>
							<h2><span id="account">0</span> &euro;</h2>
						</div>
						<div class="unit-25">
							<h4>Payback</h4>
							<h2><span id="payback">0</span></h2>
						</div>
					</div>

					<div class="units-row">
						<div class="unit-50" id="frame_wrapper">
							<h4>RNV: Boveristra&szlig;e</h4>
							<iframe src="http://efa9-5.vrn.de/vrn/XSLT_DM_REQUEST?language=de&itdLPxx_dmlayout=gadget&itdLPxx_gadget=version_1.0.5&timeOffset=3&type_dm=any&mode=direct&limit=8&useRealtime=1&locationServerActive=1&anySigWhenPerfectNoOtherMatches=1&anyHitListReductionLimit=40&anyMaxSizeHitList=550&name_dm=6002359" id="frame"></iframe>
						</div>
						<div class="unit-50">
							<h4>log.raumzeitlabor.de</h4>
							<div id='tumblr' style='text-align:center;'>
								<img border='0' style='margin:0' src='placeholder.png' alt='' style="width:100%;"/>
								<div id="invisible" style="position: absolute; top: -9999px;">&nbsp;</div>
							</div>
						</div>
					</div>
				</div>
				<div class="unit-40">
					<a height="400px" class="twitter-timeline" data-theme="dark" data-dnt="true" href="https://twitter.com/search?q=%23raumzeitlabor+OR+%40raumzeitlabor"  data-widget-id="372066287532244992" data-chrome="nofooter noheader noscrollbar noborders transparent" data-link-color="#00cc00">Tweets about "#raumzeitlabor OR @raumzeitlabor"</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

				</div>
			</div>
		
			<footer>
				<?php
					if (is_file('./footer.inc.php')) {
						include('./footer.inc.php');
					} else {
						echo "<p>&copy; RaumZeitLabor 2014</p>";
					}
				?>
			</footer>
		</div>
	</body>
</html>
