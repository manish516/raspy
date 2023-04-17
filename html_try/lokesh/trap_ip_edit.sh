#!/bin/bash

echo "$1">/etc/init.d/trap_pin.conf
sudo reboot

exit 0
