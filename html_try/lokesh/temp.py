
#!/usr/bin/python
import sys
import Adafruit_DHT
humidity, temperature = Adafruit_DHT.read_retry(11, 4)
while True:
   file = open("temp.txt","a")
   file.truncate(0)
   file.write(str(temperature) + '\n')
   file.close()
else:
   file = open("temp.txt","a")
   file.truncate(0)
   file.write("NAN" '\n')
   file.close()

