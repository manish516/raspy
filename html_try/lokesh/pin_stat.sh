#!/bin/bash

a=$(gpio -x mcp23017:100:0x20:1 read 100)
echo $a

