#!/bin/bash

sub=$(ifconfig eth0 |grep -v inet6|grep 'inet'|awk '{print $4}') 

echo "$sub"
exit 0
