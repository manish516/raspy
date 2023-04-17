PS3="Please select an option: "

options=("read_all_GIPO_stauts" "B0" "B1" "B2" "B3" "B4" "B5" "B6" "B7" "B5-B7_1-withDelay--LNB-1-turn-ON" "B4-B6_1-withDelay--LNB-2-turn-ON" "A7-A5-A4_0-0-1_LNB-1-ON" "A7-A5-A4_1-1-0_LNB-2-ON" "A6_0_LNB-2-ON" "A6_1_LNB-2-OFF_fault" "Quit")

select choice in "${options[@]}"
do
    case $choice in
        "read_all_GIPO_stauts")
            echo "You selected Option 1 --> GIPO_pin_status are: "

            A0=$(eval "gpio -x mcp23017:100:0x20:1 read 100")
            A1=$(eval "gpio -x mcp23017:100:0x20:1 read 101")
            A2=$(eval "gpio -x mcp23017:100:0x20:1 read 102")
            A3=$(eval "gpio -x mcp23017:100:0x20:1 read 103")
            A4=$(eval "gpio -x mcp23017:100:0x20:1 read 104")
            A5=$(eval "gpio -x mcp23017:100:0x20:1 read 105")
            A6=$(eval "gpio -x mcp23017:100:0x20:1 read 106")
            A7=$(eval "gpio -x mcp23017:100:0x20:1 read 107")
            B0=$(eval "gpio -x mcp23017:100:0x20:1 read 108")
            B1=$(eval "gpio -x mcp23017:100:0x20:1 read 109")
            B2=$(eval "gpio -x mcp23017:100:0x20:1 read 110")
            B3=$(eval "gpio -x mcp23017:100:0x20:1 read 111")
            B4=$(eval "gpio -x mcp23017:100:0x20:1 read 112")
            B5=$(eval "gpio -x mcp23017:100:0x20:1 read 113")
            B6=$(eval "gpio -x mcp23017:100:0x20:1 read 114")
            B7=$(eval "gpio -x mcp23017:100:0x20:1 read 115")

            echo "The result of A0 is: $A0"
            echo "The result of A1 is: $A1"
            echo "The result of A2 is: $A2"
            echo "The result of A3 is: $A3"
            echo "The result of A4 is: $A4"
            echo "The result of A5 is: $A5"
            echo "The result of A6 is: $A6"
            echo "The result of A7 is: $A7"
            echo "The result of B0 is: $B0"
            echo "The result of B1 is: $B1"
            echo "The result of B2 is: $B2"
            echo "The result of B3 is: $B3"
            echo "The result of B4 is: $B4"
            echo "The result of B5 is: $B5"
            echo "The result of B6 is: $B6"
            echo "The result of B7 is: $B7"

            # Add code to execute for Option 1 here

            ;;
        "B0")

            #gpio -x mcp23017:100:0x20:1 write 108 1
            echo "The result of B0 is Turn-ON=1 no-delay"

            ;;
        "B1")

            #gpio -x mcp23017:100:0x20:1 write 109 1
            echo "The result of B0 is Turn-ON=1 no-delay"
            ;;
        "B2")

            #gpio -x mcp23017:100:0x20:1 write 110 1
            echo "The result of B0 is Turn-ON=1 no-delay"
            ;;
        "B3")

            #gpio -x mcp23017:100:0x20:1 write 111 1
            echo "The result of B0 is Turn-ON=1 no-delay"
            ;;
        "B4")

            #gpio -x mcp23017:100:0x20:1 write 112 1
            echo "The result of B0 is Turn-ON=1 no-delay"
            ;;
        "B5")

            #gpio -x mcp23017:100:0x20:1 write 113 1
            echo "The result of B0 is Turn-ON=1 no-delay"
            ;;
        "B6")

            #gpio -x mcp23017:100:0x20:1 write 114 1
            echo "The result of B0 is Turn-ON=1 no-delay"
            ;;
        "B7")

            #gpio -x mcp23017:100:0x20:1 write 115 1
            echo "The result of B0 is Turn-ON=1 no-delay"
            ;;
        "B5-B7_1-withDelay--LNB-1-turn-ON")

            #gpio -x mcp23017:100:0x20:1 write 113 1
            #sleep 0.2
            #gpio -x mcp23017:100:0x20:1 write 113 0
            #gpio -x mcp23017:100:0x20:1 write 115 1
            #sleep 0.2
            #gpio -x mcp23017:100:0x20:1 write 115 0
            echo "The result of B5-B7_1 is Turn-ON=1 with-delay"
            ;;
        "B4-B6_1-withDelay--LNB-2-turn-ON")

            #gpio -x mcp23017:100:0x20:1 write 112 1
            #sleep 0.2
            #gpio -x mcp23017:100:0x20:1 write 112 0
            #gpio -x mcp23017:100:0x20:1 write 114 1
            #sleep 0.2
            #gpio -x mcp23017:100:0x20:1 write 114 0
            echo "The result of B0 is Turn-ON=1 with-delay"
            ;; 

        "A7-A5-A4_0-0-1_LNB-1-ON")

            #gpio -x mcp23017:100:0x20:1 write 107 0
            #gpio -x mcp23017:100:0x20:1 write 105 0
            #gpio -x mcp23017:100:0x20:1 write 104 1
            echo "The result of A7-A5-A4_0-0-1_LNB-1-ON without-delay"
            ;;

        "A7-A5-A4_1-1-0_LNB-2-ON")

            #gpio -x mcp23017:100:0x20:1 write 107 1
            #gpio -x mcp23017:100:0x20:1 write 105 1
            #gpio -x mcp23017:100:0x20:1 write 104 0
            echo "The result of is A7-A5-A4_1-1-0_LNB-2-ON without-Delay"
            ;;


         
        "A6_0_LNB-2-ON")

            #gpio -x mcp23017:100:0x20:1 write 106 0
            echo "The result of A6_0_LNB-2-ON is without-delay"
            ;;

        "A6_1_LNB-2-OFF_fault")

            #gpio -x mcp23017:100:0x20:1 write 106 1
            echo "The result of is A6_1_LNB-2-OFF_fault without-Delay"
            ;;

        "Quit")
            echo "Exiting script..."
            break
            ;;
        *) 
            echo "Invalid option, please select again."
            ;;
    esac
done
