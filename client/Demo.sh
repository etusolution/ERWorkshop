#!/bin/bash

SCPBIN=`which scp`
if [ "x$SCPBIN" == "x" ]; then
	echo "Cannot find SCP. Please install it before proceeding."
	exit 1
fi

ERDEMO_HOST=ec2-54-151-252-204.ap-southeast-1.compute.amazonaws.com
ERDEMO_USER=
ERDEMO_OPT=E

function pause {
	read -n1 -p "Press any key to continue..."
}

function download {
	promptLogin
	if [ -d ./www ]; then
		rm -rf ./www
	fi

	echo "Downloading the source code into \"./www\"..."
	echo $ERDEMO | scp -r $ERDEMO_USER@$ERDEMO_HOST:/home/$ERDEMO_USER/www ./
	STATUS=$?
	if [ $STATUS -ne 0 ]; then
	    echo "!!! Failed to download the source code."
	    return $STATUS
	fi
	echo "Download completed."
}

function upload {
	promptLogin
	if [ ! -d ./www ]; then
		echo "No ./www folder exist. Please check your source code in the folder."
		return 1
	fi

	echo "Uploading the source code..."
	scp -r ./www $ERDEMO_USER@$ERDEMO_HOST:/home/$ERDEMO_USER/
	STATUS=$?
	if [ $STATUS -ne 0 ]; then
	    echo "!!! Failed to upload the source code."
	    return $STATUS
	fi
	echo "Upload completed."
}

function promptLogin {
	if [ "x$ERDEMO_USER" == "x" ]; then
		echo
		echo "Login to Etu Recommender Workshop Demo"
		read -p "User name: " -e ERDEMO_USER
		echo
	fi
}

function showMenu {
	clear

	echo "=============================================================="
	echo "            Etu Recommender Workshop Demo                     "
	echo "=============================================================="

	echo D\)ownload : Download the demo page
	echo U\)pload   : Upload the demo page
	echo E\)xit     : Exit
	read -p "What do you want to do: " -e ERDEMO_OPT

	case $ERDEMO_OPT in
		D|d)
			download
			pause
			;;
		U|u)
			upload
			pause
			;;
		E|e)
			echo
			exit 0;
			;;
	esac
}

while [ 1 ]; do
	showMenu
done


