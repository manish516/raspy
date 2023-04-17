import RPi.GPIO as gpio 
import smbus 
import time
import sys
import struct

# for RPI version 1, use "bus = smbus.SMBus(0)"
bus = smbus.SMBus(1)

# This is the address we setup in the Arduino Program
address = 0x04 

def get_data():
    return bus.read_i2c_block_data(address, 0); 
def get_float(data, index):
    bytes = data[4*index:(index+1)*4]
    return struct.unpack('f', "".join(map(chr, bytes)))[0] 

data = get_data()
hum="{0:.2f}".format(get_float(data, 0))
temp="{0:.2f}".format(get_float(data, 1))
volt="{0:.2f}".format(get_float(data, 2))
curr="{0:.2f}".format(get_float(data, 3))
print "%s" % hum
print "hum ","%s" %hum 
print "temp ","%s" % temp
print "volt ","%s" % volt
print "curr ","%s" % curr
#print get_float(data, 2)
#print get_float(data, 3)
