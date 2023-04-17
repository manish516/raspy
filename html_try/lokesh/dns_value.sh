#!/bin/bash
ip=$(cat /etc/resolv.conf|grep nameserver|awk '{print $2}'|awk '{print $NR}') 

if [[ !($ip =~ .*:.*) ]] 
then 
echo $ip 
fi

exit 0
