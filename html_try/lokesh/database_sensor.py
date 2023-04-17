#!/usr/bin/python
import RPi.GPIO as gpio
import smbus
import sys
import struct
import MySQLdb
import datetime
import time
from subprocess import call
# Open database connection
#time.sleep(30)
while True:

	try:
# for RPI version 1, use "bus = smbus.SMBus(0)"
		bus = smbus.SMBus(1)

# This is the address we setup in the Arduino Program
		address = 0x04

		def get_data():
	  	  return bus.read_i2c_block_data(address, 0);
		def get_float(data, index):
	    	  bytes = data[4*index:(index+1)*4]
	    	  return struct.unpack('f', "".join(map(chr, bytes)))[0]
		file = open("/var/www/html/lokesh/hum.txt","w")
		file1 = open("/var/www/html/lokesh/temp.txt","w")
		file2 = open("/var/www/html/lokesh/volt.txt","w")
		file3 = open("/var/www/html/lokesh/curr.txt","w")

		data = get_data()
		hum="{0:.2f}".format(get_float(data, 0))
		temp="{0:.2f}".format(get_float(data, 1))
		volt=float("{0:.2f}".format(get_float(data, 2)))
		curr=float("{0:.2f}".format(get_float(data, 3)))
		file.write("%s" % hum)
		file1.write("%s" % temp)
		file2.write("%s" % volt)
		file3.write("%s" % curr)
		file.close()
		file1.close()
		file2.close()
		file3.close()
	except:
		print "next try"






	db = MySQLdb.connect("localhost","username","password","log" )

# prepare a cursor object using cursor() method
	cursor = db.cursor()

# Prepare SQL query to INSERT a record into the database.
	
	now = datetime.datetime.now()
	date_db=now.strftime("%Y-%m-%d")
	time_db=now.strftime("%H:%M:%S:")
	#curr=call(["python", "/var/www/html/lokesh/sensor.py","|grep"," hum"])

	try:
		print "%s" % date_db
		print "%s" % time_db
		print "%s" % curr
		print "%s" % volt
	except:
		volt=0
		curr=0


	sql = "INSERT INTO log VALUES ('%s', '%s', '%s', '%s' )" % (date_db, time_db, curr, volt)
	try:
		#if curr != 0
	# Execute the SQL command
			cursor.execute(sql)
	# Commit your changes in the database
			db.commit()
		#else
		#	print "data is zero no mysql feed"
	except:
	# Rollback in case there is any error
		db.rollback()
	time.sleep(5)
	# disconnect from server
	db.close()
