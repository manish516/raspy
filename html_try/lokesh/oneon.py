from smbus import SMBus

addr = 0x08 # bus address
bus = SMBus(1) # indicates /dev/ic2-1

bus.write_byte(addr, 0x1) # switch it on
