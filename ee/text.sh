#!/bin/bash

A0=$(eval "gpio -x mcp23017:100:0x20:1 write 100 1")
A1=$(eval "gpio -x mcp23017:100:0x20:1 write 101 1")
A2=$(eval "gpio -x mcp23017:100:0x20:1 write 102 1")
A3=$(eval "gpio -x mcp23017:100:0x20:1 write 103 1")
A4=$(eval "gpio -x mcp23017:100:0x20:1 write 104 1")
A5=$(eval "gpio -x mcp23017:100:0x20:1 write 105 1")
A6=$(eval "gpio -x mcp23017:100:0x20:1 write 106 1")
A7=$(eval "gpio -x mcp23017:100:0x20:1 write 107 1")
B0=$(eval "gpio -x mcp23017:100:0x20:1 write 108 1")
B1=$(eval "gpio -x mcp23017:100:0x20:1 write 109 1")
B2=$(eval "gpio -x mcp23017:100:0x20:1 write 110 1")
B3=$(eval "gpio -x mcp23017:100:0x20:1 write 111 1")
B4=$(eval "gpio -x mcp23017:100:0x20:1 write 112 1")
B5=$(eval "gpio -x mcp23017:100:0x20:1 write 113 1")
B6=$(eval "gpio -x mcp23017:100:0x20:1 write 114 1")
B7=$(eval "gpio -x mcp23017:100:0x20:1 write 115 1")

echo "The result of A0 is Turn-ON=1 no-delay: $A0"
echo "The result of A1 is Turn-ON=1 no-delay: $A1"
echo "The result of A2 is Turn-ON=1 no-delay: $A2"
echo "The result of A3 is Turn-ON=1 no-delay: $A3"
echo "The result of A4 is Turn-ON=1 no-delay: $A4"
echo "The result of A5 is Turn-ON=1 no-delay: $A5"
echo "The result of A6 is Turn-ON=1 no-delay: $A6"
echo "The result of A7 is Turn-ON=1 no-delay: $A7"
echo "The result of B0 is Turn-ON=1 no-delay: $B0"
echo "The result of B1 is Turn-ON=1 no-delay: $B1"
echo "The result of B2 is Turn-ON=1 no-delay: $B2"
echo "The result of B3 is Turn-ON=1 no-delay: $B3"
echo "The result of B4 is Turn-ON=1 no-delay: $B4"
echo "The result of B5 is Turn-ON=1 no-delay: $B5"
echo "The result of B6 is Turn-ON=1 no-delay: $B6"
echo "The result of B7 is Turn-ON=1 no-delay: $B7"

