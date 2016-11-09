#!/usr/bin/env python
import sys
import os
import subprocess
import random
#import win32clipboard

DefAccountFormat = 'user%03d'
DefPasswordLength = 4

PasswordCharacterList = [
#    'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
#    'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
#    '2', '3', '4', '5', '6', '7', '8', '9',
    '0','1','2', '3', '4', '5', '6', '7', '8', '9',
]

createAccountCommand = '''
    useradd {0} -g users;
    cp -rf /root/workshop/www /home/{0}/www;
    chmod -R 711 /home/{0}/;
    chmod -R 755 /home/{0}/www/;
    chown -R {0}:apache /home/{0}/;
'''

def genRandomPassword():
    pwd_len = DefPasswordLength
    if (len(sys.argv) > 1):
        pwd_len = int(sys.argv[1])

    pwd = PasswordCharacterList

    random.seed()
    random.shuffle(pwd)
    pwdstr = "".join(pwd[0:pwd_len])

    return pwdstr
# End of genRandomPassword()

def main():
    counts = raw_input('How many accounts to generate: ');
    counts = int(counts)
    if (counts <= 0):
        print 'Invalid number.'
        return 1

    start = raw_input('The first index [1]: ');
    if (len(start)==0):
        start = 1;
    format = raw_input('The account format [%s]: ' % DefAccountFormat);
    if (len(format)==0):
        format = DefAccountFormat
    create = raw_input('Create account (Y) or just change password (N) [N]?');
    if (len(create)==0):
        create = 'Y'

    with open('accounts.txt', 'w+') as accounts_fd:
        for i in range(start, start+counts):
            account = format % i
            pwd = genRandomPassword()
            if (create == 'Y'):
                cmd = createAccountCommand.format(account)
                os.system(cmd)

            print >> accounts_fd, '{0}:{1}'.format(account, pwd)

    # Batch change password
    with open('accounts.txt', 'r') as accounts_fd:
        subprocess.call('chpasswd', stdin=accounts_fd)

    return 0
# End of main

if __name__ == '__main__':
    main()

