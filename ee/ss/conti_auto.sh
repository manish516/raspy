#!/bin/bash

/bin/bash /home/pi/ee/ss/m_set.sh

while true
do
    # Read integer value from text file
    #auto_value=$(eval "cat /home/pi/ee/ss/auto_status_value.txt")
    #manual_value=$(eval "cat /home/pi/ee/ss/manual_status_value.txt")
    val_A7=$(eval "gpio -x mcp23017:100:0x20:1 read 107")
    val_A6=$(eval "gpio -x mcp23017:100:0x20:1 read 106")
    #lnb_sel_val=$(eval "cat /home/pi/ee/ss/lnb_sel_val.txt")
    #val_A5=$(eval "gpio -x mcp23017:100:0x20:1 read 105")
    #val_A4=$(eval "gpio -x mcp23017:100:0x20:1 read 104")

    # Check integer value and execute appropriate command
    #if [ $auto_value -eq 0 ] && [ $manual_value -eq 1 ] && [ $lnb_sel_val -eq 0 ] && [ $val_A7 -eq 1 ] && [ $val_A5 -eq 0 ] && [ $val_A4 -eq 1 ]    
    #if [ $auto_value -eq 0 ] && [ $lnb_sel_val -eq 0 ] && [ $val_A7 -eq 1 ]  #auto_mode-LNB_1-fault-then-LNB_2-run    
    #if [ $auto_value -eq 0 ] && [ $val_A7 -eq 1 ]  #auto_mode-LNB_1-fault-then-LNB_2-run    
    if [ $val_A7 -eq 1 ]  #auto_mode-LNB_1-fault-then-LNB_2-run --> only when A7=1    
    #if [ $val_A7 -eq 1 ] && [ $val_A6 -eq 0 ] #auto_mode-LNB_1-fault-then-LNB_2-run --> when both A7=1, A6=0    
    then

        #auto mode-fault_Occur-LNB1_to_LNB2-ON
        gpio -x mcp23017:100:0x20:1 write 112 1 #B4 --lnb-2-ON
        gpio -x mcp23017:100:0x20:1 write 114 1 #B6 --lnb-2-ON
        sleep 2 
        gpio -x mcp23017:100:0x20:1 write 112 0
        gpio -x mcp23017:100:0x20:1 write 114 0
        
        echo 1 > /var/www/html/ee/ss/auto_status_value.txt
        echo 0 > /var/www/html/ee/ss/manual_status_value.txt

        #echo "one time run" >> ~/ty.txt
        break
    #elif [ $lnb_sel_val -eq 1 ] && [ $manual_value -eq 0 ]  
    #then
    #    echo "1" #manual mode is selected webpage indicator
    #else
    #    echo "Invalid integer value"
    fi

done
