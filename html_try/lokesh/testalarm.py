#!/usr/bin/python
import sys
import Adafruit_DHT
while True:
 f = open('alarmt.txt', 'r')
 data = f.read()
 a = int(data)
 humidity, temperature = Adafruit_DHT.read_retry(11, 4)
 if temperature > a:
   file = open("alarmdata.txt","a")
   file.truncate(0)
   file.write("2" '\n')
   file.close()
 else: 
   file = open("alarmdata.txt","a")
   file.truncate(0)
   file.write("1" '\n')
   file.close()
