#!/bin/bash

a=0

for i in {100..111}
do
    gpio -x mcp23017:100:0x20:1 mode $i in
    prev_gpio_val[$a]=$(gpio -x mcp23017:100:0x20:1 read $i)

    a=$(($a+1))

done

a=0

while true
do

    for i in {100..111}
    do

        gpio_val[$a]=$(gpio -x mcp23017:100:0x20:1 read $i)

        a=$(($a+1))

    done




    if [[ "${gpio_val[$a]}" -ne "${prev_gpio_val[$a]}" ]]
    then
        
        prev_gpio_val[$a]=${gpio_val[$a]}

    fi

    echo "now gpio_val is ${gpio_val[$a]}"

    

done

exit 0


