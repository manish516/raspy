#!/bin/bash


a=0


for i in {115..100}
do
    if ((i>=112))
    then
        gpio -x mcp23017:100:0x20:1 mode $i out
        gpio -x mcp23017:100:0x20:1 write $i 0
        prev_gpio_val[$a]=$(gpio -x mcp23017:100:0x20:1 read $i)
    fi

    if((i<112))
    then

        gpio -x mcp23017:100:0x20:1 mode $i in

        prev_gpio_val[$a]=$(gpio -x mcp23017:100:0x20:1 read $i)
    fi

    a=$(($a+1))
done

#=========================================

a=0
val=0


while true
do


        for i in {100..111}
        do



            gpio_val[$a]=$(gpio -x mcp23017:100:0x20:1 read $i)
            #echo $a
            if [[ "${gpio_val[$a]}" -ne "${prev_gpio_val[$a]}" ]]
            then
                
                prev_gpio_val[$a]=${gpio_val[$a]}
                #echo prev_gpio_val[$j]

            fi

            

            a=$(($a+1))
        done
    a=0
done

exit 0
