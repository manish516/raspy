#!/bin/bash

# auto mode txt bit set
#echo 0 > /var/www/html/ee/ss/auto_status_value.txt
#echo 1 > /var/www/html/ee/ss/manual_status_value.txt


#-------------------

lockfile=/tmp/myscript.lock

# Check if the lock file exists
if [ -e $lockfile ]; then
  echo "Script is already running, exiting" > /dev/null
  #rm $lockfile
  exit 1

else
  #run shell file and Create the lock file
  /bin/bash /var/www/html/ee/ss/conti_auto.sh & 
  touch $lockfile

fi

##-------------------------







# bg continouses shell scrpit run
#ps -aux | grep -i auto_mode_sel_default_lnb1 > /dev/null && sudo pkill -15 -f auto_mode_sel_default_lnb1.sh > /dev/null 
#ps -aux | grep -i conti_auto > /dev/null && sudo pkill -15 -f conti_auto.sh > /dev/null
#
#sleep 2

#/bin/bash /var/www/html/ee/ss/conti_auto.sh & 
###/bin/bash /home/pi/ee/ss/conti_auto.sh & 


#auto_value=$(eval "cat /var/www/html/ee/ss/auto_status_value.txt")
#manual_value=$(eval "cat /var/www/html/ee/ss/manual_status_value.txt")
#lnb_sel_val=$(eval "cat /var/www/html/ee/ss/lnb_sel_val.txt")
#val_A7=$(eval "gpio -x mcp23017:100:0x20:1 read 107") #for lnb-1 fault check
#val_A6=$(eval "gpio -x mcp23017:100:0x20:1 read 106") #for lnb-2 fault check
#val_A5=$(eval "gpio -x mcp23017:100:0x20:1 read 105") #for lnb-1 position 0=lnb-1=ON
#val_A4=$(eval "gpio -x mcp23017:100:0x20:1 read 104") #for lnb-2 position 0=lnb-2=ON
#


#if [ $auto_value -eq 0 ] && [ $val_A7 -eq 0 ]  #auto_mode-LNB_1-Nofault-then-LNB_1-run
#then
#
#    gpio -x mcp23017:100:0x20:1 write 113 1
#    gpio -x mcp23017:100:0x20:1 write 115 1
#    sleep 2
#    gpio -x mcp23017:100:0x20:1 write 113 0
#    gpio -x mcp23017:100:0x20:1 write 115 0
#
#    echo 0 > /var/www/html/ee/ss/lnb_sel_val.txt
#
#
#    #echo "auto-mode-seleted and default LNB-1 is ON due to no-fault"
#    #elif [ $lnb_sel_val -eq 1 ] && [ $manual_value -eq 0 ]
#    #then
#    #    echo "1" #manual mode is selected webpage indicator
#    #else
#    #    echo "Invalid integer value"
#fi

