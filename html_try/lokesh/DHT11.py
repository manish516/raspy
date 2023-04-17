#!/usr/bin/python
import sys
import Adafruit_DHT
while True:

   humidity, temperature = Adafruit_DHT.read_retry(11, 4)

   file = open("hum1.txt","a")
   file.truncate(0)
   file.write(str(temperature) + ', ' + str(humidity) + '\n')
   file.close()
