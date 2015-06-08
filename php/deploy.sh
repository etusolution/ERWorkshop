#!/bin/bash
scp etu/* root@ec2-54-151-252-204.ap-southeast-1.compute.amazonaws.com:/usr/share/php/
scp client_solution/* jacob@ec2-54-151-252-204.ap-southeast-1.compute.amazonaws.com:~/www/
scp -r public/* root@ec2-54-151-252-204.ap-southeast-1.compute.amazonaws.com:/var/www/html