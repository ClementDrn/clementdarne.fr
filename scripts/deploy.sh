#!/usr/bin/env bash

SCRIPT_DIR=$( cd -- "$( dirname -- "${BASH_SOURCE[0]}" )" &> /dev/null && pwd )
HOME_DIR="$SCRIPT_DIR/.."

ASCII_RED="\033[1;31m"
ASCII_ORANGE="\033[1;33m"
ASCCI_GREEN="\033[1;32m"
ASCII_RESET="\033[0m"

# Check that postcss package is installed
if ! command -v npx postcss &> /dev/null
then
    echo -e "${ASCII_RED}ERROR: PostCSS is not installed. Run 'npm install postcss-cli' to install PostCSS.${ASCII_RESET}"
    exit
fi

# Compile CSS files with following plugins:
# - postcss-easing-gradients: Add easing gradients to CSS
npx postcss ${HOME_DIR}/src/assets/css/ --dir ${HOME_DIR}/public/assets/css/ \
    -u postcss-easing-gradients
