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
		<link rel="stylesheet" href="http://twitter.github.com/bootstrap/1.4.0/bootstrap.min.css">
		<link rel="stylesheet" href="styles/main.css">

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script type="text/javascript" src="scripts/main.js"></script>
		
		<!-- Tumblr Foo -->
		<script type='text/javascript' src='http://raumzeitlabor.tumblr.com/api/read/json?number=1&type=photo'></script>
		<script type='text/javascript' src="scripts/tumblr.js"></script>
	</head>

	<body>

		<div class="topbar" data-scrollspy="scrollspy" >
			<div class="fill">
				<div class="container">
					<a class="brand" href="#">RaumZeitLabor InfoScreen</a>

					<span class="label important pull-right" id="door">Offen</span>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="content">
				<div class="row">
					<div class="span10">
						<div class="row">
							<div class="span3 centered box">
								<h4>Stromverbauch</h4>
								<h2><span id="power">0</span> W</h2>
							</div>
							<div class="span3 centered box">
								<h4>Temperatur</h4>
								<h2><span id="temperature">0</span> °C</h2>
							</div>
							<div class="span3 centered box">
								<h4>Ger&auml;te</h4>
								<h2><span id="devices">0</span></h2>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="span3 centered box">
								<h4>Mitglieder</h4>
								<h2><span id="members">0</span></h2>
							</div>
							<div class="span3 centered box">
								<h4>Kontostand</h4>
								<h2><span id="account">0</span> &euro;</h2>
							</div>
							<div class="span3 centered box">
								<h4>Internet</h4>
								<h4>&darr; <span id="internet_down">0</span> kB/s&nbsp;&nbsp;&uarr; <span id="internet_up">0/0</span> kB/s</h4>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="span9">
								<img src="https://api.cosm.com/v2/feeds/42055/datastreams/Strom_Leistung.png?width=560&height=200&colour=%23f15a24&duration=1hour&title=Stromverbrauch&stroke_size=2&show_axis_labels=true&detailed_grid=true&scale=auto&timezone=Berlin" id="graph" />
							</div>
						</div>
						<div class="row">
							<div class="span5 centered box" id="frame_wrapper">
								<h4>RNV: Boveristra&szlig;e</h4>
								<iframe src="http://efa9-5.vrn.de/vrn/XSLT_DM_REQUEST?language=de&itdLPxx_dmlayout=gadget&itdLPxx_gadget=version_1.0.4&timeOffset=3&type_dm=any&mode=direct&limit=8&useRealtime=1&locationServerActive=1&anySigWhenPerfectNoOtherMatches=1&anyHitListReductionLimit=40&anyMaxSizeHitList=550&name_dm=6002359" id="frame"></iframe>
							</div>
							<div class="span4 centered box">
								<h4>log.raumzeitlabor.de</h4>
								<div id='tumblr' style='text-align:center;'>
									<img border='0' style='margin:0' src='placeholder.png' alt='' style="width:100%;"/>
									<div id="invisible" style="position: absolute; top: -9999px;">&nbsp;</div>
								</div>
							</div>
						</div>
					</div>
					<div class="span6">
						<script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script>
						<script>
							new TWTR.Widget({
							  version: 2,
							  type: 'search',
							  search: '#rauzmzeitlabor OR @raumzeitlabor OR from:raumzeitlabor',
							  interval: 30000,
							  title: 'RaumZeitlabor related Tweets',
							  subject: 'Twitter Awesomeness!!!1!',
							  width: 'auto',
							  height: 425,
							  theme: {
								shell: {
								  background: '#8ec1da',
								  color: '#ffffff'
								},
								tweets: {
								  background: '#ffffff',
								  color: '#444444',
								  links: '#1985b5'
								}
							  },
							  features: {
								scrollbar: false,
								loop: true,
								live: true,
								behavior: 'default'
							  }
							}).render().start();
						</script>
					</div>
				</div>
			</div>

			<footer>
				<?php
					if (is_file('./footer.inc.php')) {
						include('./footer.inc.php');
					} else {
						echo "<p>&copy; RaumZeitLabor 2012</p>";
					}
				?>
			</footer>

		</div> <!-- /container -->

	</body>
</html>
