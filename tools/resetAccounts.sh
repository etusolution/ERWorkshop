#!/bin/bash

cd /home
for accounts in `ls -d user*`; do
	accountwww=/home/$accounts/www
	if [ -d $account_www ]; then
		echo 'Reset' $accountwww
		rm -rf $accountwww
	fi
	cp -rf /root/workshop/www $accountwww
	chown -R $accounts $accountwww
done
