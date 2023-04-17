#!/bin/bash
gw=$(route -n |grep eth0|grep UG|awk '{print $2}')
#gw=$(route -n |grep eth0|grep -v UG|awk '{print $1}')
echo "$gw"
exit 0
