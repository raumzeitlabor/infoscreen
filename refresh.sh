#!/bin/bash
export DISPLAY=:"0.0"
XAUTHORITY=/home/pi/.Xauthority
xdotool getactivewindow
xdotool key F5
