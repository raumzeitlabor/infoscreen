<?php
include("PachubeAPI/PachubeAPI.php");
include("config.php");

$pachube = new PachubeAPI($config->api_key);

$json = $pachube->getFeed("json", $config->feed);
//$temperature = json_decode($json)->current_value;
//echo $temperature;

foreach (json_decode($json)->datastreams as $datastream) {
	switch ($datastream->id) {
		case $config->temperature:
			$data["temperature"] = $datastream->current_value;
			break;
		case $config->power:
			$data["power"] = $datastream->current_value;
			break;
		case $config->door:
			$data["door"] = $datastream->current_value;
			break;
		case $config->devices:
			$data["devices"] = $datastream->current_value;
			break;
	}
}

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 19 Jul 1997 00:00:00 GMT');
header('Content-type: application/json');
echo json_encode($data);
?>
