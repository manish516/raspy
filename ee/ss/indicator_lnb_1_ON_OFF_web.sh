#!/bin/bash

# Read integer value from text file
txt_val=$(eval "cat /var/www/html/ee/ss/lnb_sel_val.txt")
pin_a5_val=$(eval "bash /var/www/html/ee/ss/lnb_pin_val.sh")

# Check integer value and execute appropriate command
if [ $txt_val -eq 0 ] || [ $pin_a5_val -eq 0 ]
then
    echo "0" # lnb-1=0 is ON -- green selected webpage indicator
elif [ $txt_val -eq 1 ] || [ $pin_a5_val -eq 1 ]
then
    echo "1" # lnb-1=1 is OFF -- red selected webpage indicator
#else
    #echo "Invalid integer value"
fi
