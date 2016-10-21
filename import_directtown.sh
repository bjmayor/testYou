#!/bin/bash
i=0
for province in `php index.php spider2 list_all_directtown`
do
    ((i++))
    echo $i
    nohup php index.php spider2 getlast $province &
    if (( $i%10 == 1 ));
        then 
            sleep 2
    fi 
done
