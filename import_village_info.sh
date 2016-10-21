#!/bin/bash
i=0
for province in `php index.php spider list_all_village`
do
    ((i++))
    echo $i
   nohup php index.php spider district $province 8&
    if (( $i%80 == 1 ));
        then 
   #         echo 100
            sleep 2
    fi 
done
