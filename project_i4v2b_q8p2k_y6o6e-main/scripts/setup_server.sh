#!/bin/bash

# WARNING!: This script will overwrite all files in the public_html directory.

# make public_html directory if it does not exist
mkdir -p ~/public_html

# copy all files
yes | cp -a ./src/server/. ~/public_html/
yes | cp -a ./src/client/. ~/public_html/

# change permissions
chmod 711 ~/public_html
chmod -R 711 ~/public_html

chmod 755 ~/public_html/background-image.jpg
