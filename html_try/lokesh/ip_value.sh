#!/bin/bash
ip=$(/sbin/ifconfig eth0 |grep -v inet6| grep "inet"|awk '{printf $2}') 
echo "$ip"
exit 0
