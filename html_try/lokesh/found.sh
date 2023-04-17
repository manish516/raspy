#!/bin/bash
if grep -q "ip_address" "/etc/dhcpcd.conf" 
then
        echo 1 
else
        echo 0
fi
