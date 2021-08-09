#!/bin/bash

bold=$(tput bold)
normal=$(tput sgr0)

function run_mysql() {
    systemctl start mysql
}

function run_local_server() {
    cd ~/Documents/Cleobnb/
    read -p "🚀 Dev Server Port(default ${bold}8080${normal}): " PORT
    [ -z $PORT ] && PORT=8080
    clear
    php -S 0.0.0.0:$PORT
}

function check_database_server() {
    MYSQL_STATUS=$(systemctl is-active mysql)
    [ $MYSQL_STATUS = "inactive" ] && run_mysql
}

function check_firefox() {
    FIREFOX_STATUS=$(ps -e | grep "firefox") || FIREFOX_STATUS=""
    [ -z $FIREFOX_STATUS ] && firefox --new-window localhost:8080 &
}

# Check MySQL Database Server Service
check_database_server

# Run Firefox
# check_firefox

# Run PHP Development Server
run_local_server