<?php
function loadGraph()
{
    $imgname = "https://api.cosm.com/v2/feeds/42055/datastreams/Strom_Leistung.png?width=960&height=200&c=ff33ff&duration=1hour&title=Stromverbrauch&stroke_size=2&show_axis_labels=true&detailed_grid=true&scale=auto&timezone=Berlin&v=1395676268666";
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
