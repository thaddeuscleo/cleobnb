#!/bin/bash

bold=$(tput bold)
normal=$(tput sgr0)

# CHECK Database Server
check_database_server

read -p "Input SQL Filename(default ${bold}create_db${normal}): " FILENAME
read -p "Input Directory name(default ${bold}db${normal}): " DIRECTORY

function get_database_name() {
    while true; do
        echo -n "Your Database Name: "
        read dbname
        if [[ "$dbname"  != "" ]]
        then
            break
        fi
    done
}

function get_user() {
    while true; do
        echo -n "Username: "
        read user
        if [[ "$user"  != "" ]]
        then
            break
        fi
    done
}

function check_database_server() {
    MYSQL_STATUS=$(systemctl is-active mysql)
    [ $MYSQL_STATUS = "inactive" ] && run_mysql
}

function run_mysql() {
    systemctl start mysql
}

get_user
get_database_name

[ -z $FILENAME ] && FILENAME="cleobnb_create"
[ -z $DIRECTORY ] && DIRECTORY="db"

mysqldump -u $user -p $dbname --default-character-set=utf8 > $(pwd)/$DIRECTORY/$FILENAME.sql
