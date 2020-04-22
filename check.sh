#!/bin/bash

/usr/bin/curl -I -m 3 http://localhost:8090/health-check/testdb.php |grep HTTP |head -1 |awk '{print $2}' > test.txt
one=`cat test.txt |awk '{print $1}'`
if [[ $one == 200 ]] && [[ -s test.txt ]]
    then
        echo "0" > test1
    else
        echo "1" > test1
fi