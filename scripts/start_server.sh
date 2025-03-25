#!/usr/bin/env bash

SCRIPT_DIR=$( cd -- "$( dirname -- "${BASH_SOURCE[0]}" )" &> /dev/null && pwd )
HOME_DIR="$SCRIPT_DIR/.."

ASCII_RED="\033[1;31m"
ASCII_ORANGE="\033[1;33m"
ASCCI_GREEN="\033[1;32m"
ASCII_RESET="\033[0m"

# Check that php is installed
if ! command -v php &> /dev/null
then
    echo -e "${ASCII_RED}ERROR: PHP is not installed. Run 'sudo apt install php' to install PHP.${ASCII_RESET}"
    exit
fi

# Check if mariadb is running
systemctl is-active --quiet mariadb || 
    echo -e "${ASCII_ORANGE}WARNING: Service mariadb is not running. Run 'sudo systemctl start mariadb' to start the database server.${ASCII_RESET}"

# Lauch PHP server
echo -e "${ASCCI_GREEN}Starting PHP server on http://localhost:8000...${ASCII_RESET}"
php -S localhost:8000 -t ${HOME_DIR}/public
