#!/bin/bash
i=0
for province in `php index.php spider list_all_countytown`
do
    ((i++))
    echo $i
    nohup php index.php spider district $province 5&
    if (( $i%50 == 1 ));
        then 
            sleep 2
    fi 
done
