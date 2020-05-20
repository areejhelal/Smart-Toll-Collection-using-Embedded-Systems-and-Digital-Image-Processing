import time
import serial
import RPi.GPIO as GPIO
import pygame
import pygame.camera
from pygame.locals import *
import requests
import os

GPIO.setmode(GPIO.BOARD)
GPIO.setup(8,GPIO.IN)
DEVICE = '/dev/video0'
SIZE = (640, 480)
FILENAME = 'capture.jpg'

ser=serial.Serial("/dev/ttyACM0",9600)  #change ACM number as found from ls /dev/tty/ACM*
ser.baudrate=9600
def blink(pin):
    GPIO.output(pin,GPIO.HIGH)
    time.sleep(1)
    GPIO.output(pin,GPIO.LOW)
    time.sleep(1)
    return
GPIO.setmode(GPIO.BOARD)
GPIO.setup(11, GPIO.OUT)

pygame.init()
pygame.camera.init()
camera = pygame.camera.Camera(pygame.camera.list_cameras()[0])
camera.start()

while (True) :
    try:
        read_ser=ser.readline()

        if("Hello" in read_ser):
            print("hiiiii")
            url = "http://192.168.1.150/send.php"
            d = dict()
            d['message'] = "2"

            r = requests.post(url, data=d)
            print (r.text)

        PIR= GPIO.input(8)
        if(PIR == 1):
            print("there's a motion")
            img = camera.get_image()
            pygame.image.save(img, FILENAME)
            url = 'http://192.168.1.150/ProjectCode.php'
            files = {'image': open('capture.jpg', 'rb')}
            try:
                pass
                response= requests.post(url, files=files , timeout=60)
                print response
            except Exception as e :
                print 'Error: {}'.format(e)
                print 'timeout error'
        #time.sleep(0.5)
    except Exception as e:
        print("ERROR!", e)

camera.stop()
