#!/bin/bash
cd /var/www/infoscreen
git remote update;

check_remote=`git diff master origin/master | wc -l | sed -e 's/^[ \t]*//'`

if [[ $check_remote > 0 ]] ;then
sudo -u www-data git pull
sudo -u pi /var/www/infoscreen/refresh.sh
fi
