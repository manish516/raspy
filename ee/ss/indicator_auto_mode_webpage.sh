#!/bin/bash

# Read integer value from text file
auto_value=$(eval "cat /var/www/html/ee/ss/auto_status_value.txt")
manual_value=$(eval "cat /var/www/html/ee/ss/manual_status_value.txt")

# Check integer value and execute appropriate command
if [ $auto_value -eq 0 ] && [ $manual_value -eq 1 ] 
then
    echo "0" #auto mode is ON -- green selected webpage indicator
elif [ $auto_value -eq 1 ] && [ $manual_value -eq 0 ]  
then
    echo "1" #auto mode is OFF -- red selected webpage indicator
#else
    #echo "Invalid integer value"
fi

