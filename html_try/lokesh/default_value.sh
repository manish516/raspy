#!/bin/bash



 echo "hostname">/etc/dhcpcd.conf

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
