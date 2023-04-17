#!/usr/bin/python

import MySQLdb

# Open database connection
db = MySQLdb.connect("localhost","username","password","log" )

# prepare a cursor object using cursor() method
cursor = db.cursor()

# execute SQL query using execute() method.
sql="select * from log where log_time>120000 && log_time<170000;"

try:
   # Execute the SQL command
   cursor.execute(sql)
   # Fetch all the rows in a list of lists.
   results = cursor.fetchall()
   for row in results:
      date = row[0]
      time = row[1]
      current = row[2]
      voltage = row[3]
      # Now print fetched result
      print "%s,%s,%0.2f,%0.2f" %  (date, time, current, voltage)
except:
   print "Error: unable to fecth data"

# disconnect from server
db.close()
