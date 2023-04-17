#!/bin/bash
mask2cdr () 
{
   local mask=$1

   # In RFC 4632 netmasks there's no "255." after a non-255 byte in the  mask
   local left_stripped_mask=${mask##*255.}
   local len_mask=${#mask}
   local len_left_stripped_mask=${#left_stripped_mask}

   local conversion_table=0^^^128^192^224^240^248^252^254^
   local number_of_bits_stripped=$(( ($len_mask - $len_left_stripped_mask)*2 ))
   local signifacant_octet=${left_stripped_mask%%.*}

   local right_stripped_conversion_table=${conversion_table%%$signifacant_octet*}
   local len_right_stripped_conversion_table=${#right_stripped_conversion_table}
   local number_of_bits_from_conversion_table=$((len_right_stripped_conversion_table/4))
   return $(( $number_of_bits_stripped + $number_of_bits_from_conversion_table ))
}



mask2cdr $@


val=0

 if [ "$1" == "$val" ]
 then
 ip=$(/sbin/ifconfig eth0 |grep -v inet6| grep "inet"|awk '{printf $2}')
else
 ip=$1
 fi


 if [ "$2" == "$val" ]
 then
 sub=$(ifconfig eth0 |grep -v inet6|grep 'inet'|awk '{print $4}')
 else
 sub=$2
 fi

 gate=$3

 domain=$4

 mask2cdr $sub
 subnetCIDR=$?

 echo $ip
 echo $sub
 echo $gate
 echo $domain 
 echo $subnetCIDR
# exec sudo ifconfig eth0 "$1" 
#$location=/var/www/html/lokesh/test/dhcpcd.conf 
# sed -i '/ip_address/s/=.*/='$1'/' /var/www/html/lokesh/test/dhcpcd.conf

echo "interface eth0">/etc/dhcpcd.conf 
echo "static ip_address=$ip/$subnetCIDR">>/etc/dhcpcd.conf

 if [ "$3" != "$val" ]
 then
 echo abc
 echo "static routers="$gate>>/etc/dhcpcd.conf
 fi

 if [ "$4" != "$val" ]
 then
 echo xyz
 echo "static domain_name_servers="$domain>>/etc/dhcpcd.conf
 fi




 echo "hostname">>/etc/dhcpcd.conf

 echo "clientid">>/etc/dhcpcd.conf

 echo "persistent">>/etc/dhcpcd.conf

 echo "option rapid_commit">>/etc/dhcpcd.conf

 echo "option domain_name_servers, domain_name, domain_search, host_name">>/etc/dhcpcd.conf

 echo "option classless_static_routes">>/etc/dhcpcd.conf

 echo "option ntp_servers">>/etc/dhcpcd.conf

 echo "option interface_mtu">>/etc/dhcpcd.conf

 echo "require dhcp_server_identifier">>/etc/dhcpcd.conf

 echo "slaac private">>/etc/dhcpcd.conf 

sudo reboot

 exit 0
