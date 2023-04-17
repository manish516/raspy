# manual mode txt bit set
#echo 1 > /var/www/html/ee/ss/auto_status_value.txt
#echo 0 > /var/www/html/ee/ss/manual_status_value.txt

sudo pkill -9 -f auto_mode_sel_default_lnb1.sh & 
sudo pkill -9 -f conti_auto.sh &
rm /tmp/myscript.lock

/bin/bash /home/pi/ee/ss/m_set.sh

auto_value=$(eval "cat /var/www/html/ee/ss/auto_status_value.txt")
manual_value=$(eval "cat /var/www/html/ee/ss/manual_status_value.txt")
#conti_sh_value=$(eval "cat /var/www/html/ee/ss/conti_txt_var.txt")
#lnb_sel_val=$(eval "cat /var/www/html/ee/ss/lnb_sel_val.txt")
#val_A7=$(eval "gpio -x mcp23017:100:0x20:1 read 107") #for lnb-1 fault check
#val_A6=$(eval "gpio -x mcp23017:100:0x20:1 read 106") #for lnb-2 fault check
#val_A5=$(eval "gpio -x mcp23017:100:0x20:1 read 105") #for lnb-1 position 0=lnd-1=ON
#val_A4=$(eval "gpio -x mcp23017:100:0x20:1 read 104") #for lnb-2 position 0=lnd-2=ON


#if [ $manual_value -eq 0 ] && [ $val_A7 -eq 0 ] && [ $lnb_sel_val -eq 1 ]   #manual_mode--Nofault-LNB_1-turn-ON
if [ $manual_value -eq 0 ]  #fault (A7-A6) checking only for Auto-mode
then

    gpio -x mcp23017:100:0x20:1 write 113 1 #B5
    gpio -x mcp23017:100:0x20:1 write 115 1 #B7
    sleep 2
    gpio -x mcp23017:100:0x20:1 write 113 0
    gpio -x mcp23017:100:0x20:1 write 115 0

    #elif [ $lnb_sel_val -eq 1 ] && [ $manual_value -eq 0 ]
    #then
    #    echo "1" #manual mode is selected webpage indicator
    #else
    #    echo "Invalid integer value"
fi

