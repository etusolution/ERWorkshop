echo off
setlocal

set SCP=winscp.com
set ERDEMO_HOST=workshop.eronline.etunexus.com
set ERDEMO_HOSTKEY=ssh-rsa 2048 fa:1f:9a:3e:de:00:a3:63:11:47:eb:cd:25:99:75:b4
set ERDEMO_USER=
set ERDEMO_PWD=
set ERDEMO_OPT=

set CURDIR=cd

:main
call :showMenu
if errorlevel 1 goto :eof
goto :main


:download
call :promptLogin
if exist "./www" (
	rmdir /s /q "./www"
)
mkdir "./www"

echo.Downloading the source code into ".\www"...
%SCP% /command "open scp://%ERDEMO_USER%@%ERDEMO_HOST% -hostkey=""%ERDEMO_HOSTKEY%""" "lcd %CD%" "synchronize local -transfer=binary www\ ./www" "exit"
if errorlevel 1 (
    echo.!!! Failed to download the source code.
    exit /b %errorlevel%
)
echo.Download completed.
goto :eof

:upload
call :promptLogin
if not exist ".\www" (
	echo.No ".\www" folder exist. Please check your source code in the folder.
	exit /b 1
)

echo.Uploading the source code...
%SCP% /command "open scp://%ERDEMO_USER%@%ERDEMO_HOST% -hostkey=""%ERDEMO_HOSTKEY%""" "lcd %CD%" "synchronize remote -transfer=binary www\ ./www" "exit"
if errorlevel 1 (
    echo.!!! Failed to upload the source code.
    exit /b %errorlevel%
)
echo.Upload completed.
goto :eof

:promptLogin
if "x%ERDEMO_USER%"=="x" (
	echo.
	echo.Login to Etu Recommender Workshop Demo
	set /p ERDEMO_USER=User name: 
	echo.
)
goto :eof

:showMenu
cls

echo.==============================================================
echo.            Etu Recommender Workshop Demo                     
echo.==============================================================

echo.D)ownload : Download the demo page
echo.U)pload   : Upload the demo page
echo.E)xit     : Exit
set /p ERDEMO_OPT=What do you want to do: 

if "%ERDEMO_OPT%"=="D" (
	call :download
	pause
) else if "%ERDEMO_OPT%"=="U" (
	call :upload
	pause
) else if "%ERDEMO_OPT%"=="E" (
	echo.
	exit /b 1
)
goto :eof
