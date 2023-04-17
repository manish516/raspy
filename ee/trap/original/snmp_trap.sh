#!/bin/bash



receiver_ip=$(</etc/init.d/trap_pin.conf)
sender_ip=$(sudo ifconfig eth0 |grep -v inet6| grep "inet"|awk '{print $2}')


a=0


for j in {0..1}
do
		for i in {115..100}
		do
			if (((j==0)||(j==1&&i>=112)))
			then
			gpio -x mcp23017:100:0x2$j:1 mode $i out
			gpio -x mcp23017:100:0x2$j:1 write $i 0
			prev_gpio_val[$a]=$(gpio -x mcp23017:100:0x2$j:1 read $i)
			fi

			if((j==1&&i<112))
			then
			break
			fi

			a=$(($a+1))
		done
done

#=========================================

a=0
val=0


while true
do


for j in {0..1}
do
                for i in {115..100}
                do



		gpio_val[$a]=$(gpio -x mcp23017:100:0x2$j:1 read $i)
#echo $a
		if [[ "${gpio_val[$a]}" -ne "${prev_gpio_val[$a]}" ]]
			then
				if [[ "${gpio_val[$a]}" -eq "$val" ]]
					then

					sudo snmptrap -v 1 -c public $receiver_ip .1.3.6.1.4.1.12345.1.2.$(($a+1)) $sender_ip 6 0 ''

				else
					sudo snmptrap -v 1 -c public $receiver_ip .1.3.6.1.4.1.12345.1.2.$(($a+1)) $sender_ip 6 1 ''

				fi

			prev_gpio_val[$a]=${gpio_val[$a]}
#echo prev_gpio_val[$j]

		fi

		if((j==1&&i<112))
                        then
                        break
                        fi


		a=$(($a+1))
	done
done
a=0
done

exit 0
