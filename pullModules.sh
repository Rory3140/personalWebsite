#!/bin/bash

# Navigate to the directory containing subdirectories
cd modules

# Loop through each subdirectory and perform a git pull
for dir in */; do
  if [ -d "$dir" ]; then
    echo "Updating $dir..."
    cd "$dir"
    git pull
    cd ..
  fi
done

echo "Git pull completed for all modules."

