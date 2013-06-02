<?php
include("ajax.php");
$data = getInfoscreenData();

// Send header
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 19 Jul 1997 00:00:00 GMT');
header('Content-type: application/json; charset=utf-8');

// Fill data
$data = array(
	"api" => "0.13",
	"space" => "RaumZeitLabor",
	"logo" => "http://raumzeitlabor.de/w/images/8/85/RaumZeitLabor_-_Logo_-_Schwarz.png",
	"url" => "http://raumzeitlabor.de",
	"location" => array(
		"address" => "Boveristrasse 22-24, 68309 Mannheim, Germany",
		"lon" => 8.4994033,
		"lat" => 49.5079481
	),
	"spacefed-auth" => false,
	"contact" => array(
		"email" => "info@raumzeitlabor.de",
		"irc" => "irc://irc.hackint.eu/raumzeitlabor",
		"ml" => "raumzeitlabor@raumzeitlabor.de",
		"twitter" => "@RaumZeitLabor",
		"phone" => "+4962176231370",
		"issue-mail" =>  base64_encode("hello@tiefpunkt.com")
	),
	"issue-report-channels" => array("issue-mail"),
	"sensors" => array(
		array( "temp" => array(
			"Main Space" => $data["temperature"] . "C"
		)),
		array( "power_consumption" => array(
			"Main" => $data["power"] . "W"
		)),
		array( "member_count" => array( "member_count" => $data["members"])),
		array( "devices" => array( "main" => $data["devices"])) ,
		array( "account_balance" => array( "main" => $data["account"])) ,
	),
	"feeds" => array(
		array(
			"name" => "blog",
			"type" => "application/rss+xml",
			"url" => "https://raumzeitlabor.de/feed/"
		),
		array(
			"name" => "log",
			"type" => "application/rss+xml",
			"url" => "http://log.raumzeitlabor.de/rss"
		),
		array(
			"name" => "log",
			"type" => "text/calendar",
			"url" => "https://raumzeitlabor.de/events.ics"
		)
	),
	"cache" => array( "schedule" => "m.02" ),
	"state" => array(
		"icon" => array(
			"open" => "http://status.raumzeitlabor.de/images/green.png",
			"closed" => "http://status.raumzeitlabor.de/images/red.png"
		),
		"open" => ($data["door"] == 1)
	),
	"projects" => array(
		"http://github.com/raumzeitlabor",
		"http://wiki.raumzeitlabor.de/wiki/Kategorie:Projekt"
	)
);

echo json_encode($data);
?>
