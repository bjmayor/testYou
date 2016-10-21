#!/bin/bash
i=0
for province in `php index.php spider2 list_all_city`
do
    ((i++))
    echo $i
    nohup php index.php spider2 countrytown $province 4 &
    if (( $i%50 == 1 ));
        then 
            sleep 2
    fi 
done
