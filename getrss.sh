#!/bin/bash
username="mantis-ro"
password="mantis-ro"
url="https://tickets.raumzeitlabor.de/mantis/issues_rss.php?username=mantis-ro&key=f2bf16f686ffb42d0f94d46015719079"
output="/var/www/infoscreen/feed.xml"

curl -u $username:$password "$url" > $output
