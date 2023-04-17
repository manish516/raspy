#!/bin/bash



gpio -x mcp23017:100:0x20:1 mode 105 in


prev_gpio_val=$(gpio -x mcp23017:100:0x20:1 read 105)

while true
do





    gpio_val=$(gpio -x mcp23017:100:0x20:1 read 105)
    if [[ "${gpio_val}" -ne "${prev_gpio_val}" ]]
    then
        
        prev_gpio_val=${gpio_val}

    fi

    echo "now gpio_val is $gpio_val"

    

done

exit 0


