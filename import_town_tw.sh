#!/bin/bash
i=0
for province in `php index.php spider_tw list_all_countytown`
do
    ((i++))
    echo $i
    nohup php index.php spider_tw getlast $province &
    if (( $i%10 == 1 ));
        then 
            sleep 2
    fi 
done
