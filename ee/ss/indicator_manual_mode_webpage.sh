#!/bin/bash

#when manual mode indicator is green and auto-mode indiactor is red
rm /tmp/myscript.lock #auto mode lock file ---if excit then auto-mode-bg-script (conti_auto.sh) not run

##when manual mode indicator is green then auto-mode-bg-script get stop or kill
#sudo pkill -9 -f auto_mode_sel_default_lnb1.sh & 
#sudo pkill -9 -f conti_auto.sh &


# Read integer value from text file
auto_value=$(eval "cat /var/www/html/ee/ss/auto_status_value.txt")
manual_value=$(eval "cat /var/www/html/ee/ss/manual_status_value.txt")

# Check integer value and execute appropriate command
if [ $auto_value -eq 1 ] && [ $manual_value -eq 0 ] 
then
    echo "0" #manual mode is ON -- green selected webpage indicator
elif [ $auto_value -eq 0 ] && [ $manual_value -eq 1 ]  
then
    echo "1" #manual mode is OFF -- red selected webpage indicator
else
    echo "Invalid integer value"
fi

