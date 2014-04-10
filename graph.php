<?php
function loadGraph()
{
	$type = $_GET['type'];
	switch ($type) {
		case 'stromverbrauch':
			$imgname = "https://api.cosm.com/v2/feeds/42055/datastreams/Strom_Leistung.png?width=450&height=130&c=ff33ff&duration=30minutes&title=Stromverbrauch&stroke_size=2&show_axis_labels=true&detailed_grid=true&scale=auto&timezone=Berlin&v=1395676268666";
			break;
		case 'temperatur':
			$imgname = "https://api.cosm.com/v2/feeds/42055/datastreams/Temperatur_Raum_Beamerplattform.png?width=450&height=130&c=ff33ff&duration=3hours&title=Temperatur&stroke_size=2&show_axis_labels=true&detailed_grid=true&scale=auto&timezone=Berlin&v=1395676268666";
			break;
		case 'payback':
			$imgname = "https://api.cosm.com/v2/feeds/42055/datastreams/Payback_Punkte.png?width=450&height=130&c=ff33ff&duration=30days&title=Payback%20Punkte&stroke_size=2&show_axis_labels=true&detailed_grid=true&scale=auto&timezone=Berlin&v=1395676268666";
			break;
		case 'kontostand':
			$imgname = "https://api.cosm.com/v2/feeds/42055/datastreams/Kontostand.png?width=450&height=130&c=ff33ff&duration=30days&title=Kontostand&stroke_size=2&show_axis_labels=true&detailed_grid=true&scale=auto&timezone=Berlin&v=1395676268666";
			break;
	}
    $im = @imagecreatefrompng($imgname);

    imagefilter($im, IMG_FILTER_NEGATE);
    return $im;
}

if(realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
	// Send header
	header('Cache-Control: no-cache, must-revalidate');
	header('Expires: Mon, 19 Jul 1997 00:00:00 GMT');
	header('Content-Type: image/png');
	
	$img = loadGraph();

	imagepng($img);
	imagedestroy($img);
}
?>
