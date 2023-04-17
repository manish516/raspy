#!/usr/bin/python
import sys
import Adafruit_DHT
humidity, temperature = Adafruit_DHT.read_retry(11, 4)
while True:
   file = open("hum.txt","a")
   file.truncate(0)
   file.write(str(humidity) + '\n')
   file.close()
else:
   file = open("hum.txt","a")
   file.truncate(0)
   file.write("NAN" '\n')
   file.close()
