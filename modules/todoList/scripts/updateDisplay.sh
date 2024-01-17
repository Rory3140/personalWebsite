#!/bin/bash

filename=/home/raspberrypi/programs/updateDisplay/todoList/todolist.html

firefox --headless --screenshot --window-size=800,480 file://$CWD/$filename > /dev/null 2>&1

python3 /home/raspberrypi/programs/updateDisplay/todoList/scripts/displayImage.py screenshot.png > /dev/null 2>&1

rm screenshot.png 