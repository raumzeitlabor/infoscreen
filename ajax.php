<?php
include("PachubeAPI/PachubeAPI.php");
include("config.php");

$output= "";

// Try to see if there's some recent cached output available
if (file_exists($config->cache) && (time() < filemtime($config->cache) + $config->cache_expire)) {

	// It is. Let's use that as our output.
	$output = file_get_contents($config->cache);

} else {

	// No recent cached output. We need to get it from Cosm
	$pachube = new PachubeAPI($config->api_key);

	// Get the feed from the Cosm API, as a json
	$json = $pachube->getFeed("json", $config->feed);

	$data = array();
	
	// iterate through all data streams to get the values we need
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
			case $config->members:
				$data["members"] = $datastream->current_value;
				$data["mitgliederratio"] = ($data["members"]/314.931)*100;
				break;
			case $config->account:
				$data["account"] = $datastream->current_value;
				break;
			case $config->internet_up:
				$data["internet_up"] = $datastream->current_value;
				break;
			case $config->internet_down:
				$data["internet_down"] = $datastream->current_value;
				break;
		}
	}
	
	// Generate output
	$data["source"] = "live";
	$output = json_encode($data);
	
	// Write to cache
	$data["source"] = "cache";
	file_put_contents($config->cache, json_encode($data));
}

// Send header
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 19 Jul 1997 00:00:00 GMT');
header('Content-type: application/json');

// Send output
echo $output;
?>
