<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>RaumZeitLabor InfoScreen</title>
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
							<div class="span9">
								<img src="https://api.cosm.com/v2/feeds/42055/datastreams/Strom_Leistung.png?width=560&height=200&colour=%23f15a24&duration=1hour&title=Stromverbrauch&stroke_size=2&show_axis_labels=true&detailed_grid=true&scale=auto&timezone=Berlin" id="graph" />
							</div>
						</div>
						<div class="row">
							<div class="span5 box" id="frame_wrapper">
								<h4>RNV: Boveristra&szlig;e</h4>
								<iframe src="http://efa9-5.vrn.de/vrn/XSLT_DM_REQUEST?language=de&itdLPxx_dmlayout=gadget&itdLPxx_gadget=version_1.0.4&timeOffset=3&type_dm=any&mode=direct&limit=8&useRealtime=1&locationServerActive=1&anySigWhenPerfectNoOtherMatches=1&anyHitListReductionLimit=40&anyMaxSizeHitList=550&name_dm=6002359" id="frame"></iframe>
							</div>
							<div class="span4 centered box">
								<h4>log.raumzeitlabor.de</h4>
								<div class='ji-tumblr-photos'>
									<a id='ji-tumblr-url-rzllog-1' href=''>
										<img border='0' style='margin:0' id='ji-tumblr-photo-rzllog-1' src='' alt='' />
									</a>
									<a id='ji-tumblr-url-rzllog-2' href=''>
										<img border='0' style='margin:0' id='ji-tumblr-photo-rzllog-2' src='' alt='' />
									</a>
									<a id='ji-tumblr-url-rzllog-3' href=''>
										<img border='0' style='margin:0' id='ji-tumblr-photo-rzllog-3' src='' alt='' />
									</a>
									<a id='ji-tumblr-url-rzllog-4' href=''>
										<img border='0' style='margin:0' id='ji-tumblr-photo-rzllog-4' src='' alt='' />
									</a>
								</div>
								<script type='text/javascript' src='http://raumzeitlabor.tumblr.com/api/read/json?number=4&type=photo'>
								</script>
								<script type='text/javascript'>
									document.getElementById('ji-tumblr-photo-rzllog-1').setAttribute('src', tumblr_api_read.posts[0]['photo-url-75']);
									document.getElementById('ji-tumblr-url-rzllog-1').setAttribute('href', tumblr_api_read.posts[0]['url-with-slug']);
									document.getElementById('ji-tumblr-photo-rzllog-2').setAttribute('src', tumblr_api_read.posts[1]['photo-url-75']);
									document.getElementById('ji-tumblr-url-rzllog-2').setAttribute('href', tumblr_api_read.posts[1]['url-with-slug']);
									document.getElementById('ji-tumblr-photo-rzllog-3').setAttribute('src', tumblr_api_read.posts[2]['photo-url-75']);
									document.getElementById('ji-tumblr-url-rzllog-3').setAttribute('href', tumblr_api_read.posts[2]['url-with-slug']);
									document.getElementById('ji-tumblr-photo-rzllog-4').setAttribute('src', tumblr_api_read.posts[3]['photo-url-75']);
									document.getElementById('ji-tumblr-url-rzllog-4').setAttribute('href', tumblr_api_read.posts[3]['url-with-slug']);
								</script>
							</div>
						</div>
					</div>
					<div class="span6">
						<script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script>
						<script>
							new TWTR.Widget({
							  version: 2,
							  type: 'search',
							  search: '#rauzmzeitlabor OR #rzl OR @raumzeitlabor OR from:raumzeitlabor',
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
