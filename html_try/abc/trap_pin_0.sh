#!/bin/bash
loop_limit=32 # number of loop 
limit_low=15 
limit_high=20 
limit_relay=14
receiver_ip=$(</etc/init.d/trap_pin.conf) 
rm_pin1=8
rm_pin2=9


for((i=0;i<$loop_limit;i++))
 do
	if [ "$i" -lt "$limit_low" ] || [ "$i" -gt "$limit_high" ] && [ "$i" -ne "$rm_pin1" ] && [ "$i" -ne "$rm_pin2" ] #condition for gpio from 0-14 & 21-29
		then
		
               		if [ "$i" -lt "$limit_relay" ]
               		then
echo $i
gpio mode $i out
			gpio write $i 1
			sleep 2
			fi
		G_val[$i]=$(gpio read $i) #read gpio pin and write them in array
	fi

if [ "$i" -eq "$limit_relay" ]
then
echo $i 
gpio mode 14 input
gpio mode 14 up
fi
 if [ "$i" -gt "$limit_high" ]
then
echo $i
gpio mode $i input
gpio mode $i up
fi

 done




val=0
k=0
while true
 do
	for((j=0;j<$loop_limit;j++))
	do
		if [ "$j" -lt "$limit_low" ] || [ "$j" -gt "$limit_high" ] && [ "$j" -ne "$rm_pin1" ] && [ "$j" -ne "$rm_pin2" ] #condition for gpio from 0-14 & 21-29
		then
	 	k=$((1+$k))
		G_val_next[$j]=$(gpio read $j) 
#echo $j  $k
			if [ "${G_val[$j]}" -ne "${G_val_next[$j]}" ] # condition for value change
        			then

#k=$((1+$k))
#printf "%d\n" $k
               			if [ "${G_val_next[j]}" -eq "$val" ]
                        		then
#k=$((1+$j)) printf "%d\n" $k
#echo $receiver_ip
#echo $j $k
                       		sudo snmptrap -v 1 -c public $receiver_ip .1.3.6.1.4.1.1234.1.$k localhost 6 0 '' # send trap if value change to 0
                	else 
#echo $receiver_ip
#echo $j $k
                       		sudo snmptrap -v 1 -c public $receiver_ip .1.3.6.1.4.1.1234.1.$k localhost 6 1 '' # send trap if value change to 1
                		fi
        		G_val[$j]=${G_val_next[j]} #set the G_val value to changed value
			fi
		fi 
	done 
	k=0 
done 
exit 0
