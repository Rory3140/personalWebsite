#!/bin/bash

# Find the PID of the PHP script
pid=$(ps aux | grep "getHTML.php" | grep -v grep | awk '{print $2}')

if [ -z "$pid" ]; then
  echo "Update Display is not running."
else
  # Kill the process
  kill "$pid"
  echo "Update Display stopped."
fi
