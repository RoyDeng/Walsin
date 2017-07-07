import RPi.GPIO as GPIO
import MFRC522
import signal
import urllib
import urllib2
import sys
import Adafruit_DHT

continue_reading = True

def end_read(signal,frame):
    global continue_reading
    print "Ctrl+C captured, ending read."
    continue_reading = False
    GPIO.cleanup()

signal.signal(signal.SIGINT, end_read)

MIFAREReader = MFRC522.MFRC522()

print "開始掃描!"
print "Press Ctrl-C to stop."

while continue_reading:
    humidity, temperature = Adafruit_DHT.read_retry(Adafruit_DHT.DHT22, 22)
    temp = {}
    temp['w_id'] = '1'
    temp['temp'] = '{0:0.1f}'.format(temperature)
    link_values = urllib.urlencode(temp)
    print link_values
    link = 'http://cycusa.sytes.net/updateparm'
    full_link = link + "?" + link_values
    temp = urllib2.urlopen(full_link)

    (status,TagType) = MIFAREReader.MFRC522_Request(MIFAREReader.PICC_REQIDL)

    if status == MIFAREReader.MI_OK:
        print "偵測到RFID!"
    
    (status,uid) = MIFAREReader.MFRC522_Anticoll()

    if status == MIFAREReader.MI_OK:
        data = {}
        data['o_id'] = str(uid[0])+str(uid[1])+str(uid[2])+str(uid[3])
        data['w_id'] = '1'

        url_values = urllib.urlencode(data)
        print url_values

        url = 'http://cycusa.sytes.net/update'
        full_url = url + "?" + url_values

        data = urllib2.urlopen(full_url)